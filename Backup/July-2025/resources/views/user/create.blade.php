@extends('demo')

@section('title', 'Add User')

@section('content')

<div class="container my-4">
    <a href="{{ route('user.index') }}" class="btn btn-primary mb-3">← Back to List</a>

    <!-- Show Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Add User Form -->
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">

                <!-- Type -->
                <div class="mb-3">
                    <label for="type" class="form-label">Type <small>(small letters only)</small></label>
                    <input type="text" name="type" list="select-type" class="form-control text-lowercase"
                        placeholder="Enter or select user type" required>
                    <datalist id="select-type">
                        @foreach($typies as $type)
                            <option value="{{ $type->type }}">
                        @endforeach
                    </datalist>
                </div>

                <!-- Department -->
                <div class="mb-3">
                    <label for="dept" class="form-label">Department</label>
                    <select name="dept" id="dept" class="form-control" required>
                        <option value="">-- Select Department --</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- User Name -->
                <div class="mb-3">
                    <label for="user_name" class="form-label">User Name</label>
                    <input type="text" name="user_name" id="user_name" class="form-control"
                        placeholder="Enter user name" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control"
                        placeholder="Enter email" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Enter password" required>
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="form-control" placeholder="Confirm password" required>
                </div>

                <!-- Submit Button -->
                <div class="text-end">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>

            </div>
        </div>
    </form>
</div>

@endsection
