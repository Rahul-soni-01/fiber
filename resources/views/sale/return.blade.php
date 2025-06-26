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
        <!-- Return Type Selection -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="return_type">Return Type</label>
                <select id="return_type" class="form-control">
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
                <button class="btn btn-info" onclick="getDataForReturn(event)">Search</button>
            </div>
        </div>
        <!-- Old Sale Manual Entry Section -->

        <div class="row" id="old-sale-section" style="display: none;">
            <div class="col-md-4">
                <input type="text" name="manual_invoice_no" class="form-control" placeholder="Manual Invoice No.">
            </div>
            <div class="col-md-4">
                <input type="text" name="manual_customer_name" class="form-control" placeholder="Manual Customer Name">
            </div>
        </div>
        <div class="cus-container mt-4">
            <h1>Product Return Details</h1>
            <div id="InvoiceData"></div>

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

            <div id="TBody"></div>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('return_type').addEventListener('change', function () {
        const returnTypeSelect = document.getElementById('return_type');
        const normalSection = document.getElementById('normal-section');
        const normalSectionFields = document.getElementById('normal-section-fields');
        const oldSaleSection = document.getElementById('old-sale-section');

        returnTypeSelect.addEventListener('change', function () {
            const type = this.value;
            if (type === 'old') {
                normalSection.style.display = 'none';
                normalSectionFields.style.display = 'none';
                oldSaleSection.style.display = 'flex';
                document.getElementById('InvoiceData').innerHTML = '';
                document.getElementById('ReturnItems').innerHTML = '';
            } else {
                normalSection.style.display = 'flex';
                normalSectionFields.style.display = 'flex';
                oldSaleSection.style.display = 'none';
            }
        });

    });
    document.getElementById('AddReturnRow').addEventListener('click', function () {
        const rowHtml = `
            <div class="row mt-2 return-row">
                <div class="col-md-4">
                    <select name="items[][product_id]" class="form-control" required>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="">Qty</label>
                    <input type="number" name="items[][quantity]" class="form-control" placeholder="Qty" min="1" required>
                </div>
                <div class="col-md-4">
                    <input type="text" name="items[][reason]" class="form-control" placeholder="Reason for return" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-row">Remove</button>
                </div>
            </div>
            `;
            document.getElementById('ReturnItems').insertAdjacentHTML('beforeend', rowHtml);
        });
});

</script>
@endsection