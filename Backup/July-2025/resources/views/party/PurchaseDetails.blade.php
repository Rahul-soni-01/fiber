@extends('demo')

@section('title', 'Supplier Payment')

@section('content')
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
<div class="container-fluid mt-3">
    <!-- Navigation Tabs -->
    <ul class="nav nav-tabs mb-4">
        <li class="nav-item">
            <a href="{{ route('party.show') }}" class="nav-link">All Supplier</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#supplier-payment">Supplier Payment</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#supplier-history">Supplier Purchase</a>
        </li>
    </ul>

    <!-- Tab Contents -->
    <div class="tab-content">
        <!-- Supplier Payment Tab -->
        <div class="tab-pane fade show active" id="supplier-payment">
            <div class="text-center mb-3">
                <h5 class="fw-bold">Payment Details</h5>
            </div>
            <div class="table-responsive">
                <table class="table text-dark table-bordered table-hover">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Payment ID</th>
                            <th>Amount Paid</th>
                            <th>Payment Date</th>
                            <th>Payment Method</th>
                            <th>Transaction Type</th>
                            <th>Bank Name</th>
                            <th>Account Holder Name</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($SupplierPayments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->amount_paid }}</td>
                            <td>{{ $payment->payment_date }}</td>
                            <td>{{ $payment->payment_method }}</td>
                            <td>{{ $payment->transaction_type }}</td>
                            <td>{{ $payment->bank_name }}</td>
                            <td>{{ $payment->account_holder_name }}</td>
                            <td>{{ $payment->notes }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Supplier History Tab -->
        <div class="tab-pane fade" id="supplier-history">
            <div class="text-center mb-3">
                <h5 class="fw-bold">Purchase Details</h5>
            </div>
            <div class="table-responsive">
                <table class="table text-dark table-bordered table-hover" id="inwardTable">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Invoice No</th>
                            <th>Amount</th>
                            <th>Rate(₹)</th>
                            <th>Amount(₹)</th>
                            <th>Shipping Cost</th>
                            <th>Show</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inwards as $inward)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $inward['date'] }}</td>
                            <td>{{ $inward['invoice_no'] }}</td>
                            <td>{{ $inward['amount'] }}</td>
                            <td>{{ $inward['inr_rate'] }}</td>
                            <td>{{ $inward['inr_amount'] }}</td>
                            <td>{{ $inward['shipping_cost'] }}</td>
                            <td><a href="{{ route('show_item.details', ['invoice_no' => $inward['invoice_no']]) }}"><i
                                        class="ri-eye-fill"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Purchase Return Section -->
            <div class="text-center mt-5">
                <h5>
                    <a class="fw-bold text-dark text-decoration-none" data-bs-toggle="collapse"
                        href="#purchase-return-table" role="button" aria-expanded="false"
                        aria-controls="purchase-return-table">
                        <i class="fa-solid fa-circle-chevron-down me-2"></i> Purchase Return Details
                    </a>
                </h5>

                <small class="text-muted">Click above to expand</small>
            </div>
            <div class="collapse mt-3" id="purchase-return-table">
                <table class="table text-dark table-bordered table-hover">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Invoice No</th>
                            <th>Return Product</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($PurchaseReturns as $Purchasereturn)
                        <tr>
                            <td>{{ $Purchasereturn->id }}</td>
                            <td>{{ $Purchasereturn->date }}</td>
                            <td>{{ $Purchasereturn->invoice_no }}</td>
                            <td>
                                <ul class="list-unstyled">
                                    @foreach($Purchasereturn->purchaseReturnDetails as $item)
                                    <li>
                                        Category: {{ $item->category->category_name }},
                                        SubCategory: {{ $item->subCategory->sub_category_name }},
                                        Qty: {{ $item->qty }},
                                        Price: ₹{{ $item->price }},
                                        Reason: {{ $item->reason }}
                                    </li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection