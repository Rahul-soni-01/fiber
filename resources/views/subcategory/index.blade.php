@extends('demo')

@section('title', 'Supplier Payment')



@section('content')

        <div class="main" id="main">

            @if ($errors->any())

            <div style="color: red;">

                <ul>

                    @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

            @endif

            @if ($errors->any())

            <div style="color: red;">

                <ul>

                    @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

            @endif



            <a href="{{ route('subcategory.create') }}" class="btn btn-primary">Add Sub Category</a>
            <div class="table-responsive">
            <table class="table text-white">

                <thead class="table-dark">

                    <tr>

                        <th>#</th>

                        {{-- <th>Category Add Date</th> --}}

                        <th>Category Name</th>

                        {{-- <th>Sub Category Add Date</th> --}}

                        <th>Sub Category Name</th>

                        <th>Unit</th>

                        <th>Sr No</th>

                        <th>Action</th>

                    </tr>

                </thead>



                <tbody>

                    @foreach ($subCategories as $subcategory)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        {{-- <td>{{$subCategory['category_date']}}</td> --}}

                        <td>{{$subcategory['category']->category_name ?? 'N/A'}}</td>

                         {{-- <td>{{$subCategory['sub_category_date']}}</td> --}}

                        <td>{{$subcategory['sub_category_name']}}</td>

                        <td>{{$subcategory['unit']}}</td>

                        <td>{{$subcategory['sr_no']}}</td>

                        <td>

                            <a href="{{ route('subcategory.edit', ['subcategory_id' => $subcategory['id']]) }}" class="btn btn-sm btn-warning"><i class="ri-pencil-fill"></i></a>  

                            <form action="{{ route('subcategory.destroy', $subcategory['id']) }}" method="POST" style="display:inline;">

                                @csrf

                                @method('DELETE')

                            <button type="submit" onclick="return confirm('Are you sure you want to delete this Sub Category?');" class="btn btn-sm text-white bg-danger"> <i class="ri-delete-bin-fill"></i></button>

                            </form>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>
            </div>
            

        </div>

@endsection
