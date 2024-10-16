<x-layout>
    <x-slot name="title">Show Permission</x-slot>
    <x-slot name="main">
        <div class="main" id="main" style="">
            <a href="{{ route('manage.permissions.create') }}" class="btn btn-primary m-3">Add User Permission</a>
            @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <table class="table table-striped">
                <thead class="table-dark">
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
                        <td>{{ $permission->user->name }}</td>
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
                            <a href="{{ route('managePermissions.departments', ['id' => $permission->id ]) }}"><i class="ri-eye-fill"></i></a> 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-layout>