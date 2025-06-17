@extends('demo')
@section('title', 'Good Inwards')
@section('content')
<h1>Good Inwards</h1>
<a href="{{ route('inward.index') }}" class="btn btn-primary mb-3">Show Inwards</a>
<form action="{{route('inward.good')}}" method="post">
    @csrf
    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col">Primary Category</div>
            <div class="col">Invoice No.</div>
            <div class="col">Date</div>
            <div class="col">Party Name</div>
        </div>
        <div class="row g-3">
            <!-- Added g-3 for spacing -->
            <div class="col-md-6 col-lg-3">
                <select class="form-select" id="main_category" name="main_category" required
                    onchange="filterSecoundryCategory(event)">
                    <option value="" disabled {{ request('main_category') ? '' : 'selected' }}>Choose a category
                    </option>
                    <option value="Electronic" {{ request('main_category')=='Electronic' ? 'selected' : '' }}>Electronic
                    </option>
                    <option value="Optical" {{ request('main_category')=='Optical' ? 'selected' : '' }}>Optical</option>
                    <option value="Mechanical" {{ request('main_category')=='Mechanical' ? 'selected' : '' }}>Mechanical
                    </option>
                    <option value="Consumable" {{ request('main_category')=='Consumable' ? 'selected' : '' }}>Consumable
                    </option>
                    <option value="Others" {{ request('main_category')=='Others' ? 'selected' : '' }}>Others</option>
                </select>

            </div>
            <div class="col-md-6 col-lg-3">
                <input type="number" id="invoice_no" name="invoice_no" class="form-control"
                    placeholder="Enter Invoice No.">
            </div>
            <div class="col-md-6 col-lg-3">
                <input type="date" id="date" name="date" class="form-control"
                    value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
            </div>
            <div class="col-md-6 col-lg-3">
                <select id="party_name" name="party_name" class="form-select" required>
                    <option value="" disabled selected>Choose a Supplier</option>
                    @foreach($partyname as $party)
                    <option value="{{ $party->id }}">{{ $party->party_name }}</option>
                    @endforeach
                </select>
            </div>
            

        </div>
        <!-- Product Details Section -->
        <div class="cus-container mt-2">
            <h1>Product Details</h1>
            <div class="row custom-row g-2 align-items-center">
                <!-- Category Name -->
                <div class="col custom-col">
                    <label for="data[0][cname]" class="form-label" style="white-space:nowrap;">Category Name</label>
                    <select id="data[0][cname]" name="cname[]" class="form-control" onchange="filterOptions(event)">
                        <option value="" disabled selected>Choose a Category</option>
                        @foreach($inwards as $inward)
                        <option value="{{ $inward->id }}">{{ $inward->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Sub Category Name -->
                <div class="col">
                    <label for="data[0][scname]" class="form-label" style="white-space:nowrap;">Sub Category </label>
                    <select id="data[0][scname]" name="scname[]" class="form-control" onchange="filterOptions(event)">
                        <option value="" disabled selected class="0" data-unit="">Choose a Sub Category</option>
                        @foreach($items as $item)
                        <option value="{{ $item->id }}" class="{{ $item->cid }}" data-unit="{{ $item->unit }}">{{
                            $item->sub_category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Unit -->
                <div class="col">
                    <label for="data[0][unit]" class="form-label">Unit</label>
                    <select id="data[0][unit]" name="unit[]" class="form-control">
                        <option value="">Select</option>
                        <option value="Pic">Pcs</option>
                        <option value="Mtr">Mtr</option>
                    </select>
                </div>
                <!-- Quantity -->
                <div class="col">
                    <label for="data[0][qty]" class="form-label">Qty</label>
                    <input type="number" id="data[0][qty]" name="qty[]" class="form-control" placeholder="Quantity"
                        onchange="total()">
                </div>
                <!-- Rate -->
               
                <div class="col">
                    <label for="data[0][rate]" class="form-label">
                        Rate (<span id="currencySymbol">$</span>)
                    </label>
                    <input type="number" id="data[0][rate]" name="rate[]" class="form-control" placeholder="Rate"
                        onchange="total()">
                </div>

                <!-- Tax Percentage -->
                <div class="col">
                    <label for="data[0][p_tax]" class="form-label">Tax(%)</label>
                    <input type="number" id="data[0][p_tax]" name="p_tax[]" step="0.01" placeholder="Tax"
                        class="form-control" onchange="total()" value="0">
                </div>
                <!-- Tax Amount -->
                <div class="col">
                    <label for="data[0][tax]" class="form-label">Tax</label>
                    <input type="number" id="data[0][tax]" name="tax[]" step="0.01" class="form-control" disabled>
                </div>
                <!-- Total Amount -->
                <div class="col">
                    <label for="data[0][total]" class="form-label">Total</label>
                    <input type="number" id="data[0][total]" name="total[]" step="0.01" placeholder="Total"
                        class="form-control">
                </div>
                <div class="col-auto">
                    <label for="" class="form-label"></label>
                    <button type="button" class="btn btn-primary"
                        onclick="BtnAdd({{ json_encode($inwards)}},{{ json_encode($items)}})">+</button>
                </div>
            </div>
            <div class="" id="TBody"></div>
        </div>
        <!-- Summary Section -->
        <div class="container">
            <div class="row mt-3">
                 <div class="col-sm-2 offset-sm-8"><label for="currency" class="form-label">Currency</label></div>
                <div class="col-sm-2">
                    <select id="currency" name="currency" class="form-select" >
                        <option value="₹" selected>₹ - INR</option>
                        <option value="¥" >¥ - JPY</option>
                        <option value="$">$ - USD</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2 offset-sm-8">Amount ($/¥)</div>
                <div class="col-sm-2">
                    <input type="number" id="amount_d" name="amount_d" placeholder="How much ($/¥/₹)" step="0.01" required
                        class="form-control" onchange="rate()">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2 offset-sm-8">Rate (₹)</div>
                <div class="col-sm-2">
                    <input type="number" id="rate_r" name="rate_r" class="form-control" step="0.01"
                        placeholder="Rate of ($/¥/₹)" required onchange="rate()">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2 offset-sm-8">Amount (₹)</div>
                <div class="col-sm-2">
                    <input type="number" id="amount_r" name="amount_r" step="0.01" class="form-control">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2 offset-sm-8">Shipping Cost </div>
                <div class="col-sm-2">
                    <input type="number" id="shipping_cost" step="0.01" value="0" name="shipping_cost"
                        class="form-control" oninput="calculateshipping()">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2 offset-sm-8">Sub Total</div>
                <div class="col-sm-2"><input type="number" id="sub_total" step="0.01" name="sub_total"
                        class="form-control" disabled></div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2 offset-sm-8">Round Amount</div>
                <div class="col-sm-2"><input type="number" id="round_total" step="0.01" value="0" name="round_total"
                        class="form-control" oninput="calculateAmount()"></div>
            </div>
            {{-- <div class="row mt-3">
                <div class="col-sm-2 offset-sm-8">Paid Amount</div>
                <div class="col-sm-2">
                    <input type="number" id="paid_total" step="0.01" value="0" name="paid_total" class="form-control"
                        onchange="calculateAmount()">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2 offset-sm-8">
                    <label for="data[0][unit]" class="form-label ">Payment Method</label>
                </div>
                <div class="col-sm-2">
                    <select id="payment_method" name="payment_method" class="form-control">
                        <option value="" disabled selected>Select</option>
                        <option value="Cash">Cash</option>
                        <option value="Bank">Bank</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2 offset-sm-8">Due/Reamining Amount</div>
                <div class="col-sm-2"><input type="number" id="remaining_amount" step="0.01" value="0"
                        name="remaining_amount" class="form-control" onchange="calculateAmount()" readonly></div>
            </div> --}}
            <div class="row mt-3">
                <div class="col-sm-2 offset-sm-8">Amount</div>
                <div class="col-sm-2"><input type="number" id="amount" step="0.01" name="amount" class="form-control"
                        readonly></div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-2 offset-sm-10">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection