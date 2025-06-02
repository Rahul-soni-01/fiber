@extends('demo')

@section('title', 'Edit Financial Year')

@section('content')

<h1>Edit Financial Year</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>There were some problems with your input:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('financial-years.update', $financialYear->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Financial Year Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $financialYear->name) }}" class="form-control" placeholder="e.g. 2024-2025" required>
    </div>

    <div class="mb-3">
        <label for="start_date" class="form-label">Start Date</label>
        <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $financialYear->start_date->format('Y-m-d')) }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="end_date" class="form-label">End Date</label>
        <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $financialYear->end_date->format('Y-m-d')) }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="is_active" class="form-label">Is Active</label>
        <select name="is_active" id="is_active" class="form-control" required>
            <option value="0" {{ old('is_active', $financialYear->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
            <option value="1" {{ old('is_active', $financialYear->is_active) == 1 ? 'selected' : '' }}>Active</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('financial-years.index') }}" class="btn btn-secondary">Cancel</a>
</form>

@endsection
