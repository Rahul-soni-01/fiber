@extends('demo')
@section('title', 'Standby Return')
@section('content')
<h1>Standby Return</h1>
<a href="{{ route('sale.index') }}" class="btn btn-primary">Back to Standby Returns</a>
@if ($errors->any())
<div style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="main" id="main">
    <form action="{{ route('standby.update', $id) }}" method="post">
     {{-- <form> --}}
        @csrf
        @method('PUT')

        <input type="hidden" value="4" name="status">
        <div class="container">
            <div class="row d-none d-md-flex fw-bold">
                <div class="col-md-3 col-sm-6">Invoice No.</div>
                <div class="col-md-3 col-sm-6">Date</div>
                <div class="col-md-3 col-sm-6">Customer Name</div>
                <div class="col-md-3 col-sm-6">Note</div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-3 col-sm-6 col-12">
                    <input type="number" id="invoice_no" name="sale_id" class="form-control" value="{{ $id }}" required>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <input type="date" id="date" name="date" class="form-control" value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    @foreach($customers as $customer)                            
                    @if ($customer->id == $sale->customer_id)
                         <input type="text" class="form-control" value="{{ $customer->customer_name}}" readonly>
                    @endif
               @endforeach
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <input type="text" name="note" class="form-control" placeholder="Note... Remark..." value="{{$sale->note}}">
                </div>
            </div>
    
            <div class="cus-container mt-2">
                <h1 class="mt-3">Product Details</h1>
    
                <div class="row fw-bold d-none d-md-flex">
                    <div class="col-md-3 col-lg-2">Category</div>
                    <div class="col-md-3 col-lg-2">Sub Category</div>
                    <div class="col-md-2 col-lg-1">Unit</div>
                    <div class="col-md-2 col-lg-2">Sr No</div>
                    <div class="col-md-2 col-lg-2">Qty</div>
                </div>
    
                @foreach($sale->items as $key => $item)
                    <div class="row g-2 align-items-center product-row">
                        <div class="col-md-3 col-lg-2">
                              <label class="d-md-none fw-bold">Category</label>
                              @foreach($sale_product_categories as $sale_product_category)                            
                                   @if ($item->cname == $sale_product_category->id)
                                        <input type="hidden" class="form-control" value="{{ $item->cname }}" readonly>
                                        <input type="text" class="form-control" value="{{ $sale_product_category->name}}" readonly>
                                   @endif
                              @endforeach
                        </div>
    
                        <div class="col-md-3 col-lg-2">
                              <label class="d-md-none fw-bold">Sub Category</label>
                            
                              @foreach($sale_product_subcategories as $sale_product_subcategory)                            
                                   @if ($item->scname == $sale_product_subcategory->id)
                                        <input type="hidden" class="form-control" value="{{ $item->scname }}" readonly>
                                        <input type="text" class="form-control" value="{{ $sale_product_subcategory->name}}" readonly>
                                   @endif
                              @endforeach
                        </div>
    
                        <div class="col-md-2 col-lg-1">
                            <label class="d-md-none fw-bold">Unit</label>
                            <input type="text" class="form-control" value="{{ $item->unit }}" readonly>
                        </div>
    
                        <div class="col-md-2 col-lg-2">
                            <label class="d-md-none fw-bold">Sr No</label>
                            <input type="text" name="sr_no[]" class="form-control" value="{{ $item->sr_no }}" readonly>
                        </div>
    
                        <div class="col-md-2 col-lg-2">
                            <label class="d-md-none fw-bold">Qty</label>
                            <input type="number" name="qty[]" class="form-control qty" value="{{ $item->qty }}" readonly>
                        </div>
    
                         
                    </div>
                @endforeach
            </div>
            <div class="row mt-3">
                <div class="col-sm-3 offset-sm-9 mt-2">
                    <button class="btn btn-success">Return (Back into Stock)</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
