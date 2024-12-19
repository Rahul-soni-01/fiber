<x-layout>
    <x-slot name="title">Insert Bank</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <a href="{{ route('banks.index') }}" class="btn btn-primary">Back to Bank</a>

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
                    <!-- Name -->
                    <div class="col-md-3 mb-3">
                        <label for="name" class="form-label">Expense Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter expense name">
                    </div>
        
                    <!-- Amount -->
                    <div class="col-md-3 mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount') }}" placeholder="Enter amount" step="0.01">
                    </div>
              
                    <!-- Payment Type -->
                    <div class="col-md-3 mb-3">
                        <label for="payment_type" class="form-label">Payment Type</label>
                        <select id="payment_type" name="payment_type" class="form-control">
                            <option value="">Select Payment Type</option>
                            <option value="Cash" {{ old('payment_type') == 'Cash' ? 'selected' : '' }}>Cash</option>
                            <option value="Bank" {{ old('payment_type') == 'Bank' ? 'selected' : '' }}>Bank</option>
                        </select>
                    </div>
        
                    <!-- Bank ID -->
                    <div class="col-md-3 mb-3">
                        <label for="bank_id" class="form-label">Bank ID</label>
                        <input type="number" id="bank_id" name="bank_id" class="form-control" value="{{ old('bank_id') }}" placeholder="Enter bank ID">
                    </div>
                </div>
        
                <!-- Submit Button -->
                <div class="row">
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-success">Add Expense</button>
                    </div>
                </div>
            </form>
        </div>
    </x-slot>
</x-layout>