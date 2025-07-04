@extends('demo')
@section('title', 'Report Stock')
@section('content')

<div class="container">
    <h2>Stock Report for {{ $subcategory->sub_category_name }}</h2> <!-- Display subcategory name -->

    <!-- Purchase Table -->
    <h4 class="d-flex justify-content-center">Purchase Summary</h4>
    <table class="table text-dark">
        <thead class="bg-dark text-white">
            <tr>
                <th>Invoice No</th>
                <th>SCID</th>
                <th>CID</th>
                <th>Total Purchase Qty</th>
                <th>Total Purchase</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchaseResults as $purchase)
            {{-- {{ dd($purchase);}} --}}
            <tr>
                <td>{{ $purchase->invoice_no }}</td>
                <td>{{ $purchase->subCategory->sub_category_name }}</td>
                <td>{{ $purchase->category->category_name }}</td>
                <td>{{ $purchase->total_purchase_qty }}</td>
                <td>{{ number_format($purchase->total_purchase, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Stock Table -->
    <h4 class="d-flex justify-content-center">Stock Summary</h4>
    <table class="table text-dark">
        <thead class="bg-dark text-white">
            <tr>
                <th>SCID</th>
                <th>Total Stock Qty</th>
                <th>Not Used/ Still in Stock</th>
                {{-- <th>Used</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($stockResults as $stock)
            <tr>
                <td>{{ $stock->subCategory->sub_category_name }}</td>
                <td>{{ $stock->total_qty }}</td>
                <td>{{ $stock->qty_status_0 }}</td>
                {{-- <td>{{ $stock->qty_status_1 }}</td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Report Table -->
    <h4 class="d-flex justify-content-center">Report Summary</h4>
    <table class="table text-dark">
        <thead class="bg-dark text-white">
            <tr>
                <th>SCID</th>
                <th>Total Reports</th>
                <th>Report id </th>
                <th>Total Used Stock</th>
                <th>Dead Status Used Qty</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reportResults as $report)
            {{-- {{ dd($report);}} --}}
            <tr>
                <td>{{ $report->tbl_sub_category->sub_category_name }}</td>
                <td>{{ $report->total_count }}</td>
                <td>
                    @foreach($report->report_ids as $index => $reportData)
                    <a href="{{ route('report.show', $reportData['id']) }}" class="btn btn-sm mt-1 btn-primary">
                        <i class="ri-eye-fill"></i> {{ $reportData['sr_no_fiber'] }}
                    </a>
                    @if(($index + 1) % 4 === 0)
                    <!-- Break after every 4 items -->
                    <br>
                    @endif

                    @endforeach
                </td>

                <td>{{ $report->total_used_stock }}</td>
                <td>{{ $report->dead_status_used_qty }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection