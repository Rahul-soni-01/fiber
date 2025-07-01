@extends('demo')
@section('title', 'Sale Product SubCategory')

@section('content')
<h1>Sale Product SubCategory</h1>
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
    <h3>Edit Sale Product Subcategory</h3>
    <a href="{{ route('saleproductsubcategory.index') }}" class="btn btn-primary">Back to Subcategories</a>
    <form action="{{ route('saleproductsubcategory.update', $subcategory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="row justify-content-center">
                <!-- Centering the form on larger screens -->
                <div class="col-12 col-lg-6">

                    <!-- Subcategory Name -->
                    <div class="mb-3">
                        <label for="name">Subcategory Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Enter Subcategory Name" value="{{ $subcategory->name }}" required>
                    </div>

                    <!-- Parent Category Dropdown -->
                    <div class="mb-3">
                        <label for="spcid">Parent Category</label>
                        <select name="spcid" id="spcid" class="form-control" required>
                            <option value="" disabled>Select Parent Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $subcategory->spcid == $category->id ? 'selected' :
                                '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Unit Input -->
                    <div class="mb-3">
                        <label for="unit">Unit</label>
                        <input type="text" name="unit" id="unit" class="form-control"
                            placeholder="Enter Unit (Optional)" value="{{ $subcategory->unit }}">
                    </div>

                    <!-- Serial Number -->
                    <div class="mb-3">
                        <label for="sr_no">Serial Number</label>
                        <input type="checkbox" name="sr_no" id="is_type" class="form-control-input" value="1" {{
                            $subcategory->sr_no ? 'checked' : '' }}>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection