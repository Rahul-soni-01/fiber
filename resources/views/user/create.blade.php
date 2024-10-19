<x-layout>
    <x-slot name="title">Add User</x-slot>
    <x-slot name="main">
        <div class="container my-4" id="main1">
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
                <div class="container col-md-6 offset-md-3">
                    <div class="row m-2">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" name="type" list="select-type" class="form-control" placeholder="Select or enter a new type, Small Alpha Plz" required>
                        <datalist id="select-type">
                            @foreach($typies as $type)
                            <option value="{{ $type->type }}">
                            @endforeach
                        </datalist>    
                    </div>
                    <div class="row m-2">
                        <label for="dept" class="form-label">Department</label>
                        <select name="dept" id="dept" class="form-control" required>
                            <option value="">Select Department</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row m-2">
                        <label for="user_name" class="form-label">User Name</label>
                        <input type="text" name="user_name" id="user_name" class="form-control"
                            placeholder="Enter User Name" required>
                    </div>
                    <div class="row m-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email"
                            required>
                    </div>
                    <div class="row m-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" name="password" id="password" class="form-control"
                            placeholder="Enter Password" required>
                    </div>
                    <div class="row m-2">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                    </div>
                    <div class="col-md-3 mt-3">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </x-slot>
</x-layout>