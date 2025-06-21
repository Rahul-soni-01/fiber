@extends('demo')
@section('title', 'Add Serial No')
@section('content')
<h1>Add Serial No</h1>


@if(($SubCategoy->sr_no == 1 && isset($getsr_nos[0]) && $totalQty > count($getsr_nos)) || ($SubCategoy->sr_no == 0 &&
isset($getsr_nos[0]) && $getsr_nos[0]->qty < $totalQty) || $getsr_nos->isEmpty())
    <form action="{{ route('add_sr_no_store')}}" method="post">
        @csrf
        <input type="hidden" name="sr_no" id="sr_no" value="{{ $sr_no }}">
        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <div class="container">
            <div class="row g-2 align-items-center">
                <!-- Purchase Select -->
                <div class="col-md">
                    @if(empty($invoice_no))
                    <select class="form-control" name="invoice_no" id="invoice_no" onclick="change_purchase()">
                        <option value="" disabled selected>Select Invoice No</option>
                        @foreach($inwards as $tbl_purchase)
                        <option value="{{ $tbl_purchase->invoice_no }}" @if($tbl_purchase->invoice_no ==
                            !empty($invoice_no)) selected
                            @endif>
                            {{ $tbl_purchase->invoice_no }}
                        </option>
                        @endforeach
                    </select>
                    @else
                    <h5>Invoice No:- {{ $invoice_no }}</h5>
                    <input type="hidden" name="invoice_no" value="{{ $invoice_no }}">
                    @endif
                </div>
                <!-- Category Select -->
                <div class="col-md">
                    @if(empty($req_category))
                    <select class="form-control" name="cid" id="category" onclick="change_category()">
                        <option value="" disabled selected class="0">Select Category</option>
                        @foreach($Categories as $category)
                        <option value="{{ $category->id }}" class="{{ $category->id }} " @if($category->id ==
                            !empty($req_category)) selected @endif>
                            {{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    @else
                    <h5> Name:-
                        @foreach($Categories as $category)
                        @if($category->id == $req_category)
                        {{ ($category->category_name)}}
                        @endif
                        @endforeach
                    </h5>
                    <input type="hidden" name="cid" value="{{ $req_category }}">
                    @endif
                </div>
                <!-- Sub Category Select -->
                <div class="col-md">
                    @if(empty($req_subcategory))
                    <select class="form-control" name="scid" id="subcategory" onclick="change_subcategory()">
                        <option value="" disabled selected class="0">Select Sub Category</option>
                        @foreach($SubCategories as $subcategory)
                        <option value="{{ $subcategory->id }}" @if($category->id == !empty($req_subcategory))
                            selected @endif>
                            {{ $subcategory->sub_category_name }}
                        </option>
                        @endforeach
                    </select>
                    @else
                    <h5>Sub Category:-
                        @foreach($SubCategories as $subCategory)
                        @if($subCategory->id == $req_subcategory)
                        {{ ($subCategory->sub_category_name)}}
                        @endif
                        @endforeach
                    </h5>
                    <input type="hidden" name="scid" value="{{ $req_subcategory }}">
                    @endif
                </div>
            </div>
            <div class="row mt-3">
                <!-- Quantity Input -->
                <div class="col-md">
                    <input type="text" class="form-control" name="qty" id="qty" placeholder="Add Qty">
                    <input type="checkbox" name="sr_check" id="sr_check" hidden>

                </div>
                <!-- Price Input -->
                <div class="col-md">
                    <input type="text" class="form-control" id="price" name="price" placeholder="Add Price">
                </div>
                <input type="hidden" class="form-control" id="unit" name="unit" placeholder="Add unit"
                    value="{{ $req_unit }}">
                <!-- Submit Button -->
                <div class="col-md">
                    <button type="submit" class="btn btn-dark" id="add_stock">Submit</button>
                </div>
            </div>
            @if ($sr_no == '1')
            <textarea rows="5" name="sr_no" class="form-control mt-3" cols="50"
                placeholder="Enter SR No... (One per Line)"> {{old('sr_no')}}</textarea>
            <span class="mt-3 badge bg-success text-white p-2 rounded">Serial Number Is Available</span>
            @elseif ($sr_no == '0')
            <span class="mt-3 badge bg-danger text-white p-2 rounded">Serial Number Not Available</span>
            @endif

            <div class="row">
                <div class="col-md-5 mt-3 offset-md-2">
                    @if($sr_no === '1'){
                    Add Serial No
                    }
                    @endif
                    <div class="row append_fields1"></div>
                </div>
            </div>
        </div>
    </form>
    @else
    !! Data already in stock !! </br>
    <a href="{{ route('inward.index') }}" class="btn btn-primary sub-item">Show Inward</a>
    <script>
        window.onload = function() {
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Serial No Added Successfully",
            showConfirmButton: false,
            timer: 1500
            });
        };
    </script>
    @endif
    @if($getsr_nos->count())
    <div class="table-responsive mt-3">
        <table class="table text-dark">
            <thead class="bg-dark text-white">
                <tr>
                    <th>#</th>
                    <th>Serial No</th>
                    <th>Qty</th>
                    <th>Used</th>
                    <th>Dead</th>
                </tr>
            </thead>
            <tbody>
                @foreach($getsr_nos as $index => $getsr_no)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $getsr_no->serial_no }}</td>
                    <td>{{ $getsr_no->qty }}</td>
                    <td>{{ $getsr_no->status == 0 ? 'No Use' : ($getsr_no->status == 1 ? 'Used' : 'Unknown') }}</td>
                    <td>
                        <div class="me-2">
                            @if($getsr_no->dead_status == 0)
                            <span class="badge bg-success">Active</span>
                            @elseif($getsr_no->dead_status == 1)
                            <span class="badge bg-danger">Dead</span>
                            @else
                            <span class="badge bg-secondary">Unknown</span>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p class="text-white">No serial numbers found.</p>
    @endif

    @endsection