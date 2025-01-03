<x-layout>
    <x-slot name="title">Stock {{ auth()->user()->type }} Report</x-slot>
    <x-slot name="main">
        <div class="main" id="main">

            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Subcategory Name</th> 
                        <th>Total Purchase Quantity</th>
                        <th>Total Stock Quantity</th>
                        <th>Not Used Qty</th>
                        <th>Used Qty</th>
                        <th>Total Reports</th>
                        <th>Total Dead Stock</th>
                        <th>Total Purchase Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; ?>
                    @foreach ($subcategoryData as $data)
                    
                    <tr>
                        <td>{{ $data['subcategory']->sub_category_name }}</td>
                        <td>{{ $data['total_purchase_qty'] }}</td>
                        <td>{{ $data['total_stock_qty'] }}</td>
                        <td>{{ $data['qty_status_0'] }}</td>
                        <td>{{ $data['qty_status_1'] }}</td>
                        <td>{{ $data['total_count'] }}</td>
                        <td>{{ $data['total_dead_stock'] }}</td>
                        <td>{{ $data['total_purchase'] }}</td>
                    </tr>
                @endforeach
        
                </tbody>
                <tfoot class="table-dark">
                    <tr>
                        <td><strong>Totals</strong></td>
                        <td></td>   
                        <td></td>   
                        <td></td>   
                        <td></td>   
                        <td></td>   
                        <td></td>   
                        
                        <td>{{$totalPurchase }}</td>
                    </tr>
                </tfoot>
            </table>
            
        </div>
    </x-slot>
</x-layout>