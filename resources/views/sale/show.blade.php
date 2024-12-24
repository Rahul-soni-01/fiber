<x-layout>
    <x-slot name="title">Show Sale</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <div class="container">
                <div class="row">
                    <div class="col">Invoice No.</div>
                    <div class="col">Date</div>
                    <div class="col">Customer Name</div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span id="invoice_no" class="form-control">
                            {{ $sale->sale_id ?? 'N/A' }}
                        </span>
                    </div>
                    <div class="col-md-4">
                        <span id="date" class="form-control">
                            {{ $sale->sale_date ? \Carbon\Carbon::parse($sale->date)->format('Y-m-d') : 'N/A' }}
                        </span>
                    </div>
                    <div class="col-md-4">
                        <span id="party_name" class="form-control">
                            {{-- {{ dd($sale)}} --}}
                            {{ $sale->customer->customer_name ?? 'N/A' }}
                        </span>
                    </div>
                </div>

                <div class="container mt-4">
                    <h1>Product Details</h1>
                    <div class="row">
                        <div class="col-sm-2"><label>Category Name</label></div>
                        <div class="col-sm-2"><label>Sub Category Name</label></div>
                        <div class="col-sm-1"><label>Unit</label></div>
                        <div class="col-sm-1"><label>Qty</label></div>
                        <div class="col-sm-1"><label>Rate</label></div>
                        <div class="col-sm-1"><label>Total</label></div>
                        <div class="col-sm-1"><label>Tax(%)</label></div>
                        <div class="col-sm-1"><label>Tax(Amt)</label></div>
                        <div class="col-sm-2"><label>Total(T)</label></div>
                        {{-- <div class="col-sm-1"><label>Action</label></div> --}}
                    </div>
                    @foreach ($sale->items as $item1)
                    {{-- {{ dd($item1->category);}} --}}
                    <div class="row custom-row g-2 align-item1s-center">
                        <div class="col-sm-2">
                            <label class="form-control">{{$item1->category->name}}</label>
                        </div>

                        <div class="col-sm-2">
                            <label class="form-control">{{$item1->subCategory->name}}</label>
                        </div>

                        <div class="col-sm-1">
                            <label class="form-control">{{$item1['unit']}}</label>
                        </div>

                        <div class="col-sm-1">
                            <label class="form-control">{{$item1['qty']}}</label>
                        </div>

                        <div class="col-sm-1">
                            <label class="form-control">{{$item1['rate']}}</label>
                        </div>

                        <div class="col-sm-1">
                            <label class="form-control">{{$item1['total']}}</label>
                        </div>

                        <div class="col-sm-1">
                            <label class="form-control" style="padding:.375rem .4rem;">{{$item1['p_tax'] ?? 0}}</label>
                        </div>
                        <div class="col-sm-1">
                            <label class="form-control" style="padding:.375rem .4rem;">{{ ($item1['total'] *
                                $item1['p_tax'] / 100) }}</label>
                        </div>

                        <div class="col-sm-2">
                            <label class="form-control">{{ $item1['total'] + ($item1['total'] * $item1['p_tax'] / 100)
                                }}</label>


                        </div>

                    </div>
                    @endforeach
                </div>

                <div class="container">
                    {{-- <div class="row mt-3">
                        <div class="col-sm-2 offset-sm-8">Amount ($/¥)</div>
                        <div class="col-sm-2">
                            <lael class="form-control">{{$item['amount']}}</lael>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-2 offset-sm-8">Rate (₹)</div>
                        <div class="col-sm-2">
                            <label class="form-control">{{$item['inr_rate']}}</label>
                        </div>
                    </div> --}}
                    <div class="row mt-3">
                        <div class="col-sm-2 offset-sm-8">Amount (₹)</div>
                        <div class="col-sm-2">
                            <label class="form-control">{{$sale['amount_r']}}</label>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-2 offset-sm-8">Shipping Cost</div>
                        <div class="col-sm-2">
                            <label class="form-control">{{$sale['shipping_cost']}}</label>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-2 offset-sm-8">Total Amount</div>
                        <div class="col-sm-2">
                            <label class="form-control">{{$sale['amount_r'] + $sale['shipping_cost']}}</label>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-2 offset-sm-8">Round Amount</div>
                        <div class="col-sm-2">
                            <label class="form-control">{{$sale['round_total']}}</label>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-2 offset-sm-8">Final Amount</div>
                        <div class="col-sm-2">
                            <label class="form-control">
                                {{$sale['amount_r'] + $sale['shipping_cost'] - $sale['round_total']}}</label>
                        </div>
                    </div>
                </div>

                {{-- <div class="row mt-5 g-2 align-items-center">
                    <div class="col">
                        <h5> Note</h5>
                    </div>
                    <div class="col">
                        <span id="party_name" class="form-control">
                            {{ $sale->notes ?? 'N/A' }}
                        </span>
                    </div>
                    <div class="col">
                    </div>
                </div> --}}
            </div>
        </div>
    </x-slot>
</x-layout>