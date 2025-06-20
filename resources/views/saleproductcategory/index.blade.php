@extends('demo')

@section('title', 'Sale Product Category')



@section('content')

<h1>Sale Product Category</h1>

<div class="main" id="main">

    @if (session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

    @endif



    <a href="{{ route('saleproductcategory.create') }}" class="btn btn-primary mb-2">Add Sale Product Category</a>

    <table class="table text-dark">

        <thead class="table-dark text-white">

            <tr>

                <th>#</th>

                <th>Category Name</th>

                <th>Category Type</th>

                <th>Action</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($categories as $category)

            <tr>

                <td>{{ $category->id }}</td>

                <td>{{ $category->name }}</td>

                <td>{{ $category->is_type ? 'Active' : 'Inactive' }}</td>



                <td>

                    <!-- Edit Link -->

                    <a href="{{ route('saleproductcategory.edit', ['id' => $category->id]) }}" class="btn btn-sm btn-warning">

                        <i class="ri-pencil-fill"></i>

                    </a>



                    <!-- Delete Form -->

                    <form action="{{ route('saleproductcategory.destroy', $category->id) }}" method="POST"

                        style="display:inline;">

                        @csrf

                        @method('DELETE')

                        <button type="submit" onclick="return confirm('Are you sure you want to delete this category?');" class="btn btn-sm text-white bg-danger">
                            <i class="ri-delete-bin-fill"></i>
                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>



</div>

@endsection