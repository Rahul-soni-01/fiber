@extends('demo')
@section('title', 'Edit Types')

@section('content')
<h3>Edit Types</h3>
<a href="{{ route('type.index') }}" class="btn btn-primary">Back to Type</a>
<form action="{{ route('type.update', $type->id) }}" method="POST">
    @csrf
    <div class="container">
        <div class="row justify-content-center">
            <!-- Centering the form on larger screens -->
            <div class="col-12 col-lg-6">
                @method('PUT')
                <div class="mb-3">
                    <label for="party_name">Type Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Party Name"
                        value="{{ $type->name }}" required>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </div>
</form>
@endsection