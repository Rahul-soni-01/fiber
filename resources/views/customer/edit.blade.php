<x-layout>
    <x-slot name="title">Edit Party</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <a href="{{ route('party.show') }}" class="btn btn-primary mb-2">Back to Departments</a>
            @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
           
            <form action="{{ route('customer.update', $customer->id) }}" method="post">
                @csrf
                @method('PUT') <!-- This directive is required for updating data -->
                <div class="container">
                    <div class="row justify-content-center"> <!-- Centering the form on larger screens -->
                        <div class="col-12 col-lg-6"> <!-- Full width on mobile, 50% on larger screens -->
                            <div class="mb-3">
                                <label for="customer_name">Customer Name</label>
                                <input type="text" name="customer_name" class="form-control"
                                    value="{{ old('customer_name', $customer->customer_name) }}" placeholder="Enter Customer Name">
                            </div>
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control"
                                    value="{{ old('address', $customer->address) }}" placeholder="Enter Customer Address">
                            </div>
                            <div class="mb-3">
                                <label for="telephone_no">Telephone No.</label>
                                <input type="number" name="telephone_no" class="form-control" 
                                    value="{{ old('telephone_no', $customer->telephone_no) }}" placeholder="Enter Telephone No">
                            </div>
                            <div class="mb-3">
                                <label for="receiver_name">Receiver Name</label>
                                <input type="text" name="receiver_name" class="form-control"
                                    value="{{ old('receiver_name', $customer->receiver_name) }}" placeholder="Enter Receiver Name">
                            </div>
                            <div class="mb-3">
                                <label for="gst_no">GSTIN</label>
                                <input type="text" value="{{ old('gst_no', $customer->gst_no) }}" name="gst_no" class="form-control" placeholder="Enter GST No..." >
                            </div>
                            <div class="text-center"> <!-- Centering the button -->
                                <button class="btn btn-success">Update Customer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
    </x-slot>
</x-layout>