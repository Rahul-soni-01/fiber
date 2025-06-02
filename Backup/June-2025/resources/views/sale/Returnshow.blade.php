@extends('demo')
@section('title', 'Sale Return {{ $id }}')
@section('content')
<h1 class="mb-4">Sale Return {{ $id }}</h1>

<div class="main mb-4">
    <a href="{{ route('sale.return') }}" class="btn btn-success me-2">➕ Add Sale Return</a>
    <a href="{{ route('generate-pdf', ['sale_return' => $id]) }}" class="btn btn-outline-primary">📄 Download PDF</a>
</div>

<div class="row">
    @foreach($salereturns as $index => $return)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card border-0 shadow-lg h-100" style="background: linear-gradient(135deg, #125331 0%, #44c525 100%);">
                <div class="card-body">
                    <h5 class="card-title mb-3">#{{ $index + 1 }} — SR No: {{ $return->sr_no }}</h5>
                    <p class="mb-2"><strong>📅 Date:</strong> {{ $return->date }}</p>
                    <p class="mb-2"><strong>👤 Customer:</strong> {{ $return->customer->customer_name ?? 'N/A' }}</p>
                    <p class="mb-2"><strong>🔢 Quantity:</strong> {{ $return->qty }}</p>
                    <p><strong>📝 Reason:</strong> {{ $return->reason }}</p>
                </div>
                <div class="card-footer text-end border-0" style="background-color: transparent;">
                    <small class="text-light fst-italic">Sale return #{{ $return->sr_no }}</small>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
