@extends('demo')
@section('title', 'Sale')

@section('content')
<h1>Sale</h1>
<a href="{{ route('sale.index') }}" class="btn btn-primary">Back to Sale</a>
<div class="main" id="main">
    <form action="{{ route('sale.update', $sale->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- For update request -->
        @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="invoice_no" class="form-label">Invoice No.</label>
                <input type="number" id="invoice_no" name="invoice_no" class="form-control"
                    value="{{ $sale->sale_id ?? 'N/A' }}" required>
            </div>
            <div class="col-md-4">
                <label for="date" class="form-label">Date</label>
                <input type="date" id="date" name="date" class="form-control"
                    value="{{ old('date', $sale->sale_date ? \Carbon\Carbon::parse($sale->sale_date)->format('Y-m-d') : '') }}"
                    required>
            </div>
            <div class="col-md-4">
                <label for="party_name" class="form-label">Customer Name</label>
                <select id="party_name" name="cid" class="form-control" required>
                    <option value="" disabled selected>Choose a Customer</option>
                    @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $sale->customer_id == $customer->id ? 'selected' : ''
                        }}>
                        {{ $customer->customer_name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="cus-container mt-2">
            <h1>Product Details</h1>
            <div class="row">
                <div class="col">Serial No.</div>
                <div class="col">Price</div>
                <div class="col"><button class="btn btn-info" type="button" onclick="SaleRowadd({{$serial_nos}})">
                        Add</button></div>
            </div>
            <div id="row-container">

                @foreach ($sale->items as $item)

                <div class="row custom-row mt-2 g-2 align-items-center">
                    <div class="col">
                        <select required id="serial_no" class="form-control " name="serial_no[]"
                            onchange="serial_no_append({{ $loop->index }},event)">
                            <option value="" disabled>Select</option>
                            @foreach($serial_nos as $serial_no)
                            <option value="{{ $serial_no->id }}" @if($item->report->sr_no_fiber ==
                                $serial_no->sr_no_fiber) selected @endif>{{ $serial_no->sr_no_fiber }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">

                        <input type="text" id="final_price" value="{{ $item->report->final_amount ?? 'N/A' }}"
                            name="total_amount" class="form-control" readonly>
                    </div>
                    <div class="col">
                        <button type="button" onclick="SaleremoveRow(this)"
                            class="btn btn-danger margin-btn">Delete</button>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row mt-5 g-2 align-items-center">
                <div class="col">
                    <h5> Final Price</h5>
                </div>
                <div class="col">
                    <span id="party_name" class="form-control">
                        {{ $sale->total_amount ?? 'N/A' }}
                    </span>
                </div>
                <div class="col">

                </div>

            </div>
            <div class="row mt-5 g-2 align-items-center">
                <div class="col">
                    <h5> Note</h5>
                </div>
                <div class="col">
                    <span id="party_name" class="form-control">
                        {{ $sale->notes ?? 'N/A' }}
                    </span>
                </div>
                <div class="col">
                </div>
            </div>

        </div>

    </form>
</div>
@endsection