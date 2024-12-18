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

            <form action="{{ route('banks.store' ) }}" method="POST">
                @csrf
                <div class="container">
                    <div class="row justify-content-center">
                        <!-- Centering the form on larger screens -->
                        <div class="col-12 col-lg-6">


                            <div class="mb-3">
                                <label for="bank_name" class="form-label">Bank Name</label>
                                <input type="text" name="bank_name" id="bank_name" class="form-control"
                                    value="{{ old('bank_name') }}" required placeholder="Enter Bank Name">
                            </div>

                            <div class="mb-3">
                                <label for="branch" class="form-label">Branch</label>
                                <input type="text" name="branch" id="branch" class="form-control"
                                    value="{{ old('branch') }}" placeholder="Enter Branch Name">
                            </div>

                            <div class="mb-3">
                                <label for="account_type">Type of Account:</label>
                                <select id="account_type" name="account_type" class="form-control" value="{{ old('account_type') }}">
                                    <option value="" disabled selected>Select Type of Account</option>
                                    <option value="HSS">HSS</option>
                                    <option value="CD">CD</option>
                                    <option value="CC">CC</option>
                                    <option value="OD">OD</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="account_number" class="form-label">Account Number</label>
                                <input type="text" name="account_number" id="account_number" class="form-control"
                                    value="{{ old('account_number') }}" required placeholder="Enter Account Number">
                            </div>

                            <div class="mb-3">
                                <label for="ifsc_code" class="form-label">IFSC Code</label>
                                <input type="text" name="ifsc_code" id="ifsc_code" class="form-control"
                                    value="{{ old('ifsc_code') }}" placeholder="Enter IFSC Code">
                            </div>

                            <div class="mb-3">
                                <label for="account_holder_name" class="form-label">Account Holder Name</label>
                                <input type="text" name="account_holder_name" id="account_holder_name"
                                    class="form-control" value="{{ old('account_holder_name') }}" required placeholder="Enter Account Holder Name">
                            </div>

                            <button type="submit" class="btn btn-success">Add Bank</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </x-slot>
</x-layout>