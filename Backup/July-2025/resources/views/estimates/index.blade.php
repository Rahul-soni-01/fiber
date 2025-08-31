@extends('demo')

@section('title', 'Estimates')

@section('content')
<div class="main" id="main">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('estimates.create') }}" class="btn btn-primary mb-3">Add Estimate</a>

    <table class="table text-dark">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>In Date</th>
                <th>Serial No</th>
                <th>Price</th>
                <th>Customer Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($estimates as $estimate)
                <tr>
                    <td>{{ $estimate->id }}</td>
                    <td>{{ $estimate->in_date ?? 'N/A' }}</td>
                    <td>{{ $estimate->sr_no ?? 'N/A' }}</td>
                    <td>{{ $estimate->price }}</td>
                    <td>{{ $estimate->cid ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('estimates.edit', $estimate->id) }}" class="btn btn-sm btn-warning">
                            <i class="ri-pencil-fill"></i>
                        </a>
                        <form action="{{ route('estimates.destroy', $estimate->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this estimate?');"
                                class="btn btn-sm btn-danger">
                                <i class="ri-delete-bin-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No estimates found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
