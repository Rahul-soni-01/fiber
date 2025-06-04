@extends('demo')

@section('title', 'Report Permissions')

@section('content')

<h1>Report Permissions</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('report-permission.create') }}" class="btn btn-primary mb-3">Add Report Permission</a>

<div class="table-responsive">
    <table class="table text-white">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>User Type</th>
                <th>Fields</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($permissions as $perm)
                <tr>
                    <td>{{ $perm->id }}</td>
                    <td>{{ $perm->user_type }}</td>
                    <td>
                        @foreach ($perm->field_name as $field)
                            <span class="badge bg-info text-dark">{{ $field }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('report-permission.edit', $perm->id) }}" class="btn btn-sm btn-warning">
                            <i class="ri-pencil-fill"></i>
                        </a>

                        <form action="{{ route('report-permission.destroy', $perm->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this permission?');" class="btn btn-sm btn-danger">
                                <i class="ri-delete-bin-fill"></i>
                            </button>
                        </form>

                        <a href="{{ route('report-permission.show', $perm->id) }}" class="btn btn-sm btn-info">
                            <i class="ri-eye-fill"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td></td>
                    <td class="text-center">No report permissions found.</td>
                    <td></td>
                    <td></td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
