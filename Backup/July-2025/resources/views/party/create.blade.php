@extends('demo')
@section('title', 'Add Supplier')

@section('content')

<a href="{{ route('party.show') }}" class="btn btn-primary">Back to Supplier</a><form action="{{ route('party.store') }}" method="post">
    @csrf
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card border-0 shadow-lg rounded-3 bg-light">
                    <div class="card-header text-center py-4 bg-primary text-white">
                        <h3>Create New Supplier</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="party_name" class="form-label text-dark">Supplier Name</label>
                            <input type="text" name="party_name" class="form-control border-0 shadow-sm bg-light" placeholder="Enter Supplier Name" value="{{ old('party_name') }}">
                            @error('party_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="address" class="form-label text-dark">Address</label>
                            <input type="text" name="address" class="form-control border-0 shadow-sm bg-light" placeholder="Enter Supplier Address" value="{{ old('address') }}">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tele_no" class="form-label text-dark">Telephone No.</label>
                            <input type="number" name="tele_no" class="form-control border-0 shadow-sm bg-light" placeholder="Enter Phone No" value="{{ old('tele_no') }}">
                            @error('tele_no')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="contact_person_name" class="form-label text-dark">Contact Person Name</label>
                            <input type="text" name="contact_person_name" class="form-control border-0 shadow-sm bg-light" placeholder="Enter Person Name" value="{{ old('contact_person_name') }}">
                            @error('contact_person_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center mt-4">
                            <button class="btn btn-primary w-100 py-3 rounded-pill">Add Supplier</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



@endsection