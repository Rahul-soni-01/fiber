@extends('demo')
@section('title', 'Supplier Payment')

@section('content')
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<a href="{{ route('payment.index') }}" class="btn btn-primary">Back to Payment</a>
<div class="container">

    <div id="form2" class="form-container">
        <h4>Supplier Payment</h4>
        <form action="{{ route('payment.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-4">
                    <label>Date</label>
                    <div>
                        <input type="date" id="date" name="date" class="form-control" placeholder="Enter Date"
                            value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="party_name">Supplier Name</label>
                    <select id="supplier_select" name="sid" class="form-control" placeholder="Enter Party Name" required
                        onchange="filterInvoices();">
                        <option value="" disabled selected>Choose a Supplier</option>
                        @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->party_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="party_name">Invoice </label>
                    <select id="invoice_select" name="invoice_no[]" class="chosen-select" placeholder="Enter Invoice"
                        required onchange="GetInvoiceData('supplier',this.id);" multiple>
                        <option value="" disabled selected>Choose a Invoice</option>
                        @foreach($tbl_purchases as $tbl_purchase)
                        <option value="{{ $tbl_purchase->invoice_no }}" data-supplier="{{$tbl_purchase->pid}}">
                            {{ $tbl_purchase->invoice_no }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-md-4">
                    <label>Paid Amount</label>
                    <div>
                        <input type="number" id="paid_total" step="0.01" value="0" name="paid_total"
                            class="form-control">
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="payment_method">Payment Method</label>
                    <select id="supplier_payment_method" name="payment_method" class="form-control"
                        onchange="toggleBankDetails('supplier')">
                        <option value="Cash" selected>Cash</option>
                        <option value="Bank">Bank</option>
                    </select>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="note">Note:</label>
                    <textarea id="note" name="note" class="form-control"></textarea>
                </div>
                <div id="supplier_bank_details" class="mt-3 col-md-12" style="display: none;">
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="transaction_type">Sender Transaction Type</label>
                            <div class="form-check">
                                <input type="radio" id="rtgs" name="transaction_type" value="RTGS"
                                    class="form-check-input">
                                <label for="rtgs" class="form-check-label">RTGS</label>
                            </div>

                            <div class="form-check">
                                <input type="radio" id="neft" name="transaction_type" value="NEFT"
                                    class="form-check-input">
                                <label for="neft" class="form-check-label">NEFT</label>
                            </div>

                            <div class="form-check">
                                <input type="radio" id="cheque" name="transaction_type" value="CHEQUE"
                                    class="form-check-input">
                                <label for="cheque" class="form-check-label">Cheque</label>
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <div class="form-group mt-2">
                                <label for="bank_name">Sender Bank Name:</label>
                                {{-- <input type="text" id="bank_name" name="b" class="form-control"
                                    placeholder="Enter Bank Name"> --}}
                                <select id="bank_id" name="bank_id" class="form-control"
                                    placeholder="Select Bank Your send Name">
                                    <option value="" disabled selected>Select Your Bank Name </option>
                                    @foreach($banks as $key => $bank)
                                    <option value="{{$bank->id}}"> {{$bank->bank_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <div class="form-group mt-2">
                                <label for="bank_name">Reciver Bank Name:</label>
                                <input type="text" id="bank_name" name="bank_name" class="form-control"
                                    placeholder="Enter Bank Name">
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <div class="form-group">
                                <label for="holder_name">Reciver Account Holder Name:</label>
                                <input type="text" id="holder_name" name="holder_name" class="form-control"
                                    placeholder="Enter Account Holder Name">
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <div class="form-group">
                                <label for="branch_name">Reciver Branch Name:</label>
                                <input type="text" id="branch_name" name="branch_name" class="form-control"
                                    placeholder="Enter Branch Name">
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <div class="form-group">
                                <label for="account_number">Reciver Account Number:</label>
                                <input type="text" id="account_number" name="account_number" class="form-control"
                                    placeholder="Enter Account Number">
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <div class="form-group">
                                <label for="account_type">Reciver Type of Account:</label>
                                <select id="account_type" name="account_type" class="form-control">
                                    <option value="" disabled selected>Select Type of Account</option>
                                    <option value="HSS">HSS</option>
                                    <option value="CD">CD</option>
                                    <option value="CC">CC</option>
                                    <option value="OD">OD</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <div class="form-group">
                                <label for="ifsc_code">IFSC Code:</label>
                                <input type="text" id="ifsc_code" name="ifsc_code" class="form-control"
                                    placeholder="Enter IFSC Code">
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <div class="form-group">
                                <label for="cheque_no">Cheque No: *if(Cheque available) </label>
                                <input type="text" id="cheque_no" name="cheque_no" class="form-control"
                                    placeholder="Enter Cheque No.">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-right">Submit</button>
        </form>
    </div>
</div>
</div>
@endsection