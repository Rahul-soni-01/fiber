@extends('demo')
@section('title', 'Add User Permission')

@section('content')
<a href="{{ route('manage.permissions') }}" class="btn btn-primary">Back to Permission</a>
@if ($errors->any())
<div style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('manage.permissions.store' ) }}" method="POST">
    @csrf
    <div class="container">
        <div class="row m-3">
            <!-- Centering the form on larger screens -->
            <div class="col-12 ">

                <div class="mb-3 col-md-4">
                    <label for="party_name">User Name</label>
                    <select id="party_name" name="uid" class="form-control" placeholder="Enter Name" required>
                        <option value="" disabled selected>Choose a Users</option>
                        @foreach($unassignedUsers as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <h5>Departments</h5>
                <div class="row mt-2">
                    @foreach ($departments as $department)
                    <div class="col-md-4 mt-2">
                        <div class="form-check border-bottom-3 border-primary">
                            <input type="checkbox" class="form-check-input" name="d_id[]" value="{{ $department->id }}"
                                id="department_{{ $department->id }}">
                            <label class="form-check-label" for="department_{{ $department->id }}">
                                {{ $department->name }}
                            </label>
                        </div>
                        <div class="permissions-list ms-3">

                            @foreach ($permissions as $permission)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="p_id[{{ $department->id }}][]"
                                    value="{{ $permission->id }}"
                                    id="permission_{{ $department->id }}_{{ $permission->id }}">
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
                <button type="submit" class="btn btn-success mt-3">Submit</button>
            </div>
        </div>
    </div>
</form>
@endsection