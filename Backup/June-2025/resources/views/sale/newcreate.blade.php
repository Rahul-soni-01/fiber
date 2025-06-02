@extends('demo')
@section('title', 'Product Out')
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
<div class="main" id="main">
    <form action="{{route('sale.store')}}" method="post">
        @csrf
        <input type="hidden" name="repair_status" value="0">
        <div class="container">
            <div class="row d-none d-md-flex fw-bold">
                <div class="col-md-3 col-sm-6">Invoice No.</div>
                <div class="col-md-3 col-sm-6">Date</div>
                <div class="col-md-3 col-sm-6">Customer Name</div>
                <div class="col-md-3 col-sm-6">Status</div>
            </div>
            
            <div class="row align-items-center">
                <div class="col-md-3 col-sm-6 col-12">
                    <label class="d-md-none fw-bold">Invoice No.</label>
                    <input type="text" id="invoice_no" name="sale_id" class="form-control" placeholder="Enter Invoice No.">
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <label class="d-md-none fw-bold">Date</label>
                    <input type="date" id="date" name="date" class="form-control"
                        value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <label class="d-md-none fw-bold">Customer Name</label>
                    <select id="party_name" name="cid" class="form-control" required>
                        <option value="" disabled selected>Choose a Customer</option>
                        @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <label class="d-md-none fw-bold">Status</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="0">Sale</option>
                        <option value="1">Demo</option>
                        <option value="2">Standby</option>
                        <option value="3">Replacement</option>
                    </select>
                </div>
            </div>
            <div class="cus-container mt-2">
                <h1>Product Details</h1>
                <div class="row custom-row g-2 align-items-center">
                    <!-- Sale Product Category Name -->
                    <div class="col custom-col">
                        <label for="data[0][cname]" class="form-label" style="white-space:nowrap;">Sale Category
                        </label>
                        <select id="data[0][cname]" name="cname[]" class="form-control" onchange="filterOptions(event)">
                            <option value="" disabled selected>Sale Category</option>
                            @foreach($sale_product_categories as $sale_product_category)
                            <option value="{{ $sale_product_category->id }}">{{ $sale_product_category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Category Name -->
                    <div class="col custom-col">
                        <label for="data[0][cname]" class="form-label" style="white-space:nowrap;"> Sub Category</label>
                        {{-- {{dd($sale_product_subcategories);}} --}}
                        <select id="data[0][scname]" name="scname[]" class="form-control"
                            onchange="filterOptions(event)">
                            <option value="" disabled selected>Sub Category</option>
                            @foreach($sale_product_subcategories as $sale_product_subcategory)
                            <option value="{{ $sale_product_subcategory->id }}"
                                class="{{ $sale_product_subcategory->spcid }}"
                                data-unit="{{ $sale_product_subcategory->unit }}"
                                data-sr_no="{{ $sale_product_subcategory->sr_no }}"
                                data-value="{{ $sale_product_subcategory->name }}">{{ $sale_product_subcategory->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Category Name -->
                    {{-- <div class="col custom-col">
                        <label for="data[0][cname]" class="form-label" style="white-space:nowrap;">Category Name</label>
                        <select id="data[0][cname]" name="cname[]" class="form-control" onchange="filterOptions(event)">
                            <option value="" disabled selected>Choose a Category</option>
                            @foreach($inwards as $inward)
                            <option value="{{ $inward->id }}">{{ $inward->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Sub Category Name -->
                    <div class="col custom-col">
                        <label for="data[0][scname]" class="form-label" style="white-space:nowrap;">Sub Category
                        </label>
                        <select id="data[0][scname]" name="scname[]" class="form-control"
                            onchange="filterOptions(event)">
                            <option value="" disabled selected class="0" data-unit="">Choose a Sub Category</option>
                            @foreach($items as $item)
                            <option value="{{ $item->id }}" class="{{ $item->cid }}" data-unit="{{ $item->unit }}">{{
                                $item->sub_category_name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <!-- Unit -->
                    <div class="col custom-col">
                        <label for="data[0][unit]" class="form-label">Unit</label>
                        <select id="data[0][unit]" name="unit[]" class="form-control">
                            <option value="" disabled selected>Select</option>
                            <option value="Pic">Pcs</option>
                            <option value="Mtr">Mtr</option>
                        </select>
                    </div>
                    <div class="col custom-col" id="sr_no_div_0" style="display: none;">
                        <label for="data[0][sr_no]" class="form-label">Sr No</label>
                        <select id="data[0][sr_no]" name="sr_no[]" class="form-control select2">
                            <option value="" disabled selected>Select</option>
                        </select>
                    </div>
                    <div class="col custom-col" id="col_div_0">
                        <label for="data[0][sr_no]" class="form-label">Sr No</label>
                        <input type="text" name="sr_no[]" class="form-control" id="sr_no_0"
                            placeholder="Plz dont write here">
                    </div>
                    <!-- Quantity -->
                    <div class="col custom-col">
                        <label for="data[0][qty]" class="form-label">Qty</label>
                        <input type="number" id="data[0][qty]" name="qty[]" class="form-control" placeholder="Quantity"
                            onchange="total()">
                    </div>
                    <!-- Rate -->
                    <div class="col custom-col">
                        <label for="data[0][rate]" class="form-label">Rate</label>
                        <input type="number" id="data[0][rate]" name="rate[]" class="form-control" placeholder="Rate"
                            onchange="total()">
                    </div>
                    <!-- Tax Percentage -->
                    <div class="col custom-col">
                        <label for="data[0][p_tax]" class="form-label">Tax(%)</label>
                        <input type="number" id="data[0][p_tax]" name="p_tax[]" step="0.01" placeholder="Tax"
                            class="form-control" onchange="total()" value="0">
                    </div>
                    <!-- Tax Amount -->
                    <div class="col custom-col">
                        <label for="data[0][tax]" class="form-label">Tax</label>
                        <input type="number" id="data[0][tax]" name="tax[]" step="0.01" class="form-control" disabled>
                    </div>
                    <!-- Total Amount -->
                    <div class="col custom-col">
                        <label for="data[0][total]" class="form-label">Total</label>
                        <input type="number" id="data[0][total]" name="total[]" step="0.01" placeholder="Total"
                            class="form-control">
                    </div>
                    <div class="col custom-col">
                        <label for="" class="form-label"></label>
                        <button type="button" class="btn btn-primary"
                            onclick="BtnAdd({{ json_encode($sale_product_categories)}},{{ json_encode($sale_product_subcategories)}})">Add</button>
                    </div>
                </div>
                <div class="" id="TBody"></div>
            </div>
            <div class="container">
                <div class="row mt-3 d-none">
                    <div class="col-sm-2 offset-sm-8">Amount ($/¥)</div>
                    <div class="col-sm-2">
                        <input type="number" id="amount_d" name="amount_d" placeholder="How much USD" step="0.01"
                            required class="form-control" onchange="rate()" disabled>
                    </div>
                </div>
                <div class="row mt-3 d-none">
                    <div class="col-sm-2 offset-sm-8">Rate (₹)</div>
                    <div class="col-sm-2">
                        <input type="number" id="rate_r" name="rate_r" class="form-control" step="0.01"
                            placeholder="Rate of USD" required onchange="rate()" value="1" disabled>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2 offset-sm-8">Amount (₹)</div>
                    <div class="col-sm-2">
                        <input type="number" id="amount_r" name="amount_r" step="0.01" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2 offset-sm-8">Shipping Cost </div>
                    <div class="col-sm-2">
                        <input type="number" id="shipping_cost" step="0.01" value="0" name="shipping_cost"
                            class="form-control" oninput="calculateshipping()">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2 offset-sm-8">Sub Total</div>
                    <div class="col-sm-2"><input type="number" id="sub_total" step="0.01" name="sub_total"
                            class="form-control" disabled></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2 offset-sm-8">Round Amount</div>
                    <div class="col-sm-2"><input type="number" id="round_total" step="0.01" value="0" name="round_total"
                            class="form-control" oninput="calculateAmount()"></div>
                </div>
                {{-- <div class="row mt-3">
                    <div class="col-sm-2 offset-sm-8">Paid Amount</div>
                    <div class="col-sm-2">
                        <input type="number" id="paid_total" step="0.01" value="0" name="paid_total"
                            class="form-control" onchange="calculateAmount()">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2 offset-sm-8">
                        <label for="data[0][unit]" class="form-label ">Payment Method</label>
                    </div>
                    <div class="col-sm-2">
                        <select id="payment_method" name="payment_method" class="form-control">
                            <option value="" disabled selected>Select</option>
                            <option value="Cash">Cash</option>
                            <option value="Bank">Bank</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2 offset-sm-8">Due/Reamining Amount</div>
                    <div class="col-sm-2"><input type="number" id="remaining_amount" step="0.01" value="0"
                            name="remaining_amount" class="form-control" onchange="calculateAmount()" readonly></div>
                </div> --}}
                <div class="row mt-3">
                    <div class="col-sm-2 offset-sm-8">Amount</div>
                    <div class="col-sm-2"><input type="number" id="amount" step="0.01" name="amount"
                            class="form-control" readonly></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2 offset-sm-10">
                        <button class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
            {{-- <div class="d-flex m-5 justify-content-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div> --}}
        </div>
    </form>
</div>
@endsection