@extends('demo')
@section('title', 'Edit Department')

@section('content')

<div class="container mt-4 text-dark">
    <a href="{{ route('departments.index') }}" class="btn btn-primary mb-3">← Back to Departments</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops! Something went wrong:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h4 class="mb-4 fw-bold">Edit Department</h4>

                    <form action="{{ route('departments.update', $department->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Department Name</label>
                            <input type="text" name="name" id="name" class="form-control" 
                                placeholder="Enter Department Name" 
                                value="{{ old('name', $department->name) }}" required>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success px-4">🔄 Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
