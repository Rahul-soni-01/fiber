@extends('demo')
@section('title', 'Customer')

@section('content')
<h1>Customer</h1>
        <div class="main1" id="main1">
            @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('customer.store') }}" method="post">
                @csrf
                <div class="container">
                    <div class="row justify-content-center">
                        <!-- Centering the form on larger screens -->

                        <div class="mb-3 col-md-4">
                            <label for="customer_name">Customer Name</label>
                            <input type="text" name="customer_name" class="form-control"
                                placeholder="Enter Customer Name" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="pincode">Pincode</label>
                            <input type="text" name="pincode" class="form-control" placeholder="Enter Pincode" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" placeholder="Enter City" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="state">State</label>
                            <input type="text" name="state" class="form-control" placeholder="Enter State" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="telephone_no">Telephone No.</label>
                            <input type="number" name="telephone_no" class="form-control"
                                placeholder="Enter Telephone No" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="receiver_name">Receiver Name</label>
                            <input type="text" name="receiver_name" class="form-control"
                                placeholder="Enter Receiver Name" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="gst_no">GSTIN</label>
                            <input type="text" name="gst_no" class="form-control" placeholder="Enter GST No...">
                        </div>

                        <div class="mb-3 col-md-4">
                            <label for="ship_address">Shipping Address</label>
                            <input type="text" name="ship_address" class="form-control" placeholder="Enter Shipping Address" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="ship_pincode">Shipping Pincode</label>
                            <input type="text" name="ship_pincode" class="form-control" placeholder="Enter Shipping Pincode" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="ship_city">Shipping City</label>
                            <input type="text" name="ship_city" class="form-control" placeholder="Enter Shipping City" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="ship_state"> Shipping State</label>
                            <input type="text" name="ship_state" class="form-control" placeholder="Enter Shipping State" required>
                        </div>
                        
                        <div class="text-center col-md-4">
                            <button class="btn btn-success">Add Customer</button>
                        </div>

                    </div>
                </div>
            </form>

        </div>
@endsection