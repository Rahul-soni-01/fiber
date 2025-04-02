@extends('demo')

@section('title', 'Edit User')



@section('content')

<a href="{{ route('user.index') }}" class="btn btn-primary">Back to List</a>



<form action="{{ route('user.update', $user->id) }}" method="post">

    @csrf

    @method('PUT')

    <!-- Simulate PUT method for updating -->


    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-white">

                <!-- Display validation errors -->

                @if ($errors->any())

                <div class="alert alert-danger">

                    <ul>

                        @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

                @endif



                <!-- Type Field with Datalist -->

                <div class="row m-2">

                    <label for="type" class="form-label">Type</label>

                    <input type="text" name="type" list="select-type" class="form-control"
                        value="{{ old('type', $user->type) }}" placeholder="Select or enter a new type" required>

                    <datalist id="select-type">

                        @foreach($typies as $type)

                        <option value="{{ $type->type }}"></option>

                        @endforeach

                    </datalist>

                </div>



                <!-- Department Field -->

                <div class="row m-2">

                    <label for="dept" class="form-label">Department</label>

                    <select name="dept" id="dept" class="form-control" required>

                        <option value="">Select Department</option>

                        @foreach($departments as $department)

                        <option value="{{ $department->id }}" {{ old('dept', $user->d_id) == $department->id ?
                            'selected' : ''

                            }}>

                            {{ $department->name }}

                        </option>

                        @endforeach

                    </select>

                </div>



                <!-- User Name Field -->

                <div class="row m-2">

                    <label for="user_name" class="form-label">User Name</label>

                    <input type="text" name="user_name" id="user_name" class="form-control"
                        value="{{ old('user_name', $user->name) }}" placeholder="Enter User Name" required>

                </div>



                <!-- Email Field -->

                <div class="row m-2">

                    <label for="email" class="form-label">Email</label>

                    <input type="email" name="email" id="email" class="form-control"
                        value="{{ old('email', $user->email) }}" placeholder="Enter Email" required>

                </div>



                <!-- Password Field -->

                <div class="row m-2">

                    <label for="password" class="form-label">Password (Leave blank if not changing)</label>

                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Enter Password">

                </div>



                <div class="row m-2">

                    <label for="password_confirmation" class="form-label">Confirm Password</label>

                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                        placeholder="Confirm Password">

                </div>

                <!-- Submit Button -->

                <div class="col-md-3 mt-3">

                    <button type="submit" class="btn btn-dark">Update</button>

                </div>

            </div>
        </div>
    </div>

</form>



@endsection