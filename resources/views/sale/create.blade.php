<x-layout>
    <x-slot name="title">Add Sale</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <form action="{{route('inward.good')}}" method="post">
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
                        <div class="col">Party Name</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="number" id="invoice_no" name="invoice_no" class="form-control"
                                placeholder="Enter Invoice no." required>
                        </div>
                        <div class="col-md-4">
                            {{-- <input type="date" id="date" name="date" class="form-control" placeholder="Enter Date" required> --}}
                            <input type="date" id="date" name="date" class="form-control" placeholder="Enter Date" value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
    
                        </div>
                        <div class="col-md-4">
                            <select id="party_name" name="party_name" class="form-control" placeholder="Enter Party Name"
                                required>
                                <option value="" disabled selected>Choose a Party</option>
                                @foreach($partyname as $party)
                                    <option value="{{ $party->id }}">{{ $party->party_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="cus-container mt-2">
                        <h1>Product Details</h1>
                        <div class="row">
                            <div class="col">Serial No.</div>
                            <div class="col">Price</div>
                            <div class="col"><button class="btn btn-info"> Add</button></div>
                        </div>
                        <div class="row custom-row g-2 align-items-center">
                            <div class="col">
                                <select required id="serial_no" class="form-control select2" name="product_name" onchange="serial_no_append()">
                                    <option value="">Select</option>
                                    @foreach($serial_nos as $serial_no)
                                    <option value="{{ $serial_no->id }}">{{ $serial_no->sr_no_fiber }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                               
                            </div>
                            <div class="col">

                            </div>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </x-slot>
</x-layout>