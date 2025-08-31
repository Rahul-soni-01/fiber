@extends('demo')

@section('title', 'Add Assign Item')

@section('content')

<div class="container mt-4">
     
     <a href="{{ route('assign-items.index') }}" class="btn btn-secondary"><i class="ri-arrow-left-line"></i> Back  </a>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3 class="mb-4 text-center">Add Assign Item</h3>
               
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Please fix the following issues:
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('assign-items.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="temp" class="form-label">Temp/ Body No.</label>
                            <input type="text" name="temp" class="form-control" placeholder="Enter temporary info" value="{{ old('temp') }}">
                        </div>

                        <div class="mb-3">
                            <label for="sr_no_fiber" class="form-label">SR No (Fiber)</label>
                            <input type="text" name="sr_no_fiber" class="form-control" placeholder="Enter fiber serial number" value="{{ old('sr_no_fiber') }}">
                        </div>

                    

                        <div class="mb-3">
                              <label for="scid" class="form-label">Sub Category</label>
                              <select id="data[0][scname]" name="scid" class="form-control select2">
                                   <option value="" disabled selected class="0" data-unit="">Choose a Sub Category</option>
                                   @foreach($subCategories as $item)
                                   <option value="{{ $item->id }}" class="{{ $item->cid }}" data-unit="{{ $item->unit }}"> {{ $item->category->category_name}} - {{ $item->sub_category_name }}</option>
                                   @endforeach
                              </select>
                        </div>

                        <div class="mb-3">
                            <label for="qty" class="form-label">Quantity</label>
                            <input type="number" name="qty" class="form-control" placeholder="Enter quantity" value="{{ old('qty') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="sr_no" class="form-label">SR No</label>
                            <input type="text" name="sr_no" class="form-control" placeholder="Enter SR number" value="{{ old('sr_no') }}">
                        </div>

                        <div class="mb-3">
                            <label for="emp" class="form-label">Employee</label>
                            <input type="text" name="emp" class="form-control" placeholder="Enter employee name or ID" value="{{ old('emp') }}">
                        </div>

                        <div class="d-flex justify-content-between">
                           
                            <button type="submit" class="btn btn-success">
                                <i class="ri-check-line"></i> Save
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection
