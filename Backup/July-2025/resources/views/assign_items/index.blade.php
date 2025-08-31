@extends('demo')

@section('title', 'Assign Items')

@section('content')

<div class="main" id="main">

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
<div class="row">
    <div class="col-12">
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

                    <div class="row g-3">
                        <div class="col-md-4 col-sm-6 col-12">
                            <label for="temp" class="form-label">Temp/ Body No.</label>
                            <input type="text" name="temp" class="form-control" placeholder="Enter temporary info" value="{{ old('temp') }}">
                        </div>

                        <div class="col-md-4 col-sm-6 col-12">
                            <label for="sr_no_fiber" class="form-label">SR No (Fiber)</label>
                            <input type="text" name="sr_no_fiber" class="form-control" placeholder="Enter fiber serial number" value="{{ old('sr_no_fiber') }}">
                        </div>

                        <div class="col-md-4 col-sm-6 col-12">
                            <label for="scid" class="form-label">Sub Category</label>
                            <select id="data[0][scname]" name="scid" class="form-control select2">
                                <option value="" disabled selected>Choose a Sub Category</option>
                                @foreach($subCategories as $item)
                                    <option value="{{ $item->id }}" class="{{ $item->cid }}" data-unit="{{ $item->unit }}">
                                        {{ $item->category->category_name }} - {{ $item->sub_category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 col-sm-6 col-12">
                            <label for="qty" class="form-label">Quantity</label>
                            <input type="number" name="qty" class="form-control" placeholder="Enter quantity" value="{{ old('qty') }}" required>
                        </div>

                        <div class="col-md-4 col-sm-6 col-12">
                            <label for="sr_no" class="form-label">SR No</label>
                            <input type="text" name="sr_no" class="form-control" placeholder="Enter SR number" value="{{ old('sr_no') }}">
                        </div>

                        <div class="col-md-4 col-sm-6 col-12">
                            <label for="emp" class="form-label">Employee</label>
                            <input type="text" name="emp" class="form-control" placeholder="Enter employee name or ID" value="{{ old('emp') }}">
                        </div>

                        <div class="col-12 d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-success">
                                <i class="ri-check-line"></i> Save
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

    <table class="table text-dark">
        <thead class="table-dark text-white">
            <tr>
                <th>#</th>
                <th>Temp</th>
                <th>SR No (Fiber)</th>
                {{-- <th>CID</th> --}}
                <th>Item Name</th>
                <th>Qty</th>
                <th>SR No</th>
                <th>Employee</th>
                <th>Date/Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($assignItems as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->temp }}</td>
                <td>{{ $item->sr_no_fiber }}</td>
                <td>{{ $item->SubCategory->sub_category_name }}</td>
                <td>{{ $item->qty }}</td>
                <td>{{ $item->sr_no }}</td>
                <td>{{ $item->emp }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <a href="{{ route('assign-items.edit', $item->id) }}" class="btn btn-sm btn-warning">
                        <i class="ri-pencil-fill"></i>
                    </a>
                    <form action="{{ route('assign-items.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');"
                            class="btn btn-sm btn-danger">
                            <i class="ri-delete-bin-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
               <td></td>
               <td></td>
               <td></td>
               <td class="text-center">No Assign Items Found.</td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
          </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection
