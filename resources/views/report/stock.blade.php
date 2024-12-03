<x-layout>
    <x-slot name="title">Stock {{ auth()->user()->type }} Report</x-slot>
    <x-slot name="main">
        <div class="main" id="main">

            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Subcategory Name</th> 
                        <th>Total Purchase Qty</th> 
                        <th>Total in Stock Qty</th> 
                        <th>Used(Status 1 Qty)</th> 
                        <th>Not Used(Status 0 Qty)</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; ?>
                    @foreach ($purchaseResults as $purchaseResult)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ $purchaseResult->subCategory->sub_category_name ?? 'N/A'}}</td>
                            <td>{{ $purchaseResult->total_purchase_qty }}</td>
            
                            @php
                                // Initialize stock variables
                                $stock_qty = 0;
                                $status_0_qty = 0;
                                $status_1_qty = 0;
            
                                // Find corresponding stock data
                                foreach ($stockResults as $stockResult) {
                                    if ($stockResult->scid == $purchaseResult->scid) {
                                        $stock_qty = $stockResult->total_qty;
                                        $status_0_qty = $stockResult->qty_status_0;
                                        $status_1_qty = $stockResult->qty_status_1;
                                        break; // Exit loop once found
                                    }
                                }
                            @endphp
            
                            <td>{{ $stock_qty }}</td> <!-- Total in Stock Qty -->
                            <td>{{ $status_1_qty }}</td> <!-- Status 1 Qty -->
                            <td>{{ $status_0_qty }}</td> <!-- Status 0 Qty -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </x-slot>
</x-layout>