<x-layout>
    <x-slot name="title">Purchase Return</x-slot>
    <x-slot name="main">
        <a href="{{ route('purchase.return.create') }}" class="btn btn-primary mb-3">Add Purchase Return</a>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Party</th>
                    <th>Invoice No</th>
                    <th>Return Product</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($PurchaseReturns as $Purchasereturn)
                {{-- {{ dd($Purchasereturn);}} --}}
                    <tr>
                        <td>{{$Purchasereturn->id}}</td>
                        <td>{{$Purchasereturn->date}}</td>
                        <td>{{$Purchasereturn->party->party_name ?? 'N/A'}}</td>
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
                        <td><a
                            href="{{ route('inward.return.show', ['invoice_no' => $Purchasereturn->id ]) }}"><i
                                class="ri-eye-fill"></i></a> </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </x-slot>
</x-layout>