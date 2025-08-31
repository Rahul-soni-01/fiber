@extends('demo')
@section('title', 'Edit Estimate')

@section('content')
<h1>Edit Estimate</h1>
<div class="main" id="main">
    <a href="{{ route('estimates.index') }}" class="btn btn-primary">Back</a>

    @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('estimates.update', $estimate->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="in_date" class="form-label">In Date</label>
                <input type="date" name="in_date" id="in_date" class="form-control" value="{{ old('in_date', $estimate->in_date) }}">
            </div>
            <div class="col-md-6">
                <label for="sr_no" class="form-label">Serial Number</label>
                <input type="text" name="sr_no" id="sr_no" class="form-control" value="{{ old('sr_no', $estimate->sr_no) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price', $estimate->price) }}">
            </div>
            <div class="col-md-6">
                <label for="cid" class="form-label">Customer Name</label>
                <input type="text" name="cid" id="cid" class="form-control" value="{{ old('cid', $estimate->cid) }}">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">Update Estimate</button>
            </div>
        </div>
    </form>
</div>
@endsection
