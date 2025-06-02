@extends('demo')

@section('title', 'Add Report Permission')

@section('content')

<h1>Add Report Permission</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('report-permission.store') }}" method="POST">
    @csrf

    <div class="mb-3">
    <label for="user_type" class="form-label">User Type</label>
    <select name="user_type" id="user_type" class="form-control" required>
        <option value="">Select User Type</option>
        @foreach ($user_types as $type)
            <option value="{{ $type }}" {{ old('user_type') == $type ? 'selected' : '' }}>
                {{ ucfirst($type) }}
            </option>
        @endforeach
    </select>
</div>


    <div class="mb-3">
        <label for="field_name" class="form-label">Fields (comma separated)</label>
        <select name="field_name[]" id="field_name" class="form-control select2 text-dark" multiple="multiple" required>
            <option value="part">part</option>
            <option value="temp">temp</option>
            <option value="worker_name">worker_name</option>
            <option value="sr_no_fiber">sr_no_fiber</option>
            <option value="mj">mj</option>
            <option value="warranty">warranty</option>
            <option value="type">type</option>
        </select>
        <small class="form-text text-muted">Enter multiple fields separated by commas.</small>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('report-permission.index') }}" class="btn btn-secondary">Cancel</a>
</form>

@endsection
