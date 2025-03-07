@extends('demo')

@section('title', 'Edit Party')



@section('content')

<a href="{{ route('category.index') }}" class="btn btn-primary">Back to List</a>

@if ($errors->any())

<div style="color: red;">

    <ul>

        @foreach ($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif


<form action="{{ route('category.update', $category->id) }}" method="post">
    @csrf
    @method('PUT') <!-- Required for updating data -->

    <div class="row mb-3 mt-3">
        <div class="col-md-3">
            <h3>Edit Category</h3>
        </div>

        <div class="col-md-6">
            <input type="text" class="form-control" name="category_name" id="category_name"
                value="{{ old('category_name', $category->category_name) }}" placeholder="Enter category name" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-3">
            <label for="main_category" class="form-label">Primary Category</label>
        </div>
        <div class="col-md-6">
            <select class="form-select" id="main_category" name="main_category" required>
                <option value="" disabled>Select a main category</option>
                <option value="Electronic" {{ $category->main_category == 'Electronic' ? 'selected' : '' }}>Electronic</option>
                <option value="Optical" {{ $category->main_category == 'Optical' ? 'selected' : '' }}>Optical</option>
                <option value="Mechanical" {{ $category->main_category == 'Mechanical' ? 'selected' : '' }}>Mechanical</option>
                <option value="Consumable" {{ $category->main_category == 'Consumable' ? 'selected' : '' }}>Consumable</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-3">
            <label for="is_sellable" class="form-label">Sellable (*if available)</label>
        </div>
        <div class="col-md-6">
            <input type="checkbox" name="is_sellable" id="is_sellable" class="form-check-input" value="1"
                {{ $category->is_sellable ? 'checked' : '' }}>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary w-100">Update</button>
        </div>
    </div>

</form>




@endsection