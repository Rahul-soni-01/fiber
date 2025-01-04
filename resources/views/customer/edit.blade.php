<x-layout>
    <x-slot name="title">Edit Customer</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <a href="{{ route('party.show') }}" class="btn btn-primary mb-2">Back to Customer</a>
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
                        
                            <div class="mb-3 col-md-4">
                                <label for="customer_name">Customer Name</label>
                                <input type="text" name="customer_name" class="form-control"
                                    value="{{ old('customer_name', $customer->customer_name) }}" placeholder="Enter Customer Name">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control"
                                    value="{{ old('address', $customer->address) }}" placeholder="Enter Customer Address">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="pincode">Pincode</label>
                                <input type="text" name="pincode" class="form-control"
                                    value="{{ old('pincode', $customer->pincode) }}" placeholder="Enter Pincode">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="city">City</label>
                                <input type="text" name="city" class="form-control"
                                    value="{{ old('city', $customer->city) }}" placeholder="Enter City">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="state">State</label>
                                <input type="text" name="state" class="form-control"
                                    value="{{ old('state', $customer->state) }}" placeholder="Enter State">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="telephone_no">Telephone No.</label>
                                <input type="number" name="telephone_no" class="form-control" 
                                    value="{{ old('telephone_no', $customer->telephone_no) }}" placeholder="Enter Telephone No">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="receiver_name">Receiver Name</label>
                                <input type="text" name="receiver_name" class="form-control"
                                    value="{{ old('receiver_name', $customer->receiver_name) }}" placeholder="Enter Receiver Name">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="gst_no">GSTIN</label>
                                <input type="text" value="{{ old('gst_no', $customer->gst_no) }}" name="gst_no" class="form-control" placeholder="Enter GST No..." >
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="ship_address">Shipping Address</label>
                                <input type="text" name="ship_address" class="form-control"
                                    value="{{ old('ship_address', $customer->ship_address) }}" placeholder="Enter Shipping Address">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="ship_pincode">Shipping Pincode</label>
                                <input type="text" name="ship_pincode" class="form-control"
                                    value="{{ old('ship_pincode', $customer->ship_pincode) }}" placeholder="Enter Shipping Pincode">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="ship_city">Shipping City</label>
                                <input type="text" name="ship_city" class="form-control"
                                    value="{{ old('ship_city', $customer->ship_city) }}" placeholder="Enter Shipping City">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="ship_state">Shipping State</label>
                                <input type="text" name="ship_state" class="form-control"
                                    value="{{ old('ship_state', $customer->ship_state) }}" placeholder="Enter Shipping State">
                            </div>
                            <div class="text-center"> <!-- Centering the button -->
                                <button class="btn btn-success">Update Customer</button>
                            </div>
                    </div>
                </div>
            </form>
            
        </div>
    </x-slot>
</x-layout>