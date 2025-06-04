@extends('demo')
@section('title', 'Edit Department')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h3>Edit Department</h3>
    <a href="{{ route('departments.index') }}" class="btn btn-primary">Back to Departments</a>
    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <!-- Centering the form on larger screens -->
                <div class="col-12 col-lg-6">
                    @method('PUT')
                    <div class="mb-3">
                        <label for="party_name">Department Name</label>
                        <input type="text" name="name" class="form-control"
                            placeholder="Enter Party Name" value="{{ $department->name }}" required>
                    </div>
                    <button type="submit" class="btn btn-success" >Update</button>
                </div>
            </div>
        </div>
    </form>
           
@endsection