@extends('demo')

@section('title', 'Add Supplier')



@section('content')

        <div class="text-white">

            <a href="{{ route('party.show') }}" class="btn btn-primary">Back to Supplier</a>

            <form action="{{ route('party.store') }}" method="post">

                @csrf

                <div class="container">

                    <div class="row justify-content-center"> <!-- Centering the form on larger screens -->
                        <div class="col-12 col-lg-6"> <!-- Full width on mobile, 50% on larger screens -->
                            <div class="mb-3">
                                <span for="party_name">Supplier Name</span>
                                <input type="text" name="party_name" class="form-control" placeholder="Enter Supplier Name" value="{{ old('party_name') }}">
                                @error('party_name')
                                    <div class="text-danger">{{ $message }}</div> <!-- Display validation error message -->
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Enter Supplier Address" value="{{ old('address') }}">
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div> <!-- Display validation error message -->
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="tele_no">Telephone No.</label>
                                <input type="number" name="tele_no" class="form-control" placeholder="Enter Ph/No" value="{{ old('tele_no') }}">
                                @error('tele_no')
                                    <div class="text-danger">{{ $message }}</div> <!-- Display validation error message -->
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="contact_person_name">Contact Person Name</label>
                                <input type="text" name="contact_person_name" class="form-control" placeholder="Enter Person Name" value="{{ old('contact_person_name') }}">
                                @error('contact_person_name')
                                    <div class="text-danger">{{ $message }}</div> <!-- Display validation error message -->
                                @enderror
                            </div>
                        
                            <div class="text-center"> <!-- Centering the button -->
                                <button class="btn btn-success">Add Party</button>
                            </div>
                        </div>

                    </div>

                </div>



            </form>

        </div>

@endsection