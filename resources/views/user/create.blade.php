@extends('demo')

@section('title', 'Add Userr')



@section('content')

<div class="container my-4" id="">

    <a href="{{ route('user.index') }}" class="btn btn-primary">Back to List</a>

    <!-- Form to Add Type -->

    {{-- <form action="route('type.add') " method="post">

        @csrf



        <div class="row mb-3">

            <div class="col-md-3">

                <h3>Type</h3>

            </div>

            <div class="col-md-6">

                <input type="text" class="form-control" name="type_name" id="type_name" placeholder="Enter Type"

                    required>

            </div>

            <div class="col-md-3">

                <button type="submit" class="btn btn-dark">Submit</button>

            </div>

        </div>

    </form> --}}



    <!-- Form to Add Sub Category -->

    <form action="{{route('user.store')}}" method="post">

        @csrf

        @if ($errors->any())

        <div class="alert alert-danger">

            <ul>

                @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

        @endif

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-white">
                    <form action="{{route('user.store')}}" method="post">
                        <!-- Type Field -->
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <input type="text" name="type" list="select-type" class="form-control text-lowercase"
                                placeholder="Select or enter a new type, Small Alpha Plz" required>
                            <datalist id="select-type">
                                @foreach($typies as $type)
                                <option value="{{ $type->type }}">
                                @endforeach
                            </datalist>
                        </div>
        
                        <!-- Department Field -->
                        <div class="mb-3">
                            <label for="dept" class="form-label">Department</label>
                            <select name="dept" id="dept" class="form-control" required>
                                <option value="">Select Department</option>
                                @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
        
                        <!-- User Name Field -->
                        <div class="mb-3">
                            <label for="user_name" class="form-label">User Name</label>
                            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter User Name"
                                required>
                        </div>
        
                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required>
                        </div>
        
                        <!-- Password Field -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password"
                                required>
                        </div>
        
                        <!-- Confirm Password Field -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                                placeholder="Confirm Password" required>
                        </div>
        
                        <!-- Submit Button -->
                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        

    </form>

</div>

@endsection