<x-layout>
    <x-slot name="title">Edit Banks</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            {{-- <h3>Edit Bank</h3> --}}
            <a href="{{ route('departments.index') }}" class="btn btn-primary">Back to Banks</a>
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
        
                <div class="row justify-content-center">
                    <!-- Centering the form on larger screens -->
                    <div class="col-12 col-lg-6">
                        <!-- Expense Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Expense Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Expense Name" value="{{ old('name', $expense->name) }}" required>
                        </div>
        
                        <!-- Amount -->
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount" value="{{ old('amount', $expense->amount) }}" required step="0.01">
                        </div>
        
                        <!-- Payment Type -->
                        <div class="mb-3">
                            <label for="payment_type" class="form-label">Payment Type</label>
                            <select id="payment_type" name="payment_type" class="form-control" required>
                                <option value="Cash" {{ old('payment_type', $expense->payment_type) == 'Cash' ? 'selected' : '' }}>Cash</option>
                                <option value="Bank" {{ old('payment_type', $expense->payment_type) == 'Bank' ? 'selected' : '' }}>Bank</option>
                            </select>
                        </div>
        
                        <!-- Bank ID -->
                        <div class="mb-3">
                            <label for="bank_id" class="form-label">Bank ID</label>
                            <input type="number" name="bank_id" id="bank_id" class="form-control" placeholder="Enter Bank ID" value="{{ old('bank_id', $expense->bank_id) }}">
                        </div>
        
                        <!-- Update Button -->
                        <button type="submit" class="btn btn-success">Update</button>
        
                        <!-- Cancel Button -->
                        <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
           
        </div>
    </x-slot>
</x-layout>