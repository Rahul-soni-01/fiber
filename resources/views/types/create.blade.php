@extends('demo')
@section('title', 'Add Types')

@section('content')

<div class="container mt-4 text-dark">
    <a href="{{ route('type.index') }}" class="btn btn-primary mb-3">← Back to Types</a>

    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h4 class="mb-4 fw-bold">Add Type</h4>

                    <form action="{{ route('type.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Type Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Type Name" required>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success px-4">➕ Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
