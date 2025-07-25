@extends('demo')
@section('title', 'Edit Inward')
@section('content')
<script>
     var count = {{ count($inward->items) }};

     $(document).ready(function () {
          // Run total calculation after slight delay
          setTimeout(function () {
               total();
          }, 500);

          // Auto-redirect if main_category is already selected (Edit Blade)
          var selected = "{{ $inward->main_category }}";
          var urlParams = new URLSearchParams(window.location.search);

          if (selected && !urlParams.has('main_category')) {
               window.location.href = window.location.pathname + '?main_category=' + encodeURIComponent(selected);
          }
     });

     function filterSecoundryCategory(event) {
          var selectedCategory = $(event.target).val();
          if (selectedCategory) {
               window.location.href = '?main_category=' + encodeURIComponent(selectedCategory);
          }
     }
</script>

<h1>Edit Good Inwards</h1>
<a href="{{ route('inward.index') }}" class="btn btn-primary mb-3">Back to List</a>

<form action="{{ route('inward.update', $inward->id) }}" method="POST">
     @csrf
     @method('PUT')
     <!-- Important for PUT request -->

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
               <div class="col-md-6 col-lg-3">
                    <select class="form-select" name="main_category" id="main_category" disabled required onchange="filterSecoundryCategory(event)">
                         <option value="" disabled>Choose a category</option>
                         @foreach (['Electronic','Optical','Mechanical','Consumable','Others'] as $cat)
                         <option value="{{ $cat }}" {{ $inward->main_category === $cat ? 'selected' : '' }}>{{ $cat }}
                         </option>
                         @endforeach
                    </select>
               </div>

               <div class="col-md-6 col-lg-3">
                    <input type="number" name="invoice_no" class="form-control" value="{{ $inward->invoice_no }}"
                         readonly>
               </div>

               <div class="col-md-6 col-lg-3">
                    <input type="date" name="date" class="form-control" value="{{ $inward->date }}" required>
               </div>

               <div class="col-md-6 col-lg-3">
                    <select name="party_name" class="form-select" required>
                         <option value="">Choose a Supplier</option>
                         @foreach($partyname as $party)
                         <option value="{{ $party->id }}" {{ $inward->pid == $party->id ? 'selected' : '' }}>{{
                              $party->party_name }}</option>
                         @endforeach
                    </select>
               </div>
          </div>

          <hr>
          <h4>Edit Items</h4>
          <!-- Label Row -->
          <div class="row fw-bold mt-4">
               <div class="col">Category</div>
               <div class="col">Sub Category</div>
               <div class="col">Unit</div>
               <div class="col">Qty</div>
               <div class="col">Rate</div>
               <div class="col">Tax(%)</div>
               <div class="col">Total</div>
               <div class="col-auto"><button type="button" class="btn btn-success"
                         onclick="BtnAdd({{ json_encode($inwards)}},{{ json_encode($items)}})">+</button>
               </div>

          </div>

          <!-- Dynamic Product Rows -->
          @foreach($inwardsItems as $index => $item)
          <div class="row mt-2 align-items-end" id="row-{{ $index }}">
               <input type="hidden" name="item_ids[]" value="{{ $item->id }}">

               <div class="col">
                    <select name="cname[]" class="form-control">
                         @foreach($inwards as $cat)
                         <option value="{{ $cat->id }}" {{ $cat->id == $item->cid ? 'selected' : '' }}>{{
                              $cat->category_name }}</option>
                         @endforeach
                    </select>
               </div>
               <div class="col">
                    <select name="scname[]" class="form-control">
                         @foreach($items as $sub)
                         <option value="{{ $sub->id }}" {{ $sub->id == $item->scid ? 'selected' : '' }}>{{
                              $sub->sub_category_name }}</option>
                         @endforeach
                    </select>
               </div>
               <div class="col">
                    {{-- <input type="text" name="unit[]" class="form-control" value="{{ $item->unit }}"> --}}
                     <select name="unit[]" class="form-control">
                                <option value="Pic" {{ $item->unit == 'Pic' ? 'selected' : '' }}>Pcs</option>
                                <option value="Mtr" {{ $item->unit == 'Mtr' ? 'selected' : '' }}>Mtr</option>
                            </select>
               </div>
               <div class="col">
                    <input type="number" name="qty[]" id="data[{{$index}}][qty]" class="form-control"
                         value="{{ $item->qty }}" onchange="total()">
               </div>
               <div class="col">
                    <input type="number" name="rate[]" id="data[{{$index}}][rate]" class="form-control"
                         value="{{ $item->price }}" onchange="total()">
               </div>
               <div class="col">
                    <input type="number" name="p_tax[]" id="data[{{$index}}][p_tax]" class="form-control"
                         value="{{ $item->tax }}" onchange="total()">
               </div>
               <div class="col">
                    <input type="number" readonly id="data[{{$index}}][tax]" class="form-control" disabled
                         value="{{ ($item->qty * $item->price * $item->tax) / 100 }}">
               </div>
               <div class="col">
                    <input type="number" name="total[]" id="data[{{$index}}][total]" class="form-control"
                         value="{{ $item->total }}">
               </div>
               <div class="col-auto">

                    <button type="button" class="btn btn-sm btn-danger" onclick="BtnDel(this)"><i
                              class="ri-delete-bin-fill"></i></button>
               </div>
          </div>
          @endforeach

          <div class="" id="TBody"></div>

          <div class="row mt-3">
               <div class="col-sm-2 offset-sm-8">Currency</div>
               <div class="col-sm-2">
                    <select name="currency" class="form-select">
                         <option value="₹" {{ $inward->currency === '₹' ? 'selected' : '' }}>₹ - INR</option>
                         <option value="¥" {{ $inward->currency === '¥' ? 'selected' : '' }}>¥ - JPY</option>
                         <option value="$" {{ $inward->currency === '$' ? 'selected' : '' }}>$ - USD</option>
                    </select>
               </div>
          </div>

          <div class="row mt-3">
               <div class="col-sm-2 offset-sm-8">Amount</div>
               <div class="col-sm-2"><input type="number" id="amount_d" name="amount_d" value="{{ $inward->amount }}"
                         class="form-control" required></div>
          </div>

          <div class="row mt-3">
               <div class="col-sm-2 offset-sm-8">Rate (₹)</div>
               <div class="col-sm-2"><input type="number" name="rate_r" id="rate_r" value="{{ $inward->inr_rate }}"
                         class="form-control" required></div>
          </div>

          <div class="row mt-3">
               <div class="col-sm-2 offset-sm-8">Amount (₹)</div>
               <div class="col-sm-2"><input type="number" name="amount_r" id="amount_r"
                         value="{{ $inward->inr_amount }}" class="form-control" required></div>
          </div>

          <div class="row mt-3">
               <div class="col-sm-2 offset-sm-8">Shipping Cost</div>
               <div class="col-sm-2"><input type="number" name="shipping_cost" id="shipping_cost"
                         value="{{ $inward->shipping_cost }}" class="form-control"></div>
          </div>

          <div class="row mt-3">
               <div class="col-sm-2 offset-sm-8">Sub Total</div>
               <div class="col-sm-2">
                    <input type="number" id="sub_total" step="0.01" name="sub_total" class="form-control"
                         value="{{ ($inward->inr_amount ?? 0) + ($inward->shipping_cost ?? 0) }}">
               </div>
          </div>


          <div class="row mt-3">
               <div class="col-sm-2 offset-sm-8">Round Amount</div>
               <div class="col-sm-2"><input type="number" name="round_total" id="round_total"
                         value="{{ $inward->round_amount }}" class="form-control"></div>
          </div>

          <div class="row mt-3">
               <div class="col-sm-2 offset-sm-8">Total Amount</div>
               <div class="col-sm-2"><input type="number" name="amount" id="amount" value="{{ $inward->amount }}"
                         class="form-control" readonly></div>
          </div>

          <div class="row mt-3">
               <div class="col-sm-2 offset-sm-10">
                    <button class="btn btn-success" type="submit">Update</button>
               </div>
          </div>
     </div>
</form>
@endsection