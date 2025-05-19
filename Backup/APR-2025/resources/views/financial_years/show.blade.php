@extends('demo')

@section('title', 'Financial Year Details')

@section('content')

<h1>Financial Year Details</h1>

<div class="card bg-dark text-white p-4 mb-4">
    <h3>{{ $financialYear->name }}</h3>

    <p><strong>Start Date:</strong> {{ $financialYear->start_date->format('d-m-Y') }}</p>
    <p><strong>End Date:</strong> {{ $financialYear->end_date->format('d-m-Y') }}</p>
    <p>
        <strong>Status:</strong>
        @if ($financialYear->is_active)
            <span class="badge bg-success">Active</span>
        @else
            <span class="badge bg-secondary">Inactive</span>
        @endif
    </p>
</div>

<a href="{{ route('financial-years.edit', $financialYear->id) }}" class="btn btn-warning">Edit</a>
<a href="{{ route('financial-years.index') }}" class="btn btn-secondary">Back to List</a>

@endsection
