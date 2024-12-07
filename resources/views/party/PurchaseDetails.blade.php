<x-layout>
    <x-slot name="title">Supplier Purchase Details</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            {{-- <form action="search" method="get" class="mb-5">
                <div class="row">
                    <div class="col">
                        <input type="date" id="s_date" name="s_date" class="form-control"
                            value="{{ request('s_date') }}">
                    </div>
                    <div class="col">
                        <input type="date" id="e_date" name="e_date" class="form-control"
                            value="{{ request('e_date') }}">
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
                        <form method="post"><button type="submit" class="btn btn-dark" id="search"
                                name="search">Search</button></form>
                    </div>
                </div>
            </form> --}}

            <div class="d-flex justify-content-center align-items-center"> <h5>Purchase Details </h5></div>

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
                    <a href="#purchase-return-table" class="text-decoration-none" data-bs-toggle="collapse" aria-expanded="false" aria-controls="purchase-return-table">
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
                                    Category Name:-{{$Purchasereturn->purchaseReturnDetails->category->category_name}} <br> Sub Category:- {{$Purchasereturn->purchaseReturnDetails->subCategory->sub_category_name}} <br>
                                    Qty:-{{$Purchasereturn->purchaseReturnDetails->qty}} <br>
                                    Price:-{{$Purchasereturn->purchaseReturnDetails->price}} 
                                @endforeach --}}
    
                                @foreach($Purchasereturn->purchaseReturnDetails as $item)
                                    <li>
                                        Category: {{ $item->category->category_name }} - SubCategory: {{ $item->subCategory->sub_category_name }}<br>
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
    </x-slot>
</x-layout>