@extends('demo')

@section('title', 'Add Serial No')



@section('content')

<h1>Add Serial No</h1>

@if($existingrecord === 0)

<form action="{{ route('add_sr_no_store')}}" method="post">
    @csrf

    <input type="hidden" name="sr_no" id="sr_no" value="{{ $sr_no }}">

    @if($errors->has('serial_no'))
        @foreach($errors->get('serial_no') as $index => $error)
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                setTimeout(function() {
                    @foreach($errors->get('serial_no') as $index => $error)
                        var errorField = document.getElementById("error_sr_{{ $index }}");
                        if (errorField) {
                            errorField.textContent = "{{ $error }}";
                        }
                    @endforeach
                }, 1000); // 1-second delay
            });
        </script>
        @endforeach
    @endif

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

                <h5> No:- {{ $invoice_no }}</h5>

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

        <div class="row">

            <div class="col-md-5 mt-3 offset-md-2">

                @if($sr_no === '1'){

                Add Serial No

                }

                @endif

                <div class="row append_fields"></div>



            </div>

        </div>

    </div>



</form>

@else

!! Data already in stock !! </br>

{{-- {{ dd($existingrecord); }} --}}

<a href="{{ route('inward.index') }}" class="btn btn-primary sub-item">Show Inward</a>



<script>
    window.onload = function() {

                        Swal.fire({

                            icon: "error",

                            title: 'error!',

                            text: 'Data Already In Stock',

                            // icon: 'success',

                            confirmButtonText: 'OK'

                        });

                    };

</script>



@foreach($getsr_nos as $getsr_no)

<div class="row">

    <div class="col-md-3 mt-3 offset-md-2">

        Serial No

    </div>

    <div class="col mt-3">

        {{ $getsr_no->serial_no}}

    </div>

</div>

@endforeach



@endif

@endsection