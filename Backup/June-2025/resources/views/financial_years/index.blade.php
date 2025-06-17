@extends('demo')
@section('title', 'Financial Years')
@section('content')

<h1>Financial Years</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('financial-years.create') }}" class="btn btn-primary mb-3">Add Financial Year</a>

<div class="table-responsive">
    <table class="table text-dark">
        <thead class="table-dark text-white">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Is Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($financialYears as $fy)
                <tr>
                    <td>{{ $fy->id }}</td>
                    <td>{{ $fy->name }}</td>
                    <td>{{ $fy->start_date->format('d-m-Y') }}</td>
                    <td>{{ $fy->end_date->format('d-m-Y') }}</td>
                    <td>
                        @if ($fy->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('financial-years.edit', $fy->id) }}" class="btn btn-sm btn-warning">
                            <i class="ri-pencil-fill"></i>
                        </a>

                        <form action="{{ route('financial-years.destroy', $fy->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this financial year?');" class="btn btn-sm btn-danger">
                                <i class="ri-delete-bin-fill"></i>
                            </button>
                        </form>

                        <a href="{{ route('financial-years.show', $fy->id) }}" class="btn btn-sm btn-info">
                            <i class="ri-eye-fill"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-center">No financial years found.</td>
                    <td></td>
                    <td></td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
