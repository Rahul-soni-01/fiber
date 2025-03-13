@extends('demo')
@section('title', 'Add Supplier')

@section('content')
    <div class="text-white" id="">
        <a href="{{ route('party.show') }}" class="btn btn-primary">Back to Supplier</a>
        @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <form action="{{ route('party.update', $party->id) }}" method="post">
            @csrf
            @method('PUT') <!-- This directive is required for updating data -->
            <div class="container">
                <div class="row justify-content-center"> <!-- Centering the form on larger screens -->
                    <div class="col-12 col-lg-6"> <!-- Full width on mobile, 50% on larger screens -->
                        <div class="mb-3">
                            <label for="party_name">Supplier Name</label>
                            <input type="text" name="party_name" class="form-control"
                                value="{{ old('party_name', $party->party_name) }}" placeholder="Enter Supplier Name">
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control"
                                value="{{ old('address', $party->address) }}" placeholder="Enter Supplier Address">
                        </div>
                        <div class="mb-3">
                            <label for="tele_no">Telephone No.</label>
                            <input type="number" name="tele_no" class="form-control" 
                                value="{{ old('tele_no', $party->telephone_no) }}" placeholder="Enter Ph/No">
                        </div>
                        <div class="mb-3">
                            <label for="contact_person_name">Contact Person Name</label>
                            <input type="text" name="contact_person_name" class="form-control"
                                value="{{ old('contact_person_name', $party->sender_name) }}" placeholder="Enter Person Name">
                        </div>
                        <div class="text-center"> <!-- Centering the button -->
                            <button class="btn btn-success">Update Supplier</button>
                        </div>
                    </div>
                </div>
            </div>
        </form> 
    </div>
@endsection