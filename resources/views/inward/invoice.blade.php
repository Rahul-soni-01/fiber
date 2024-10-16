<x-layout>
    <x-slot name="title">Show Invoice Details</x-slot>
    <x-slot name="main">

        <div class="main" id="main">
            <div class="invoice-container">
                @foreach ($inwards as $inward)
                <div class="invoice-section">
                    <div class="invoice-item">
                        <div class="invoice-label">Date:</div>
                        <div class="invoice-value">{{ $inward['date'] }}</div>
                        <div class="invoice-label">Invoice No:</div>
                        <div class="invoice-value">{{ $inward['invoice_no'] }}</div>
                    </div>
                    <div class="invoice-item">
                        <div class="invoice-label">Party </div>
                        <div class="invoice-value">{{ $inward->party->party_name }}</div>
                        <div class="invoice-label">Amount:</div>
                        <div class="invoice-value">{{ $inward['amount'] }}</div>
                    </div>
                    <div class="invoice-item">
                        <div class="invoice-label">INR Rate:</div>
                        <div class="invoice-value">{{ $inward['inr_rate'] }}</div>
                        <div class="invoice-label">INR Amount:</div>
                        <div class="invoice-value">{{ $inward['inr_amount'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
            <table class="table table-striped" id="inwardTable">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>

                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Unit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inwardsItems as $inwardsItem)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td> {{$inwardsItem->category->category_name}}</td>
                        <td> {{$inwardsItem->subcategory->sub_category_name}}</td>
                        <td>{{$inwardsItem['qty']}}</td>
                        <td>{{$inwardsItem['price']}}</td>
                        <td>{{$inwardsItem['unit']}}</td>
                        <td><a href="{{ route('add_sr_no', ['invoice_no' => $inward['invoice_no'],'category' => $inwardsItem->cid,'subcategory' => $inwardsItem->scid,'qty' =>$inwardsItem['qty'],'price'=>$inwardsItem['price'],'unit' =>$inwardsItem['unit']]) }}"><i
                                    class="ri-eye-fill"></i></a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </x-slot>
</x-layout>