@extends('demo')

@section('title', 'Sub Category')



@section('content')

        <div class="main" id="main">

            <a href="{{ route('subcategory.index') }}" class="btn btn-primary mb-2">Back to Subcategory</a>

            

            <form action="{{ route('subcategory.update', $subcategory->id) }}" method="post">

                @csrf

                @method('PUT') <!-- Explicitly set the method to PUT for updating -->

                

                @if ($errors->any())

                <div class="alert alert-danger">

                    <ul>

                        @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

                @endif

                

                <div class="row mb-3">

                    <div class="col-md-3">

                        <label for="category" class="form-label">Category</label>

                        <select name="cid" id="category" class="form-control" required>

                            <option value="" disabled>Select Category</option>

                            @foreach($categories as $category)

                            <option value="{{ $category->id }}" {{ ($subcategory->cid == $category->id) ? 'selected' : '' }}>

                                {{ $category->category_name }}

                            </option>

                            @endforeach

                        </select>

                        @error('category')

                        <div class="text-danger">{{ $message }}</div>

                        @enderror

                    </div>

            

                    <div class="col-md-3">

                        <label for="sub_category" class="form-label">Sub Category</label>

                        <input type="text" name="sub_category_name" id="sub_category" class="form-control"

                               value="{{ $subcategory->sub_category_name }}" 

                               placeholder="Enter sub category" required>

                        @error('sub_category')

                        <div class="text-danger">{{ $message }}</div>

                        @enderror

                    </div>

            

                    <div class="col-md-3">

                        <label for="unit" class="form-label">Unit</label>

                        <select name="unit" id="unit" class="form-control" required>

                            <option value="" disabled>Select Unit</option>

                            <option value="Pic" {{ $subcategory->unit == 'Pic' ? 'selected' : '' }}>Pic</option>

                            <option value="Mtr" {{ $subcategory->unit == 'Mtr' ? 'selected' : '' }}>Mtr</option>

                        </select>

                        

                        

                    </div>

                    <div class="col-md-3">

                        <label for="sr_no" class="form-label">SR No.</label><br>

                        <input type="hidden" name="sr_no" value="0">

                        <input type="checkbox" id="sr_no" name="sr_no" value="1" {{ $subcategory->sr_no == 1 ? 'checked' : '' }}>

                    </div>

                        

                    <div class="row mb-3">

                        

                        <div class="col-md-3 mt-3">

                            <button type="submit" class="btn btn-success mt-3">Update</button>

                        </div>

                    </div>

                </div>

            </form>

        </div>

@endsection
