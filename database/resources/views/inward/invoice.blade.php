@extends('demo')
@section('title', 'Show Item')
@section('content')
<style>
    .form-control{
        background-color:unset;
    }
</style>
<h1>Show Item</h1>
@foreach ($inwards as $item)
<div class="container ">
    <a href="{{ route('generate-pdf', ['invoice_no' => $invoice_no]) }}" class="btn btn-primary"
        id="download-btn1212">Download PDF</a>
    <div class="row">
        <div class="col">Invoice No.</div>
        <div class="col">Date</div>
        <div class="col">Party Name</div>
    </div>
    {{--@foreach ($inwards as $item)--}}
    <div class="row">
        <div class="col">
            <label class="form-control">{{$item['invoice_no']}}</label>
        </div>
        <div class="col">
            <label class="form-control">{{$item['date']}}</label>
        </div>
        <div class="col">
            <label class="form-control">{{$item->party->party_name}}</label>
        </div>
    </div>
    {{--@endforeach--}}
    <div class="container mt-50">
        <h1>Product Details</h1>
        <div class="row">
            <div class="col-sm-2"><label>Category Name</label></div>
            <div class="col-sm-2"><label>Sub Category Name</label></div>
            <div class="col-sm-1"><label>Unit</label></div>
            <div class="col-sm-1"><label>Qty</label></div>
            <div class="col-sm-1"><label>Rate</label></div>
            <div class="col-sm-1"><label>Total</label></div>
            <div class="col-sm-1"><label>Tax(%)</label></div>
            <div class="col-sm-2 text-center"><label>Total(T)</label></div>
            <div class="col-sm-1"><label>Action</label></div>
        </div>
        @foreach ($inwardsItems as $item1)
        <div class="row custom-row g-2 align-item1s-center">
            <div class="col-sm-2">
                <label class="form-control">{{$item1->category->category_name}}</label>
            </div>
            <div class="col-sm-2">
                <label class="form-control">{{$item1->subCategory->sub_category_name}}</label>
            </div>
            <div class="col-sm-1">
                <label class="form-control">
                    @if ($item1['unit'] == 'Pic')
                        Pcs
                    @else
                        {{ $item1['unit'] }}
                    @endif
                </label>
            </div>
            <div class="col-sm-1">
                <label class="form-control">{{$item1['qty']}}</label>
            </div>
            <div class="col-sm-1">
                <label class="form-control">{{$item1['price']}}</label>
            </div>
            <div class="col-sm-1">
                <label class="form-control">{{$item1['total']}}</label>
            </div>
            <div class="col-sm-1">
                <label class="form-control" style="padding:.375rem .4rem;">{{$item1['tax'] ?? 0}}</label>
            </div>
            <div class="col-sm-2 text-center">
                <label class="form-control">{{ $item1['total'] + ($item1['total'] * $item1['tax'] / 100)
                    }}</label>
            </div>
            <div class="col-sm-1 text-center">
                <td><a class="btn btn-sm btn-info" href="{{ route('add_sr_no', ['invoice_no' => $item['invoice_no'],'category' => $item1->cid,'subcategory' => $item1->scid,'unit' =>$item1['unit'],'qty' =>$item1['qty'],'price'=>$item1['price']]) }}"><i
                            class="ri-eye-fill"></i></a> </td>
            </div>
        </div>
        @endforeach
    </div>
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-2 offset-sm-8">Amount ($/¥)</div>
            <div class="col-sm-2">
                <label class="form-control">{{$item['amount']}}</label>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-2 offset-sm-8">Rate (₹)</div>
            <div class="col-sm-2">
                <label class="form-control">{{$item['inr_rate']}}</label>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-2 offset-sm-8">Amount (₹)</div>
            <div class="col-sm-2">
                <label class="form-control">{{$item['inr_amount']}}</label>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-2 offset-sm-8">Shipping Cost</div>
            <div class="col-sm-2">
                <label class="form-control">{{$item['shipping_cost']}}</label>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-2 offset-sm-8">Total Amount</div>
            <div class="col-sm-2">
                <label class="form-control">{{$item['inr_amount'] + $item['shipping_cost']}}</label>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-2 offset-sm-8">Round Amount</div>
            <div class="col-sm-2">
                <label class="form-control">{{$item['round_amount'] ?? 0}}</label>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-2 offset-sm-8">Final Amount</div>
            <div class="col-sm-2">
                <label class="form-control">
                    {{$item['inr_amount'] + $item['shipping_cost'] - $item['round_amount']}}</label>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection