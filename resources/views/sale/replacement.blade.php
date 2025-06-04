@extends('demo')
@section('title', 'Out')
@section('content')
<h1>Product Out</h1>
<a href="{{ route('sale.index') }}" class="btn btn-primary">Show Out Data</a>
@if ($errors->any())
<div style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
{{-- {{  dd($customers); }} --}}
<div class="mt-2" id="main">
    <form action="" method="get">
        <div class="container">
            <div class="row d-none d-md-flex fw-bold">
                {{-- <div class="col-md-3 col-sm-6">Invoice No.</div> --}}
                {{-- <div class="col-md-3 col-sm-6">Date</div> --}}
                <div class="col-md-3 col-sm-6">Customer Name</div>
                {{-- <div class="col-md-3 col-sm-6">Status</div> --}}
            </div>
            
            <div class="row align-items-center">
                {{-- <div class="col-md-3 col-sm-6 col-12">
                    <label class="d-md-none fw-bold">Invoice No.</label>
                    <input type="text" id="invoice_no" name="sale_id" class="form-control" placeholder="Enter Invoice No.">
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <label class="d-md-none fw-bold">Date</label>
                    <input type="date" id="date" name="date" class="form-control"
                        value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                </div> --}}
                <div class="col-md-3 col-sm-6 col-12">
                    <label class="d-md-none fw-bold">Customer Name</label>
                    <select id="party_name" name="cid" class="form-control">
                        <option value="" disabled {{ !request()->has('cid') ? 'selected' : '' }}>Choose a Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" 
                                    {{ request('cid') == $customer->id ? 'selected' : '' }}>
                                {{ $customer->customer_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            @if(request()->has('cid'))
            <div class="accordion mt-3" id="salesAccordion">
                @foreach($sales as $sale)
                    <div class="accordion-item mb-3 text-dark">
                        <h2 class="accordion-header" id="heading{{ $sale->id }}">
                            <button class="accordion-button collapsed" type="button" 
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $sale->id }}" 
                                    aria-expanded="false" aria-controls="collapse{{ $sale->id }}">
                                    @switch($sale->status)
                                    @case(0)
                                        <span class="badge bg-success">Sale</span>
                                        @break
                                    @case(1)
                                        <span class="badge bg-primary">Demo</span>
                                        @break
                                    @case(2)
                                        <span class="badge bg-warning text-dark">Standby</span>
                                        @break
                                    @case(3)
                                        <span class="badge bg-danger">Replacement</span>
                                        @break
                                    @case(4)
                                        <span class="badge bg-info text-dark">Standby Return</span>
                                        @break
                                    @default
                                        <span class="badge bg-secondary">Unknown</span>
                                @endswitch 
                                <div class="d-flex justify-content-between w-100 pe-3">
                                    <span>Sale #{{ $sale->sale_id }}</span>
                                    <span class="badge bg-primary rounded-pill">{{ count($sale->items) }} items</span>
                                </div>
                            </button>
                        </h2>
                        <div id="collapse{{ $sale->id }}" class="accordion-collapse collapse" 
                             aria-labelledby="heading{{ $sale->id }}" data-bs-parent="#salesAccordion">
                            <div class="accordion-body p-0">
                                <table class="table datatable-remove dtable-bordered mb-0 text-dark">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Item ID</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Replace</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sale->items as $item)
                                            <tr>
                                                <td>{{ $item->sale_id }}</td>
                                                <td>{{ $item->sr_no }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ number_format($item->total, 2) }}</td>
                                                <td>
                                                    @if($sale->status == 0)
                                                    <a href="{{ route('item-replacement', ['id' => $item->id]) }}" class="btn btn-sm btn-primary"> <i class="fa-solid fa-repeat"></i>
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
            <div class="d-flex m-5 justify-content-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection