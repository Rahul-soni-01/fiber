@extends('demo')
@section('title', 'Report')

@section('content')
<h1>Report</h1>

<table class="table text-white">
    <thead class="table-dark">
        <tr>
            <th>Subcategory Name</th>
            <th>Total Purchase Quantity</th>
            <th>Total Stock Quantity</th>
            <th>Not Used Qty</th>
            <th>Used Qty</th>
            <th>Total Used Qty In Reports</th>
            <th>Total Dead Stock</th>
            <th>Total Purchase Price</th>
        </tr>
    </thead>
    <tbody>
        @php $index = 1; @endphp
        @foreach ($subcategoryData as $data)
        <tr>
            <td>{{ $data['subcategory']->sub_category_name }}</td>
            <td>{{ number_format($data['total_purchase_qty'], 2) }}</td>
            <td>{{ number_format($data['total_stock_qty'], 2) }}</td>
            <td>{{ number_format($data['qty_status_0'], 2) }}</td>
            <td>{{ number_format($data['qty_status_1'], 2) }}</td>
            <td>
                @if ($data['subcategory']->sr_no == 1)
                {{ number_format($data['total_count'], 2) }}
                @else
                {{ number_format($data['total_used_stock'], 2) }}
                @endif
            </td>
            <td>{{ number_format($data['dead_status_used_qty'], 2) }}</td>
            <td>{{ number_format($data['total_purchase'], 2) }}</td>
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
            <td>{{ number_format($subcategoryData->sum('total_used_stock'), 2) }}</td>
            <td>{{ number_format($subcategoryData->sum('dead_status_used_qty'), 2) }}</td>
            <td>{{ number_format($totalPurchase, 2) }}</td>
        </tr>
    </tfoot>
</table>

@endsection