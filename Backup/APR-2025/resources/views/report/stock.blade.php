@extends('demo')
@section('title', 'Report')
@section('content')

<h1>Report</h1>
@php
    $bgColors = ['bg-secondary', 'bg-warning text-dark', 'bg-info', 'bg-light text-dark']; // Define 4 background colors
    $index = 0; // Initialize index
@endphp
<div class="row">
    @foreach ($groupedSubcategoryData as $cid => $subcategories)
    <div class="col-md-12 mb-4">
        @php
        $bgColor = $bgColors[$index % count($bgColors)]; // Rotate colors
        $index++; // Increment index
        @endphp
        <div class="card bg-dark">
            <div class="card-header">
                <h5 class="card-title text-white">
                    {{-- Category: {{ optional($categories->firstWhere('id', $cid))->category_name ?? 'Unknown Category' }} --}}
                    Category: {{ $cid ?? 'NA' }}
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($subcategories as $data)
                        {{-- {{ dd($data);}} --}}
                        <div class="col-md-4 mb-4">
                            <div class="card {{ $bgColor }} shadow">
                                <div class="card-header">
                                    <h6 class="card-title">{{ $data['subcategory']['category']->category_name ?? 'Unknown Category' }}
                                        - {{ $data['subcategory']->sub_category_name ?? 'Unknown Subcategory' }}</h6>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        <strong>Total Purchase Quantity:</strong> {{ number_format($data['total_purchase_qty'] ?? 0, 2) }}<br>
                                        <strong>Total Stock Quantity:</strong> {{ number_format($data['total_stock_qty'] ?? 0, 2) }}<br>
                                        <strong>Not Used Qty:</strong> {{ number_format($data['qty_status_0'] ?? 0, 2) }}<br>
                                        <span class="badge bg-success">Used Qty:</span> {{ number_format($data['qty_status_1'] ?? 0, 2) }}<br>
                                        <strong>Total Used Qty In Reports:</strong> 
                                        {{ number_format($data['subcategory']->sr_no == 1 ? $data['total_count'] ?? 0 : $data['total_used_stock'] ?? 0, 2) }}
                                        <br>
                                        <span class="badge bg-danger">Total Dead Stock:</span> {{ number_format($data['dead_status_used_qty'] ?? 0, 2) }}<br>
                                        <strong>Total Purchase Price:</strong> ₹{{ number_format($data['total_purchase'] ?? 0, 2) }}
                                    </p>
                                    <a href="{{ route('report.stock', ['scid' => $data['subcategory']->id]) }}" class="btn btn-primary btn-sm">
                                        <i class="ri-eye-line"></i> View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{-- 
<div class="card text-white bg-dark mt-4">
    <div class="card-header">
        <h5 class="card-title">Totals</h5>
    </div>
    <div class="card-body">
        <p class="card-text">
            <strong>Total Used Stock:</strong> {{ number_format($subcategoryData->sum('total_used_stock'), 2) }}<br>
            <strong>Total Dead Stock:</strong> {{ number_format($subcategoryData->sum('dead_status_used_qty'), 2) }}<br>
            <strong>Total Purchase Price:</strong> {{ number_format($totalPurchase, 2) }}
        </p>
    </div>
</div> --}}
@endsection