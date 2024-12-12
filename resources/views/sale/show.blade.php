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
                <div class="cus-container mt-2">
                    <h1>Product Details</h1>
                    <div class="row">
                        <div class="col">Serial No.</div>
                        <div class="col">Price</div>
                        <div class="col"></div>
                    </div>
                    <div id="row-container">

                    @foreach ($sale->items as $item)
                        <div class="row custom-row mt-2 g-2 align-items-center">
                            <div class="col">
                                    <span id="party_name" class="form-control">
                                    {{ $item->report->sr_no_fiber ?? 'N/A' }}
                                </span>
                            </div>
                            <div class="col">
                                {{-- {{ $item->report->final_amount ?? 'N/A' }} --}}
                            </div>
                            <div class="col">

                            </div>
                        </div>
                    @endforeach  
                    </div>
                    <div class="row mt-5 g-2 align-items-center">
                        <div class="col">
                            <h5> Final Price</h5>
                        </div>
                        <div class="col">
                            <span id="party_name" class="form-control">
                                {{ $sale->total_amount ?? 'N/A' }}
                            </span>
                        </div>
                        <div class="col">

                        </div>

                    </div>
                    <div class="row mt-5 g-2 align-items-center">
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
                    </div>  
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>