<x-layout>
    <x-slot name="title">Add Sale</x-slot>
    <x-slot name="main">
        <a href="{{ route('sale.index') }}" class="btn btn-primary">Back to Sale</a>
        <div class="main" id="main">
            <form action="{{route('sale.store')}}" method="post">
                @csrf

                @if ($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="container">
                    <div class="row">
                        <div class="col">Invoice No.</div>
                        <div class="col">Date</div>
                        <div class="col">Customer Name</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="number" id="invoice_no" name="invoice_no" class="form-control"
                                placeholder="Enter Invoice no." required>
                        </div>
                        <div class="col-md-4">
                            <input type="date" id="date" name="date" class="form-control" placeholder="Enter Date"
                                value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
                        </div>
                        <div class="col-md-4">
                            <select id="party_name" name="cid" class="form-control"
                                placeholder="Enter Party Name" required>
                                <option value="" disabled selected>Choose a Customer</option>
                                @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="cus-container mt-2">
                        <h1>Product Details</h1>
                        <div class="row">
                            <div class="col">Serial No.</div>
                            <div class="col">Price</div>
                            <div class="col"><button class="btn btn-info" type="button" onclick="SaleRowadd({{$serial_nos}})">
                                    Add</button></div>
                        </div>
                        <div id="row-container">
                            <div class="row custom-row mt-2 g-2 align-items-center">
                                <div class="col">
                                    <select required id="serial_no" class="form-control select2" name="serial_no[]"
                                        onchange="serial_no_append(0,event)">
                                        <option value="">Select</option>
                                        @foreach($serial_nos as $serial_no)
                                            <option value="{{ $serial_no->id }}">{{ $serial_no->sr_no_fiber }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    @foreach($serial_nos as $serial_no)
                                    <span id="{{ $serial_no->id }}" class="final_amount cstmspan_0" style="display: none">{{
                                        $serial_no->final_amount}}</span>
                                    @endforeach
                                </div>
                                <div class="col">

                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 g-2 align-items-center">
                            <div class="col">
                                <h5> Final Price</h5>
                            </div>
                            <div class="col">
                                <input type="text" id="final_price" name="total_amount" class="form-control" >
                            </div>
                            <div class="col">

                            </div>
                            
                        </div>
                        <div class="row mt-5 g-2 align-items-center">
                            <div class="col">
                                <h5> Note</h5>
                            </div>
                            <div class="col">
                                <textarea id="note" name="note" class="form-control"></textarea>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                        <div class="d-flex m-5 justify-content-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </x-slot>
</x-layout>