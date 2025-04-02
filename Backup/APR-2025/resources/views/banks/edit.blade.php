@extends('demo')
@section('title', 'Bank')

@section('content')
<h1>Bank</h1>
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
            <form action="{{ route('banks.update', $bank->id) }}" method="POST">
                @csrf
                @method('PUT')
        
                <div class="container">
                    <div class="row justify-content-center">
                        <!-- Centering the form on larger screens -->
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="bank_name" class="form-label">Bank Name</label>
                                <input type="text" name="bank_name" id="bank_name" class="form-control"
                                    placeholder="Enter Bank Name" value="{{ $bank->bank_name }}" required>
                            </div>
        
                            <div class="mb-3">
                                <label for="branch" class="form-label">Branch</label>
                                <input type="text" name="branch" id="branch" class="form-control"
                                    placeholder="Enter Branch" value="{{ $bank->branch }}">
                            </div>
                            <div class="mb-3">
                                <label for="account_type">Type of Account:</label>
                                <select id="account_type" name="account_type" class="form-control" value="{{ $bank->account_type }}">
                                    <option value="" disabled selected>Select Type of Account</option>
                                    <option value="HSS" @if($bank->account_type == 'HSS') selected @endif >HSS</option>
                                    <option value="CD" @if($bank->account_type == 'CD') selected @endif>CD</option>
                                    <option value="CC" @if($bank->account_type == 'CC') selected @endif>CC</option>
                                    <option value="OD" @if($bank->account_type == 'OD') selected @endif>OD</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="account_number" class="form-label">Account Number</label>
                                <input type="text" name="account_number" id="account_number" class="form-control"
                                    placeholder="Enter Account Number" value="{{ $bank->account_number }}" required>
                            </div>
        
                            <div class="mb-3">
                                <label for="ifsc_code" class="form-label">IFSC Code</label>
                                <input type="text" name="ifsc_code" id="ifsc_code" class="form-control"
                                    placeholder="Enter IFSC Code" value="{{ $bank->ifsc_code }}">
                            </div>
        
                            <div class="mb-3">
                                <label for="account_holder_name" class="form-label">Account Holder Name</label>
                                <input type="text" name="account_holder_name" id="account_holder_name" class="form-control"
                                    placeholder="Enter Account Holder Name" value="{{ $bank->account_holder_name }}" required>
                            </div>
        
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('banks.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
           
        </div>
   @endsection