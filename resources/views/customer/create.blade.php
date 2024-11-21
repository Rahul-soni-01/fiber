<x-layout>
    <x-slot name="title">Add Customer</x-slot>
    <x-slot name="main">
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
                    <div class="row justify-content-center"> <!-- Centering the form on larger screens -->
                        <div class="col-12 col-lg-6"> <!-- Full width on mobile, 50% on larger screens -->
                            <div class="mb-3">
                                <label for="customer_name">Customer Name</label>
                                <input type="text" name="customer_name" class="form-control" placeholder="Enter Customer Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
                            </div>
                            <div class="mb-3">
                                <label for="telephone_no">Telephone No.</label>
                                <input type="number" name="telephone_no" class="form-control" placeholder="Enter Telephone No" required>
                            </div>
                            <div class="mb-3">
                                <label for="receiver_name">Receiver Name</label>
                                <input type="text" name="receiver_name" class="form-control" placeholder="Enter Receiver Name" required>
                            </div>
                            <div class="text-center"> <!-- Centering the button -->
                                <button class="btn btn-dark">Add Customer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
    </x-slot>
</x-layout>