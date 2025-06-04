@extends('demo')

@section('title', "Company's List")

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-12">
            <h3>Companies</h3>
            <a href="{{ route('companies.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Company
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Tax ID</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($companies as $company)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->tax_id ?? 'N/A' }}</td>
                            <td>
                                <span class="badge badge-{{ $company->is_active ? 'success' : 'danger' }}">
                                    {{ $company->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('companies.show', $company->id) }}" class="btn btn-sm btn-info" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No companies found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($companies->hasPages())
    <div class="row">
        <div class="col-md-12">
            {{ $companies->links() }}
        </div>
    </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            responsive: true,
            columnDefs: [
                { orderable: false, targets: [4] } // Disable sorting for actions column
            ]
        });
    });
</script>
@endsection