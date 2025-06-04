@extends('demo')

@section('title', 'View Report Permission')

@section('content')

<h1>Report Permission Details</h1>

<div class="card text-dark">
    <div class="card-body">
        <h5 class="card-title">User Type</h5>
        <p class="card-text">{{ ucfirst($reportPermission->user_type) }}</p>

        <h5 class="card-title">Fields Allowed</h5>
        <ul>
            @php
                $fields = is_array($reportPermission->field_name)
                            ? $reportPermission->field_name
                            : json_decode($reportPermission->field_name, true);
            @endphp

            @foreach ($fields as $field)
                <li>{{ $field }}</li>
            @endforeach
        </ul>

        <a href="{{ route('report-permission.index') }}" class="btn btn-secondary mt-3">Back</a>
        <a href="{{ route('report-permission.edit', $reportPermission->id) }}" class="btn btn-warning mt-3">Edit</a>
    </div>
</div>

@endsection
