@extends('demo')
@section('title', 'Expense')

@section('content')
        <div class="main" id="main">
            {{-- <h3>Edit Bank</h3> --}}
            <a href="{{ route('expenses.index') }}" class="btn btn-primary">Back</a>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Centering the form on larger screens -->

                    <div class="mb-3 col-md-4">
                        <label>Date</label>
                        <div>
                            <input type="date" id="date" name="date" class="form-control" placeholder="Enter Date"
                                value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
                        </div>
                    </div>
                    <!-- Expense Name -->
                    <div class="mb-3 col-md-4">
                        <label for="name" class="form-label">Expense Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Expense Name"
                            value="{{ old('name', $expense->name) }}" required>
                    </div>

                    <!-- Amount -->
                    <div class="mb-3 col-md-4">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount"
                            value="{{ old('amount', $expense->amount) }}" required step="0.01">
                    </div>

                    <!-- Payment Type -->
                    <div class="mb-3 col-md-4">
                        <label for="payment_type" class="form-label">Payment Type</label>
                        <select id="payment_type" name="payment_type" class="form-control" required onchange="expenseestoggleBankDetails()">
                            <option value="Cash" {{ old('payment_type', $expense->payment_type) == 'Cash' ? 'selected' :
                                '' }}>Cash</option>
                            <option value="Bank" {{ old('payment_type', $expense->payment_type) == 'Bank' ? 'selected' :
                                '' }}>Bank</option>
                        </select>
                    </div>

                    <div id="bank_details" class="col-md-12" style="display: none;">
                        <div class="row">
                            <!-- Transaction Type -->
                            <div class="mb-3 col-md-4">
                                <label for="transaction_type">Transaction Type</label>
                                <div class="form-check">
                                    <input type="radio" id="upi" name="transaction_type" value="UPI"
                                        class="form-check-input" {{ $expense->transaction_type == 'UPI' ? 'checked' : '' }}>
                                    <label for="upi" class="form-check-label">UPI</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="rtgs" name="transaction_type" value="RTGS"
                                        class="form-check-input" {{ $expense->transaction_type == 'RTGS' ? 'checked' : '' }}>
                                    <label for="rtgs" class="form-check-label">RTGS</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="neft" name="transaction_type" value="NEFT"
                                        class="form-check-input" {{ $expense->transaction_type == 'NEFT' ? 'checked' : '' }}>
                                    <label for="neft" class="form-check-label">NEFT</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="cheque" name="transaction_type" value="CHEQUE"
                                        class="form-check-input" {{ $expense->transaction_type == 'CHEQUE' ? 'checked' : '' }}>
                                    <label for="cheque" class="form-check-label">Cheque</label>
                                </div>
                            </div>
                        
                            <!-- Bank Name -->
                            <div class="mb-3 col-md-4">
                                <div class="form-group mt-2">
                                    <label for="bank_name">Bank Name:</label>
                                    <select id="bank_id" name="bank_id" class="form-control">
                                        <option value="" disabled {{ !$expense->bank_id ? 'selected' : '' }}>Select Your Bank Name</option>
                                        @foreach($banks as $key => $bank)
                                        <option value="{{ $bank->id }}" {{ $expense->bank_id == $bank->id ? 'selected' : '' }}>
                                            {{ $bank->bank_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        
                            <!-- Cheque Number -->
                            <div class="mb-3 col-md-4">
                                <div class="form-group mt-2">
                                    <label for="cheque_no">Cheque No: *(Cheque available)</label>
                                    <input type="text" id="cheque_no" name="cheque_no" class="form-control"
                                        placeholder="Enter Cheque No." value="{{ old('cheque_no', $expense->cheque_no) }}">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="note">Note:</label>
                        <textarea id="notes" name="notes" class="form-control">{{ old('notes', $expense->notes) }}</textarea>
                    </div>
                    
                    
                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success">Update</button>

                            <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
  @endsection