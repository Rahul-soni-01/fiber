@extends('demo')
@section('title', 'Sale Return')

@section('content')
<h1>Sale Return</h1>
<a href="{{ route('sale.return.index') }}" class="btn btn-primary">Back to Sale Return</a>

@if ($errors->any())
<div style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="main" id="main">
    {{--
    <form action="search" method="get">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 mb-3">
                    <input type="text" id="invoice_no" name="invoice_no" class="form-control" placeholder="Invoice No"
                        value="{{ request('invoice_no') }}">
                </div>
                <div class="col-12 col-sm-6 col-md-4 mb-3">
                    <input type="date" id="date" name="date" class="form-control" placeholder="Enter Date"
                        value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
                </div>
                <div class="col-12 col-sm-6 col-md-4 mb-3">
                    <select id="party_name" name="cid" class="form-control" placeholder="Enter Party Name" required>
                        <option value="" disabled selected>Choose a Customer</option>
                        @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row justify-content-center" style="margin-top:2%">
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-dark" id="search" name="search">Search</button>
                </div>
            </div>
        </div>
    </form>

    <form action="{{route('sale.return.store')}}" method="post">
        @csrf

        @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col">Date</div>
                <div class="col">Customer Name</div>
            </div>
            <div class="row">

                <div class="col-md-6">
                    <input type="date" id="date" name="date" class="form-control" placeholder="Enter Date"
                        value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-6">
                    <select id="party_name" name="cid" class="form-control" placeholder="Enter Party Name" required>
                        <option value="" disabled selected>Choose a Customer</option>
                        @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="cus-container mt-2">
                <h1>Serial Details</h1>
                <div class="row">
                    <div class="col">Serial No.</div>
                    <div class="col"></div>
                    <div class="col"><button class="btn btn-info" type="button" onclick="SaleRowadd({{$serial_nos}})">
                            Add</button></div>
                </div>
                <div id="row-container">
                    <div class="row custom-row mt-2 g-2 align-items-center">
                        <div class="col">
                            <select required id="serial_no" class="form-control select2" name="serial_no[]"
                                onchange="serial_no_append(0,event)">
                                <option value="" disabled selected>Select</option>
                                @foreach($serial_nos as $serial_no)
                                <option value="{{ $serial_no->sr_no_fiber }}">{{ $serial_no->sr_no_fiber }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            @foreach($serial_nos as $serial_no)
                            <span id="{{ $serial_no->sr_no_fiber }}" class="final_amount cstmspan_0"
                                style="display: none">{{
                                $serial_no->final_amount}}</span>
                            @endforeach
                        </div>
                        <div class="col">

                        </div>
                    </div>
                </div>
                <div class="row mt-5 g-2 align-items-center">
                    <div class="col">
                        <h5> Final Price</h5>
                    </div>
                    <div class="col">
                        <input type="text" id="final_price" name="total_amount" class="form-control" readonly>
                    </div>
                    <div class="col">

                    </div>

                </div> --}}
                {{-- <div class="row mt-5 g-2 align-items-center">
                    <div class="col">
                        <h5> Note</h5>
                    </div>
                    <div class="col">
                        <textarea id="note" name="note" class="form-control"></textarea>
                    </div>
                    <div class="col">
                    </div>
                </div>
                <div class="d-flex m-5 justify-content-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

        </div>
    </form>--}}

    <div class="container">
        <div class="row">
            <div class="col">Sale Invoice No.</div>
            <div class="col">Customer Name</div>
            <div class="col">Action</div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <input type="number" id="invoice_no" name="invoice_no" class="form-control"
                    placeholder="Enter Invoice no." required>
            </div>

            <div class="col-md-4">
                <select id="party_name" name="party_name" class="form-control" placeholder="Enter Customer Name"
                    required>
                    <option value="" disabled selected>Choose a Customer</option>
                    @foreach($customers as $customers)
                    <option value="{{ $customers->id }}">{{ $customers->customer_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                {{-- <input type="date" id="date" name="date" class="form-control" placeholder="Enter Date" required>
                --}}
                {{-- <input type="date" id="date" name="date" class="form-control" placeholder="Enter Date"
                    value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required> --}}
                <button class="btn btn-info" onclick="getDataForReturn(event)">Search</button>
            </div>
        </div>

        <!-- Product Details Section -->
        <div class="cus-container mt-2">
            <h1>Product Return Details</h1>
            <div id="InvoiceData">

            </div>
            <form id="PurchaseReturnForm" action="{{ route('sale.return.store')}}" method="post">
                @csrf
                <div id="ReturnItems">
                    <h5 class="mt-3">Items to Return</h5>
                    <!-- Dynamic rows for return items will be appended here -->
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <button type="button" id="AddReturnRow" class="btn btn-primary">Add Return Row</button>
                    </div>
                    <div class="col text-right">
                        <button type="submit" class="btn btn-success">Submit Return</button>
                    </div>
                </div>
            </form>

            <div class="" id="TBody"></div>
        </div>

        <!-- Summary Section -->
        <div class="container">

            {{-- <div class="row mt-3">
                <div class="col-sm-2 offset-sm-8">Amount ($/¥)</div>
                <div class="col-sm-2">
                    <input type="number" id="amount_d" name="amount_d" placeholder="How much USD" step="0.01" required
                        class="form-control" onchange="rate()">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-2 offset-sm-8">Rate (₹)</div>
                <div class="col-sm-2">
                    <input type="number" id="rate_r" name="rate_r" class="form-control" step="0.01"
                        placeholder="Rate of USD" required onchange="rate()">
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
            <div class="row mt-3">
                <div class="col-sm-2 offset-sm-8">Amount</div>
                <div class="col-sm-2"><input type="number" id="amount" step="0.01" name="amount" class="form-control"
                        disabled></div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-2 offset-sm-5">
                    <button class="btn btn-success">Save</button>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection