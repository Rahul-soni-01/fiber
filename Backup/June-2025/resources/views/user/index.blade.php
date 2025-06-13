@extends('demo')
@section('title', 'Show All Users')
@section('content')

<div class="container mt-4 text-dark">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">All Users</h4>
        <a href="{{ route('user.create') }}" class="btn btn-success">➕ Add User</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle text-dark">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td class="fw-semibold">{{ $user->name }}</td>
                    <td>{{ ucfirst($user->type) }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                        <a href="{{ route('user.edit', ['user_id' => $user->id]) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                            <i class="ri-pencil-fill"></i>
                        </a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                <i class="ri-delete-bin-6-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">No users found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
