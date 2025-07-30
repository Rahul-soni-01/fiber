@extends('demo')

@section('title', 'Estimate Details')

@section('content')
<div class="main" id="main">
    <h1>Estimate Details</h1>

    <a href="{{ route('estimates.index') }}" class="btn btn-primary mb-3">Back</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered text-dark">
                <tr>
                    <th>ID</th>
                    <td>{{ $estimate->id }}</td>
                </tr>
                <tr>
                    <th>In Date</th>
                    <td>{{ $estimate->in_date ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Serial No</th>
                    <td>{{ $estimate->sr_no ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ $estimate->price }}</td>
                </tr>
                <tr>
                    <th>CID</th>
                    <td>{{ $estimate->cid ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $estimate->created_at->format('d-m-Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $estimate->updated_at->format('d-m-Y H:i') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
