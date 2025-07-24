@extends('demo')

@section('title', 'Show Permission')



@section('content')

<a href="{{ route('manage.permissions.create') }}" class="btn btn-primary mb-3">Add User Permission</a>

@if ($errors->any())

<div style="color: red;">

    <ul>

        @foreach ($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif


<div class="table-responsive">
<table class="table text-dark">

    <thead class="bg-dark text-white">

        <tr>

            <th>ID</th>

            <th>User</th>

            <th>Department Permission</th>

            {{-- <th>Permissions</th> --}}

            <th>Action</th>

        </tr>

    </thead>

    <tbody>

        @foreach($managePermissions as $permission)

        <tr>

            <td>{{ $permission->id }}</td>

            <td>{{ $permission->user->name ?? 'N/A' }}</td>

            <td>

                @foreach($permission->departments as $department)

                {{ $department->name }},

                @endforeach

            </td>

            {{-- <td>

                @foreach($permission->permissions as $perm)

                {{ $perm->name }}<br>

                @endforeach

            </td> --}}

            <td>

                <a href="{{ route('managePermissions.departments', ['id' => $permission->id ]) }}" class="btn btn-sm btn-warning"><i

                        class="ri-pencil-fill"></i></a>

            </td>

        </tr>

        @endforeach

    </tbody>

</table>
</div>
@endsection