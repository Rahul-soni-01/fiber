@extends('demo')
@section('title', 'Sale')
@section('content')
<h1>Sale</h1>
<a href="{{ route('sale.index') }}" class="btn btn-primary">Back to Sale</a>
@if ($errors->any())
<div style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="main" id="main">
    <form action="{{ route('sale.update', $sale->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="row d-none d-md-flex fw-bold">
                <div class="col-md-3 col-sm-6">Invoice No.</div>
                <div class="col-md-3 col-sm-6">Date</div>
                <div class="col-md-3 col-sm-6">Customer Name</div>
                <div class="col-md-3 col-sm-6">Status</div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-3 col-sm-6 col-12">
                    <input type="number" id="invoice_no" name="sale_id" class="form-control" value="{{ $sale->sale_id }}" required>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <input type="date" id="date" name="date" class="form-control" value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <select id="party_name" name="cid" class="form-control" required>
                        <option value="" disabled>Choose a Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" {{ $customer->id == $sale->cid ? 'selected' : '' }}>{{ $customer->customer_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <label class="d-md-none fw-bold">Status</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="0" {{ $sale->status == 0 ? 'selected' : '' }}>Sale</option>
                        <option value="1" {{ $sale->status == 1 ? 'selected' : '' }}>Demo</option>
                        <option value="2" {{ $sale->status == 2 ? 'selected' : '' }}>Standby</option>
                        <option value="3" {{ $sale->status == 3 ? 'selected' : '' }}>Replacement</option>
                    </select>
                </div>
            </div>
    
            <div class="cus-container mt-2">
                <h1 class="mt-3">Product Details</h1>
            
                <div class="row fw-bold d-none d-md-flex">
                    <div class="col-md-3 col-lg-2">Category</div>
                    <div class="col-md-3 col-lg-2">Sub Category</div>
                    <div class="col-md-2 col-lg-1">Unit</div>
                    <div class="col-md-2 col-lg-2">Sr No</div>
                    <div class="col-md-2 col-lg-1">Qty</div>
                    <div class="col-md-2 col-lg-1">Rate</div>
                    <div class="col-md-2 col-lg-1">Tax(%)</div>
                    <div class="col-md-2 col-lg-2">Total</div>
                </div>
            
                @foreach($sale->items as $key => $item)
                    <div class="row g-2 align-items-center product-row">
                        <div class="col-md-3 col-lg-2">
                            <label class="d-md-none fw-bold">Category</label>
                            <select name="cname[]" class="form-control">
                                @foreach($sale_product_categories as $category)
                                    <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
            
                        <div class="col-md-3 col-lg-2">
                            <label class="d-md-none fw-bold">Sub Category</label>
                            <select name="scname[]" class="form-control">
                                @foreach($sale_product_subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" {{ $item->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                                        {{ $subcategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
            
                        <div class="col-md-2 col-lg-1">
                            <label class="d-md-none fw-bold">Unit</label>
                            <select name="unit[]" class="form-control">
                                <option value="Pic" {{ $item->unit == 'Pic' ? 'selected' : '' }}>Pic</option>
                                <option value="Mtr" {{ $item->unit == 'Mtr' ? 'selected' : '' }}>Mtr</option>
                            </select>
                        </div>
            
                        <div class="col-md-2 col-lg-2">
                            <label class="d-md-none fw-bold">Sr No</label>
                            <input type="text" name="sr_no[]" class="form-control" value="{{ $item->sr_no }}">
                        </div>
            
                        <div class="col-md-2 col-lg-1">
                            <label class="d-md-none fw-bold">Qty</label>
                            <input type="number" name="qty[]" class="form-control qty" value="{{ $item->qty }}">
                        </div>
            
                        <div class="col-md-2 col-lg-1">
                            <label class="d-md-none fw-bold">Rate</label>
                            <input type="number" name="rate[]" class="form-control rate" value="{{ $item->rate }}">
                        </div>
            
                        <div class="col-md-2 col-lg-1">
                            <label class="d-md-none fw-bold">Tax(%)</label>
                            <input type="number" name="p_tax[]" class="form-control tax" value="{{ $item->p_tax }}">
                        </div>
            
                        <div class="col-md-2 col-lg-2">
                            <label class="d-md-none fw-bold">Total</label>
                            <input type="number" name="total[]" class="form-control total" value="{{ $item->total }}" readonly>
                        </div>
                    </div>
                @endforeach
            </div>
            
    
            <div class="container">
                <div class="row mt-3 d-none">
                    <div class="col-sm-2 offset-sm-8">Amount ($/¥)</div>
                    <div class="col-sm-2">
                        <input type="number" id="amount_d" name="amount_d" value="0" placeholder="How much USD" step="0.01"
                            required class="form-control" onchange="rate()"  disabled>
                    </div>
                </div>
                <div class="row mt-3 d-none">
                    <div class="col-sm-2 offset-sm-8">Rate (₹)</div>
                    <div class="col-sm-2">
                        <input type="number" id="rate_r" name="rate_r" class="form-control" step="0.01"
                            placeholder="Rate of USD" required onchange="rate()" value="1" disabled>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2 offset-sm-8">Amount (₹)</div>
                    <div class="col-sm-2">
                        <input type="number" id="amount_r" name="amount_r" value="{{ $sale->amount_r }}" step="0.01" class="form-control" readonly>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2 offset-sm-8">Shipping Cost</div>
                    <div class="col-sm-2"><input type="number" id="shipping_cost" name="shipping_cost" class="form-control" value="{{ $sale->shipping_cost }}"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2 offset-sm-8">Sub Total</div>
                    <div class="col-sm-2"><input type="number" id="sub_total" name="sub_total" class="form-control" value="{{ isset($sale) ? ($sale->amount_r + $sale->shipping_cost) : 10 }}" readonly></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2 offset-sm-8">Round Amount</div>
                    <div class="col-sm-2"><input type="number" id="round_total" step="0.01" name="round_total" class="form-control" value="{{ $sale->round_total }}"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2 offset-sm-8">Total Amount</div>
                    <div class="col-sm-2"><input type="number" id="amount" name="amount" class="form-control" value="{{ $sale->amount ?? 0 }}" readonly></div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-2 offset-sm-10">
                        <button class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </div>
    
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Calculate total for a single row
            function calculateRowTotal(row) {
                const qty = parseFloat(row.querySelector('.qty').value) || 0;
                const rate = parseFloat(row.querySelector('.rate').value) || 0;
                const tax = parseFloat(row.querySelector('.tax').value) || 0;
                
                const subtotal = qty * rate;
                const taxAmount = subtotal * (tax / 100);
                const total = subtotal + taxAmount;
                
                row.querySelector('.total').value = total.toFixed(2);
                return total;
            }
    
            // Calculate all totals
            function calculateAllTotals() {
                let sum = 0;
                document.querySelectorAll('.product-row').forEach(row => {
                    sum += calculateRowTotal(row);
                });
                
                const shippingCost = parseFloat(document.getElementById('shipping_cost').value) || 0;
                const roundTotal = parseFloat(document.getElementById('round_total').value) || 0;
                
                const subTotal = sum + shippingCost;
                const finalAmount = subTotal + roundTotal;
                
                document.getElementById('sub_total').value = subTotal.toFixed(2);
                document.getElementById('amount_r').value = finalAmount.toFixed(2);
                document.getElementById('amount').value = finalAmount.toFixed(2);
            }
    
            // Add event listeners to all quantity, rate, and tax inputs
            document.querySelectorAll('.qty, .rate, .tax').forEach(input => {
                input.addEventListener('input', function() {
                    calculateRowTotal(this.closest('.product-row'));
                    calculateAllTotals();
                });
            });
    
            // Add event listeners to shipping and round total
            document.getElementById('shipping_cost').addEventListener('input', calculateAllTotals);
            document.getElementById('round_total').addEventListener('input', calculateAllTotals);
    
            // Calculate initial totals
            calculateAllTotals();
        });
        </script>
    </form>
    
</div>
@endsection