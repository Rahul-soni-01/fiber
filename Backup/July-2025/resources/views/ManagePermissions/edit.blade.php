@extends('demo')
@section('title', 'Edit Permission')

@section('content')
<h3>Department Name:- {{ optional($managePermission->user->department)->name ?? 'ADMIN' }}</h3>
<a href="{{ route('manage.permissions') }}" class="btn btn-primary">Back to Permission</a>
<form action="{{ route('manage-permissions.update', $managePermission->id) }}" method="POST">
    @csrf
    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <label>Departments</label>
                <div class="row mt-2">
                    @php
                    // Decode the JSON data
                    $d_ids = is_array($managePermission->d_id) ? $managePermission->d_id :
                    json_decode($managePermission->d_id);
                    $p_ids = is_array($managePermission->p_id) ? $managePermission->p_id :
                    json_decode($managePermission->p_id, true);
                    @endphp

                    @foreach ($departments as $department)
                    <div class="col-md-4 mt-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="d_id[]" value="{{ $department->id }}"
                                id="department_{{ $department->id }}" {{ in_array($department->id, $d_ids) ? 'checked' :
                            '' }}>
                            <label class="form-check-label" for="department_{{ $department->id }}">
                                {{ $department->name }}
                            </label>
                        </div>

                        <div class="permissions-list ml-4">
                            @php
                            // Get the permissions for the current department
                            $departmentPermissions = isset($p_ids[$department->id]) ? $p_ids[$department->id] : [];
                            @endphp

                            @foreach ($permissions as $permission)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="p_id[{{ $department->id }}][]"
                                    value="{{ $permission->id }}"
                                    id="permission_{{ $department->id }}_{{ $permission->id }}" {{
                                    in_array($permission->id, $departmentPermissions) ? 'checked' : '' }}
                                >
                                <label class="form-check-label"
                                    for="permission_{{ $department->id }}_{{ $permission->id }}">
                                    {{ $permission->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach

                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </div>
</form>

@endsection