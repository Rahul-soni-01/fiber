@extends('demo')
@section('title', 'Customer')
@section('content')
<h1>Customer</h1>
<style>
    .nav-tabs .nav-link {
        color: #343a40;
        /* Dark grey text */
        border: 1px solid #dee2e6;
        border-bottom: none;
        background-color: #3a6085;
        /* Light gray */
        margin-right: 4px;
        font-weight: 500;
    }

    .nav-tabs .nav-link.active {
        color: #3a6085 !important;
        /* Bootstrap primary color */
        background-color: #ffffff;
        border: 1px solid #608cb9;
        border-bottom: 2px solid white;
        font-weight: bold;
    }

    .nav-tabs {
        border-bottom: 2px solid #dee2e6;
    }
</style>
<ul class="nav nav-tabs" id="customerTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a href="{{route('customer.index')}}" class="btn btn-info mb-2"> All Customer </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="customer-payment-tab" data-bs-toggle="tab"
            href="#customer-payment" role="tab" aria-controls="customer-payment" aria-selected="true">Customer
            Payment</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="customer-history-tab" data-bs-toggle="tab" href="#customer-history"
            role="tab" aria-controls="customer-history" aria-selected="false">Customer Sale</a>
    </li>
</ul>

<div class="tab-content" id="customerTabContent">

    {{-- @if(request()->has('payment')) --}}

    {{-- <a href="{{route('customer.index')}}" class="btn btn-primary mb-2"> All Customer </a>

    <a href="{{ route('customer.sell.details', ['customer_id' =>  $CustomerPayments[0]->customer->id ]) }}"

        class="btn btn-info mb-2"> Customer Sell Details </a> --}}

    <div class="tab-pane fade" id="customer-payment" role="tabpanel" aria-labelledby="customer-payment-tab">
        <div class="d-flex justify-content-center align-items-center mt-3">
            <h5>Sell Payment </h5>
        </div>
        <table class="table text-dark">
            <thead class="table-dark text-white">
                <tr>
                    <th>Payment ID</th>
                    <th>Amount Paid</th>
                    {{-- <th>Remaining Amount</th> --}}
                    <th>Payment Date</th>
                    <th>Payment Method</th>
                    <th>Transaction Type</th>
                    <th>Bank Name</th>
                    <th>Account Holder Name</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($CustomerPayments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->amount_paid }}</td>
                    {{-- <td>{{ $payment->remaining_amount }}</td> --}}
                    <td>{{ $payment->payment_date }}</td>
                    <td>{{ $payment->payment_method }}</td>
                    <td>{{ $payment->transaction_type }}</td>
                    <td>{{ $payment->bank_name }}</td>
                    <td>{{ $payment->account_holder_name }}</td>
                    {{-- <td>{{ $payment->branch_name }}</td>
                    <td>{{ $payment->account_number }}</td>
                    <td>{{ $payment->account_type }}</td>
                    <td>{{ $payment->ifsc_code }}</td> --}}
                    <td>{{ $payment->notes }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- @else --}}
    <div class="tab-pane fade show active" id="customer-history" role="tabpanel" aria-labelledby="customer-history-tab">
        {{-- <a href="?payment" class="btn btn-info mb-2">Customer Payment</a> --}}
        <div class="d-flex justify-content-center align-items-center">
            <h5>Sell Details </h5>
            
        </div>
        <table class="table text-dark">
                <thead class="table-dark text-white">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                <tr>
                    <td>{{$sale->sale_id}}</td>
                    <td>{{$sale->sale_date}}</td>
                    <td> 
                        @switch($sale->status)
                            @case(0)
                                <span class="badge bg-success">Sale</span>
                                @break
                            @case(1)
                                <span class="badge bg-primary">Demo</span>
                                @break
                            @case(2)
                                <span class="badge bg-warning text-dark">Standby</span>
                                @break
                            @case(3)
                                <span class="badge bg-danger">Replacement</span>
                                @break
                            @case(4)
                                <span class="badge bg-info text-dark">Standby Return</span>
                                @break
                            @default
                                <span class="badge bg-secondary">Unknown</span>
                        @endswitch

                        @switch($sale->repair_status)
                            @case(0)
                            
                                @break
                            @case(1)
                                <span class="badge bg-primary">Repair</span>
                                @break
                            @default
                                <span class="badge bg-secondary">Unknown</span>
                        @endswitch
                    </td>
                    
                    <td>{{$sale->amount}}</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="{{ route('sale.show', ['sale_id' => $sale->id]) }}"><i
                                class="ri-eye-fill"></i></a>

                        @if($sale->status == 1)
                            <a class="btn btn-sm btn-success" href="{{ route('sale.convert', ['sale_id' => $sale->id]) }}">
                                Convert to Sale
                            </a>
                        @endif
                        @if($sale->status == 2)
                            <a class="btn btn-sm btn-success" href="{{ route('standby.return', ['sale_id' => $sale->id]) }}">
                                Standby Returned 
                            </a>
                        @endif
                        {{-- <a class="btn" href="{{ route('sale.edit', ['sale_id' => $sale->id]) }}"><i
                                class="ri-pencil-line"></i></a> --}}
                        {{-- <form action="{{ route('sale.destroy', $sale->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this sale?');" class="btn"><i
                                    class="ri-delete-bin-fill"></i></button>
                        </form> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="d-flex justify-content-center align-items-center mt-5">
            <h5>
                <a href="#purchase-return-table" class="text-decoration-none" data-bs-toggle="collapse"
                    aria-expanded="false" aria-controls="purchase-return-table">
                    Sell Return Details
                </a>
            </h5>
            <div class="ms-1">click on it..</div>
        </div> --}}
        <div class="text-center mt-5">
                <h5>
                    <a class="fw-bold text-dark text-decoration-none" data-bs-toggle="collapse" href="#purchase-return-table" role="button" aria-expanded="true" aria-controls="purchase-return-table">
                        <i class="fa-solid fa-circle-chevron-down me-2"></i>Sell Return Details
                    </a>
                </h5>

                <small class="text-muted">Click above to expand</small>
            </div>

        <div class="collapse mt-3" id="purchase-return-table">
            <table class="table text-dark">
                <thead class="table-dark text-white">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Serial No</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salereturns as $salereturn)
                    <tr>
                        <td>{{$salereturn->id}}</td>
                        <td>{{$salereturn->date}}</td>
                        <td>{{$salereturn->customer->customer_name ?? 'N/A' }}</td>
                        <td>{{$salereturn->sr_no}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- @endif --}}
</div>

@endsection