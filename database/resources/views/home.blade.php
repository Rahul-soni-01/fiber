@extends('demo')
@section('title', 'Dashboard')
@section('content')

<div class="container py-4">
    <div class="row g-4">
        <!-- Sales Card -->
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow-sm p-3 d-flex flex-column flex-md-row align-items-center h-100 text-center text-md-start">
                <div class="bg-primary p-3 rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fas fa-shopping-cart fa-2x text-white"></i>
                </div>
                <div class="ms-md-3 mt-3 mt-md-0">
                    <h5 class="fw-semibold text-dark">Today's Sales</h5>
                    <p class="text-muted h5">{{ $sales->count() }}</p>
                    @php
                        $sum = 0;
                        foreach ($sales as $sale) {
                            $sum += $sale->amount;
                        }
                    @endphp
                    <p class="text-muted h5"><i class="fa fa-inr" aria-hidden="true"></i>{{ number_format($sum, 2) }}</p>
                    <a href="{{route('sale.index')}}" class="text-dark"><i class="fa fa-eye"></i> Details</a>
                </div>
            </div>
        </div>

        <!-- Purchases Card -->
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow-sm p-3 d-flex flex-column flex-md-row align-items-center h-100 text-center text-md-start">
                <div class="bg-success p-3 rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fas fa-truck fa-2x text-white"></i>
                </div>
                <div class="ms-md-3 mt-3 mt-md-0">
                    <h5 class="fw-semibold text-dark">Today's Purchases</h5>
                    <p class="text-muted h5">{{ $purchases->count() }}</p>
                    @php
                        $sum = 0;
                        foreach ($purchases as $purchase) {
                            $sum += $purchase->inr_amount;
                        }
                    @endphp
                    <p class="text-muted h5"><i class="fa fa-inr" aria-hidden="true"></i>{{ number_format($sum, 2) }}</p>
                    <a href="{{route('inward.index')}}" class="text-dark"><i class="fa fa-eye"></i> Details</a>
                </div>
            </div>
        </div>

        <!-- Reports Card -->
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow-sm p-3 d-flex flex-column flex-md-row align-items-center h-100 text-center text-md-start">
                <div class="bg-warning p-3 rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fas fa-chart-line fa-2x text-dark"></i>
                </div>
                <div class="ms-md-3 mt-3 mt-md-0">
                    <h5 class="fw-semibold text-dark">Today's New Reports</h5>
                    <p class="text-muted h5">{{ $repairreports->count() }}</p>
                    <a href="{{route('report.index')}}" class="text-dark"><i class="fa fa-eye"></i> Details</a>
                </div>
            </div>
        </div>

        <!-- Repair Reports Card -->
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow-sm p-3 d-flex flex-column flex-md-row align-items-center h-100 text-center text-md-start">
                <div class="bg-warning p-3 rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fas fa-tools fa-2x text-dark"></i>
                </div>
                <div class="ms-md-3 mt-3 mt-md-0">
                    <h5 class="fw-semibold text-dark">Today's Repair Reports</h5>
                    <p class="text-muted h5">{{ $newreports->count() }}</p>
                    <a href="{{route('report.index')}}" class="text-dark"><i class="fa fa-eye"></i> Details</a>
                </div>
            </div>
        </div>

        <!-- Supplier Payments Card -->
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow-sm p-3 d-flex flex-column flex-md-row align-items-center h-100 text-center text-md-start">
                <div class="bg-info p-3 rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fas fa-hand-holding-usd fa-2x text-white"></i>
                </div>
                <div class="ms-md-3 mt-3 mt-md-0">
                    <h5 class="fw-semibold text-dark">Supplier Payments</h5>
                    <p class="text-muted h5">{{ $supplier_payments->count() }}</p>
                    @php
                        $sum = 0;
                        foreach ($supplier_payments as $supplier_payment) {
                            $sum += $supplier_payment->amount_paid;
                        }
                    @endphp
                    <p class="text-muted h5"><i class="fa fa-inr" aria-hidden="true"></i>{{ number_format($sum, 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Customer Payments Card -->
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow-sm p-3 d-flex flex-column flex-md-row align-items-center h-100 text-center text-md-start">
                <div class="bg-danger p-3 rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fas fa-wallet fa-2x text-white"></i>
                </div>
                <div class="ms-md-3 mt-3 mt-md-0">
                    <h5 class="fw-semibold text-dark">Customer Payments</h5>
                    <p class="text-muted h5">{{ $customer_payments->count() }}</p>
                    @php
                        $sum = 0;
                        foreach ($customer_payments as $customer_payment) {
                            $sum += $customer_payment->amount_paid;
                        }
                    @endphp
                    <p class="text-muted h5"><i class="fa fa-inr" aria-hidden="true"></i>{{ number_format($sum, 2) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection