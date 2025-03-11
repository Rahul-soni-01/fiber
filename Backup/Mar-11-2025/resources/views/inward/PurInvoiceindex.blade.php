@extends('demo')
@section('title', 'Invoice Index')

@section('content')
<div class="card-body">
    <!-- Success Message -->
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <h2 class="text-center">Selected Invoice :- {{ $SelectedInvoice['0']->invoice_no }}</h2>

    <form action="{{ route('invoices.select') }}" method="POST" class="mb-3">
        @csrf
        <div class="mb-3">
            <label for="invoice_no" class="form-label fw-bold">Choose an Invoice:</label>
            <select name="invoice_no" id="invoice_no" class="form-select w-50" required>
                <option value="" disabled selected>Select Invoice</option>
                @foreach($invoices as $invoice)
                <option value="{{ $invoice->invoice_no }}" @if (!empty($SelectedInvoice) && $SelectedInvoice['0']->invoice_no
                    == $invoice->invoice_no) selected @endif
                    >{{ $invoice->invoice_no }}</option>
                @endforeach
            </select>
        </div>

        <div class="text-center ">
            <button type="submit" class="btn btn-primary px-4">Select</button>
        </div>
    </form>
</div>
@endsection