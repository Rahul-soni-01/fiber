@extends('demo')
@section('title', 'Expense')

@section('content')
<h1>Expense</h1>
<div class="main" id="main">
    <a href="{{ route('expenses.index') }}" class="btn btn-primary">Back </a>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('expenses.store') }}" method="POST">
        @csrf
        <div class="row mt-2">
            <div class="mb-3 col-md-4">
                <label>Date</label>
                <div>
                    <input type="date" id="date" name="date" class="form-control" placeholder="Enter Date"
                        value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
                </div>
            </div>
            <!-- Name -->
            <div class="col-md-4 mb-3">
                <label for="name" class="form-label">Expense Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"
                    placeholder="Enter expense name">
            </div>

            <!-- Amount -->
            <div class="col-md-4 mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount') }}"
                    placeholder="Enter amount" step="0.01">
            </div>

            <!-- Payment Type -->
            <div class="col-md-4 mb-3">
                <label for="payment_type" class="form-label">Payment Type</label>
                <select id="payment_type" name="payment_type" class="form-control"
                    onchange="expenseestoggleBankDetails()">
                    <option value="" disabled selected>Select Payment Type</option>
                    <option value="Cash" {{ old('payment_type')=='Cash' ? 'selected' : '' }}>Cash</option>
                    <option value="Bank" {{ old('payment_type')=='Bank' ? 'selected' : '' }}>Bank</option>
                </select>
            </div>


            <div id="bank_details" class="col-md-12" style="display: none;">
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="transaction_type">Transaction Yype</label>
                        <div class="form-check">
                            <input type="radio" id="upi" name="transaction_type" value="UPI" class="form-check-input">
                            <label for="upi" class="form-check-label">UPI</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="rtgs" name="transaction_type" value="RTGS" class="form-check-input">
                            <label for="rtgs" class="form-check-label">RTGS</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="neft" name="transaction_type" value="NEFT" class="form-check-input">
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
                            <label for="bank_name">Bank Name:</label>
                            <select id="bank_id" name="bank_id" class="form-control"
                                placeholder="Select Bank Your send Name">
                                <option value="" disabled selected>Select Your Bank Name
                                </option>
                                @foreach($banks as $key => $bank)
                                <option value="{{$bank->id}}"> {{$bank->bank_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 col-md-4">
                        <div class="form-group mt-2">
                            <label for="cheque_no">Cheque No: *(Cheque available)</label>
                            <input type="text" id="cheque_no" name="cheque_no" class="form-control"
                                placeholder="Enter Cheque No.">
                        </div>
                    </div>

                </div>
            </div>
            <!-- Bank ID -->

            <div class="mb-3 col-md-6">
                <label for="note">Note:</label>
                <textarea id="notes" name="notes" class="form-control"></textarea>
            </div>
        </div>
        <!-- Submit Button -->
        <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">Add Expense</button>
            </div>
        </div>
    </form>
</div>
@endsection