@extends('demo')
@section('title', 'Sale Product Category')
@section('content')
<h1>Sale Product Category</h1>
<div class="main" id="main">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h3>Edit Sale Product Category</h3>
    <a href="{{ route('saleproductcategory.index') }}" class="btn btn-primary">Back to Categories</a>
    <form action="{{ route('saleproductcategory.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="row justify-content-center">
                <!-- Centering the form on larger screens -->
                <div class="col-12 col-lg-6">
                    <!-- Category Name -->
                    <div class="mb-3">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Category Name"
                            value="{{ $category->name }}" required>
                    </div>
                    <!-- Category Type -->
                    {{-- <div class="mb-3">
                        <label for="is_type">Category Type</label>
                        <div class="form-check">
                            <input type="checkbox" name="is_type" id="is_type" class="form-check-input" value="1" {{
                                $category->is_type ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_type">Is Active</label>
                        </div>
                    </div> --}}
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection