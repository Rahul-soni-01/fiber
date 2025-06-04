@extends('demo')
@section('title', 'Edit Company')

@section('content')
<a href="{{ route('companies.index') }}" class="btn btn-primary">Back to Companies</a>
@if ($errors->any())
<div class="alert alert-danger">
     <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
     </ul>
</div>
@endif
<form action="{{ route('companies.update', $company->id) }}" method="POST">
     @csrf
     @method('PUT')
     <div class="container">
          <div class="row justify-content-center">
               <!-- Centering the form on larger screens -->
               <div class="col-12 col-lg-6">

                    <div class="mb-3">
                         <label for="name">Company Name</label>
                         <input type="text" name="name" class="form-control"
                              placeholder="Enter Company Name"
                              value="{{ old('name', $company->name) }}" required>
                    </div>

                    <div class="mb-3">
                         <label for="tax_id">Tax ID</label>
                         <input type="text" name="tax_id" class="form-control"
                              placeholder="Enter Tax ID"
                              value="{{ old('tax_id', $company->tax_id) }}">
                    </div>

                    <div class="mb-3">
                         <label for="address">Address</label>
                         <textarea name="address" class="form-control"
                              placeholder="Enter Company Address" rows="3">{{ old('address', $company->address) }}</textarea>
                    </div>

                    <div class="mb-3 form-check">
                         <input type="checkbox" name="is_active" class="form-check-input"
                              id="is_active" value="1"
                              {{ $company->is_active ? 'checked' : '' }}>
                         <label class="form-check-label" for="is_active">Active Company</label>
                    </div>

                    <button type="submit" class="btn btn-success">Update Company</button>
               </div>
          </div>
     </div>
</form>
@endsection