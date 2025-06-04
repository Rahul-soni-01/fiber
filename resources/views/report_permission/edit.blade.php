@extends('demo')

@section('title', 'Edit Report Permission')

@section('content')

<h1>Edit Report Permission</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('report-permission.update', $reportPermission->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="user_type" class="form-label">User Type</label>
        <select name="user_type" id="user_type" class="form-control select2" required>
            <option value="">Select User Type</option>
            @foreach ($user_types as $type)
                <option value="{{ $type }}" {{ $reportPermission->user_type == $type ? 'selected' : '' }}>
                    {{ ucfirst($type) }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="field_name" class="form-label">Select Fields</label>
        <select name="field_name[]" id="field_name" class="form-control select2" multiple="multiple" required>
            @php
                $allFields = ['part', 'temp', 'worker_name', 'sr_no_fiber', 'mj', 'warranty', 'type'];
                $selectedFields = is_array($reportPermission->field_name) ? $reportPermission->field_name : json_decode($reportPermission->field_name, true);
            @endphp
            @foreach ($allFields as $field)
                <option value="{{ $field }}" {{ in_array($field, $selectedFields) ? 'selected' : '' }}>
                    {{ $field }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('report-permission.index') }}" class="btn btn-secondary">Cancel</a>
</form>

{{-- Select2 Init --}}
<script>
    $(document).ready(function() {
        $('#user_type, #field_name').select2({
            placeholder: "Select"
        });
    });
</script>

@endsection
