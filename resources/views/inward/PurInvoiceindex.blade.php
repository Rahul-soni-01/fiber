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

    {{-- <h2 class="text-center">Selected Invoice :- {{ $SelectedInvoice['0']->invoice_no }}</h2> --}}
    <form action="{{ route('invoices.select') }}" method="POST" class="mb-3">
        @csrf
        @if($subcategories->isNotEmpty())
            <div class="row mb-3">
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold">All Subcategories:</label>
                    <input type="checkbox" id="selectAll" value="1" class="form-check form-check-input" name="selectAll">
                </div>

                <div class="col-md-6">
                    <label for="invoice_no" class="form-label fw-bold">Choose an Invoice:</label>
                    <select name="invoice_no" id="invoice_no" class="form-select" required>
                        <option value="" disabled selected>Select Invoice</option>
                        @foreach($invoices as $invoice)
                            <option value="{{ $invoice->invoice_no }}">{{ $invoice->invoice_no }}</option>
                        @endforeach
                    </select>
                </div>
                @else
                <p class="text-danger text-center">No subcategories found.</p>
                @endif
            </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary px-4">Submit</button>
        </div>
    </form>

    <div class="container mt-4">
        <form action="{{ route('invoices.select') }}" method="POST" class="mb-3">
            @csrf
            @if($subcategories->isNotEmpty())
            <div class="row mb-3">
                @foreach($subcategories as $subcategory)
                    <div class="col-md-1 mb-2">
                        <label for="scid" class="form-label fw-bold">{{ $subcategory['sub_category_name'] }}</label>
                        <input type="hidden" name="scid[]" value="{{ $subcategory['id'] }}">
                    </div>
    
                    <div class="col-md-5 mb-2">
                            {{-- <label for="invoice_no" class="form-label fw-bold">Choose an Invoice:</label> --}}
                        <select name="invoice_no[]" id="invoice_no" class="form-select" required>
                            <option value="" disabled selected>Select Invoice</option>
                            @foreach($invoices as $invoice)
                            <option value="{{ $invoice->invoice_no }}" 
                                @if((isset($selectedInvoices[$subcategory->id]) && $selectedInvoices[$subcategory->id] == $invoice->invoice_no)) 
                                    selected 
                                @endif>
                                {{ $invoice->invoice_no }}
                            </option>
                            @endforeach 
                        </select>
                    </div>
                @endforeach
            </div>
            @else
                <p class="text-danger text-center">No subcategories found.</p>
            @endif
            <input type="hidden" name="selectAll" value="0">
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Submit</button>
            </div>
        </form>
    </div>
    
</div>
@endsection