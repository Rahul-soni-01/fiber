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
    <div class="container">
        <form id="PurchaseReturnForm" action="{{ route('sale.return.store')}}" method="post">
                @csrf
        <!-- Return Type Selection -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="return_type">Return Type</label>
                <select id="return_type" class="form-control" name="return_type">
                    <option value="normal" selected>Search by Sale Invoice</option>
                    <option value="old">Old Sale (Manual Entry)</option>
                </select>
            </div>
        </div>
        <!-- Normal Return Section -->
        <div class="row" id="normal-section">
            <div class="col">Sale Invoice No.</div>
            <div class="col">Customer Name</div>
            <div class="col">Action</div>
        </div>
        
        <div class="row" id="normal-section-fields">
            <div class="col-md-4">
                <input type="number" id="invoice_no" name="invoice_no" class="form-control"
                    placeholder="Enter Invoice no." >
            </div>

            <div class="col-md-4">
                <select id="party_name" name="party_name" class="form-control" placeholder="Enter Customer Name">
                    <option value="" disabled selected>Choose a Customer</option>
                    @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <button class="btn btn-info" onclick="getDataForReturn(event)">Search</button>
            </div>
        </div>
        <!-- Old Sale Manual Entry Section -->
        <div class="row" id="old-sale-section" style="display: none;">
            <div class="col-md-3">
                <label class="form-label">Invoice No</label>
                <input type="text" name="invoice_no" class="form-control" placeholder="Manual Invoice No.">
            </div>
            <div class="col-md-3">
                <label class="form-label">Customer Name</label>
                 <select  name="party_name" class="form-control" id="party_name">
                    <option value="" disabled selected>Choose a Customer</option>
                    @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Date</label>
                 <input type="date" id="date" name="date" class="form-control"
                    value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}" >
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="button" id="AddReturnRowManually"
                    onclick="BtnAddSaleReturn({{ json_encode($sale_product_categories)}},{{ json_encode($sale_product_subcategories)}})"
                    class="btn btn-primary w-100">Add Return Row</button>
            </div>
        </div>

        <div class="cus-container mt-4">
            <h1>Product Return Details</h1>
            <div id="InvoiceData"></div>
                <div id="ReturnItems">
                    <h5 class="mt-3">Items to Return</h5>
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

            <div id="TBody"></div>
        </div>

        
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const returnTypeSelect = document.getElementById('return_type');
        const normalSection = document.getElementById('normal-section');
        const normalSectionFields = document.getElementById('normal-section-fields');
        const oldSaleSection = document.getElementById('old-sale-section');
        const AddReturnRow = document.getElementById('AddReturnRow');
        const AddReturnRowManually = document.getElementById('AddReturnRowManually');

        returnTypeSelect.addEventListener('change', function () {
            const type = this.value;
            if (type == 'old') {
                normalSection.style.display = 'none';
                normalSectionFields.style.display = 'none';
                AddReturnRow.style.display = 'none';
                oldSaleSection.style.display = 'flex';
                document.getElementById('InvoiceData').innerHTML = '';
                document.getElementById('ReturnItems').innerHTML = '';
            } else {
                AddReturnRow.style.display = 'flex';
                normalSection.style.display = 'flex';
                normalSectionFields.style.display = 'flex';
                oldSaleSection.style.display = 'none';
            }
        });
    });

</script>
@endsection