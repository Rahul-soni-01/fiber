@extends('demo')
@section('title', 'Add Supplier')

@section('content')
<a href="{{ route('departments.index') }}" class="btn btn-primary">Back to Departments</a>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
<form action="{{ route('departments.store' ) }}" method="POST">
    @csrf
    <div class="container">
        <div class="row justify-content-center">
            <!-- Centering the form on larger screens -->
            <div class="col-12 col-lg-6">

                <div class="mb-3">
                    <label for="party_name">Department Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Department Name" required>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</form>
@endsection