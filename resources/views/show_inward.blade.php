@extends('demo')
@section('title', 'Show Inward')

@section('content')
<form action="{{ route('inward.search')}}" method="get">
    <div class="row mb-3">
        <div class="col">
            <input type="date" id="s_date" name="s_date" class="form-control" value="{{ request('s_date') }}">
        </div>
        <div class="col">
            <input type="date" id="e_date" name="e_date" class="form-control" value="{{ request('e_date') }}">
        </div>
        <div class="col">
            <input type="text" id="invoice_number" name="invoice_number" placeholder="Invoice Number"
                class="form-control" value="{{ request('invoice_number') }}">
        </div>
        <div class="col">
            <select name="p_name" id="sid" class="form-control">
                <option value="" disabled selected>Select Party</option>
                @foreach($tbl_parties as $tbl_party)
                <option value="{{ $tbl_party->id }}" {{ request('p_name')==$tbl_party->id ? 'selected' : ''
                    }} >{{ $tbl_party->party_name }}</option>
                @endforeach
            </select>

        </div>
        <div class="col">
            <input type="text" id="amount" name="amount" placeholder="Amount" class="form-control">
        </div>
        <div class="col"><input type="text" id="amount_inr" name="amount_inr" placeholder="Amount (₹)"
                class="form-control"></div>
        <div class="col">
            <form method="post"><button type="submit" class="btn btn-dark" id="search" name="search">Search</button>
            </form>
        </div>
    </div>
</form>

<table class="table text-white" id="inwardTable">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Invoice No</th>
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
            <td>{{$inward['party_name']}}</td>
            <td>{{$inward['amount']}}</td>
            <td>{{$inward['inr_rate']}}</td>
            <td>{{$inward['inr_amount']}}</td>
            <td>{{$inward['shipping_cost']}}</td>
            <td><a href="{{ route('show_item.details', ['invoice_no' => $inward['invoice_no']]) }}"><i
                        class="ri-eye-fill"></i></a> </td>

        </tr>
        @endforeach

    </tbody>
</table>
@endsection