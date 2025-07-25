@extends('demo')
@section('title', 'Show Inward')
@section('content')
<a href="{{ route('inward.good.view') }}" class="btn btn-primary mb-3">Add Inwards</a>

<h1>Show Purchase</h1>
<form action="{{ route('inward.search') }}" method="get">
    <div class="row mb-3">
        <!-- Date Inputs -->
        <div class="col-12 col-md-6 col-lg-3 mb-3">
            <input type="date" id="s_date" name="s_date" class="form-control" value="{{ request('s_date') }}">
        </div>
        <div class="col-12 col-md-6 col-lg-3 mb-3">
            <input type="date" id="e_date" name="e_date" class="form-control" value="{{ request('e_date') }}">
        </div>

        <!-- Invoice Number -->
        <div class="col-12 col-md-6 col-lg-3 mb-3">
            <input type="text" id="invoice_number" name="invoice_number" placeholder="Invoice Number" class="form-control" value="{{ request('invoice_number') }}">
        </div>

        <!-- Party Select -->
        <div class="col-12 col-md-6 col-lg-3 mb-3">
            <select name="p_name" id="sid" class="form-control">
                <option value="" disabled selected>Select Party</option>
                @foreach($tbl_parties as $tbl_party)
                <option value="{{ $tbl_party->id }}" {{ request('p_name')==$tbl_party->id ? 'selected' : '' }}>{{ $tbl_party->party_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-md-6 col-lg-3 mb-3">
            <select class="form-select" id="main_category" name="main_category" >
                    <option value=""  {{ request('main_category') ? '' : 'selected' }}>All
                    </option>
                    <option value="Electronic" {{ request('main_category')=='Electronic' ? 'selected' : '' }}>Electronic
                    </option>
                    <option value="Optical" {{ request('main_category')=='Optical' ? 'selected' : '' }}>Optical</option>
                    <option value="Mechanical" {{ request('main_category')=='Mechanical' ? 'selected' : '' }}>Mechanical
                    </option>
                    <option value="Consumable" {{ request('main_category')=='Consumable' ? 'selected' : '' }}>Consumable
                    </option>
                    <option value="Others" {{ request('main_category')=='Others' ? 'selected' : '' }}>Others</option>
                </select>
        </div>
        <!-- Amount Inputs -->
        <div class="col-12 col-md-6 col-lg-3 mb-3">
            <input type="text" id="amount" name="amount" placeholder="Amount" class="form-control">
        </div>
        <div class="col-12 col-md-6 col-lg-3 mb-3">
            <input type="text" id="amount_inr" name="amount_inr" placeholder="Amount in ₹" class="form-control">
        </div>

        <!-- Search Button -->
        <div class="col-12 col-md-6 col-lg-3 mb-3">
            <button type="submit" class="btn btn-dark w-100" id="search" name="search">Search</button>
        </div>
    </div>
</form>
<div class="table-responsive">
{{-- <table class="table text-white" id="inwardTable">
    <thead class="table-dark"> --}}
<table class="table text-dark">
    <thead class="bg-dark text-white">
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Invoice No</th>
            <th>Category</th>
            <th>Party Name</th>
            <th>Amount</th>
            <th>Rate(₹)</th>
            <th>Amount(₹)</th>
            <th>Shoping Cost</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($inwards as $inward)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$inward['date']}}</td>
            <td>{{$inward['invoice_no']}}</td>
            <td>{{$inward['main_category'] ?? 'N/A'}}</td>
            <td>{{$inward['party']['party_name']}}</td>
            <td>{{$inward['amount']}}</td>
            <td>{{$inward['inr_rate']}}</td>
            <td>{{$inward['inr_amount']}}</td>
            <td>{{$inward['shipping_cost']}}</td>
            <td><a href="{{ route('show_item.details', ['invoice_no' => $inward['invoice_no']]) }}" class="btn btn-sm btn-info"><i
                        class="ri-eye-fill"></i></a> 
                <a href="{{ route('inward.edit', ['invoice_no' => $inward['invoice_no']]) }}" class="btn btn-sm btn-warning" title="Edit">
                    <i class="ri-edit-line"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection