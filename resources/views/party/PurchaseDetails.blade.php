@extends('demo')
@section('title', 'Supplier Payment')

@section('content')

{{-- <form action="search" method="get" class="mb-5">
    <div class="row">
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
            <input type="text" id="amount" name="amount" placeholder="Amount" class="form-control">
        </div>
        <div class="col"><input type="text" id="amount_inr" name="amount_inr" placeholder="Amount (₹)"
                class="form-control"></div>
        <div class="col">
            <form method="post"><button type="submit" class="btn btn-dark" id="search" name="search">Search</button>
            </form>
        </div>
    </div>
</form> --}}

{{-- <a href="{{route('party.show')}}" class="btn btn-info mb-2"> All Supplier </a>
<a href="#" id="SupplierPayment" class="btn btn-info mb-2"> Supplier Payment</a>
<a class="btn btn-info mb-2 " href="{{ route('party.purchase.details', ['party_id' =>$id]) }}"> Supplier History </a>
--}}

<ul class="nav nav-tabs" id="supplierTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a href="{{route('party.show')}}" class="btn btn-info mb-2"> All Supplier </a>
    </li>
    <li class="nav-item ml-5" role="presentation">
        <a class="nav-link active" id="supplier-payment-tab" data-bs-toggle="tab" href="#supplier-payment" role="tab"
            aria-controls="supplier-payment" aria-selected="true">Supplier Payment</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="supplier-history-tab" data-bs-toggle="tab" href="#supplier-history" role="tab"
            aria-controls="supplier-history" aria-selected="false">Supplier Purchase</a>
    </li>
</ul>


<div class="tab-content" id="supplierTabContent">
    <!-- All Supplier Tab -->
    {{-- <div class="tab-pane fade show active" id="all-supplier" role="tabpanel" aria-labelledby="all-supplier-tab">
        <a href="{{route('party.show')}}" class="btn btn-info mb-2">All Supplier</a>
    </div> --}}
    <div class="tab-pane fade show active" id="supplier-payment" role="tabpanel" aria-labelledby="supplier-payment-tab">

        <div class="d-flex justify-content-center align-items-center">
            <h5>Payment Details </h5>
        </div>

        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Payment ID</th>
                    <th>Amount Paid</th>
                    {{-- <th>Remaining Amount</th> --}}
                    <th>Payment Date</th>
                    <th>Payment Method</th>
                    <th>Transaction Type</th>
                    <th>Bank Name</th>
                    <th>Account Holder Name</th>
                    {{-- <th>Branch Name</th>
                    <th>Account Number</th>
                    <th>Account Type</th>
                    <th>IFSC Code</th> --}}
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($SupplierPayments as $payment)
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
    <div class="tab-pane fade" id="supplier-history" role="tabpanel" aria-labelledby="supplier-history-tab">

        <div class="d-flex justify-content-center align-items-center">
            <h5>Purchase Details </h5>
        </div>

        <table class="table table-striped" id="inwardTable">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Invoice No</th>
                    {{-- <th>Party Name</th> --}}
                    <th>Amount</th>
                    <th>Rate(₹)</th>
                    <th>Amount(₹)</th>
                    <th>Shoping Cost</th>
                    <th>Show</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($inwards as $inward)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$inward['date']}}</td>
                    <td>{{$inward['invoice_no']}}</td>
                    {{-- <td>{{$inward['party_name']}}</td> --}}
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

        <div class="d-flex justify-content-center align-items-center mt-5">
            <h5>
                <a href="#purchase-return-table" class="text-decoration-none" data-bs-toggle="collapse"
                    aria-expanded="false" aria-controls="purchase-return-table">
                    Purchase Return Details
                </a>
            </h5>
            <div class="ml-2">click on it..</div>
        </div>
        <div class="collapse mt-3" id="purchase-return-table">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        {{-- <th>Party</th> --}}
                        <th>Invoice No</th>
                        <th>Return Product</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($PurchaseReturns as $Purchasereturn)
                    {{-- {{ dd($Purchasereturn);}} --}}
                    <tr>
                        <td>{{$Purchasereturn->id}}</td>
                        <td>{{$Purchasereturn->date}}</td>
                        {{-- <td>{{$Purchasereturn->party->party_name ?? 'N/A'}}</td> --}}
                        <td>{{$Purchasereturn->invoice_no}}</td>
                        <td>
                            {{-- @foreach ($Purchasereturn->purchase_return_details as $purchase_return_detail)
                            Category Name:-{{$Purchasereturn->purchaseReturnDetails->category->category_name}} <br> Sub
                            Category:- {{$Purchasereturn->purchaseReturnDetails->subCategory->sub_category_name}} <br>
                            Qty:-{{$Purchasereturn->purchaseReturnDetails->qty}} <br>
                            Price:-{{$Purchasereturn->purchaseReturnDetails->price}}
                            @endforeach --}}

                            @foreach($Purchasereturn->purchaseReturnDetails as $item)
                            <li>
                                Category: {{ $item->category->category_name }} - SubCategory: {{
                                $item->subCategory->sub_category_name }}<br>
                                Qty: {{ $item->qty }}, Price: {{ $item->price }}, Reason: {{ $item->reason }}
                            </li>
                            @endforeach
                        </td>
                        {{-- <td></td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#SupplierPayment').on('click', function() {
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const party = <?php echo $id; ?>;
            var data = {
                _token: csrfToken,
                party: party,
            };
            $.ajax({
                url:"/party-purchase-details-" + party,
                get: "POST",
                data: data,
                success: function (response) {

                },
            });
        });
    });
</script>
@endsection