@extends('demo')
@section('title', 'Purchase Return')

@section('content')
<h1>Purchase Return</h1>
<a href="{{ route('purchase.return.create') }}" class="btn btn-primary mb-3">Add Purchase Return</a>
<a href="{{ route('generate-pdf', ['purchase_return' => $id]) }}" class="btn btn-primary mb-3"
    id="download-btn1212">Download PDF</a>

<div class="container">
    <div class="row">
        <div class="col">
            <h4>Invoice No.</h4>
        </div>
        <div class="col">
            <h4>Party Name</h4>
        </div>
        <div class="col">
            <h4>Date</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <span> {{$PurchaseReturn->invoice_no}}</span>
        </div>

        <div class="col-md-4">
            {{ $PurchaseReturn->party->party_name }}
        </div>
        <div class="col-md-4">

            <span> {{$PurchaseReturn->date}}</span>
        </div>
    </div>
    <table class="table text-white">
        <thead class="table-dark">
            <tr>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Unit</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Reason</th>
                <th>Return date</th>
            </tr>
        </thead>

        <tbody>
            @if($PurchaseReturn->purchaseReturnDetails && $PurchaseReturn->purchaseReturnDetails->isNotEmpty())
            @foreach($PurchaseReturn->purchaseReturnDetails as $purchase_return_detail)
            <tr>
                <td>{{ $purchase_return_detail->category->category_name ?? 'N/A' }}</td>
                <td>{{ $purchase_return_detail->subCategory->sub_category_name ?? 'N/A' }}</td>
                <td>{{ $purchase_return_detail->unit ?? 'N/A' }}</td>
                <td>{{ $purchase_return_detail->qty ?? 'N/A' }}</td>
                <td>{{ $purchase_return_detail->price ?? 'N/A' }}</td>
                <td>{{ $purchase_return_detail->reason ?? 'N/A' }}</td>
                <td>{{ date_format($purchase_return_detail->created_at ?? 'N/A','d-m=Y') }}</td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6" class="text-center">No details found.</td>
            </tr>
            @endif
        </tbody>

    </table>
</div>
@endsection