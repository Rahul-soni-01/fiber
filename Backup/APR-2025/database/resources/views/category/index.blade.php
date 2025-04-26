@extends('demo')

@section('title', 'Add Category')



@section('content')

@if ($errors->any())

<div style="color: red;">

    <ul>

        @foreach ($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif



<a href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a>
<table class="table text-white">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Category Name</th>
            <th>Main Category</th> <!-- New Column for Main Category -->
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category['category_name'] }}</td>
            <td>{{ $category['main_category'] }}</td> <!-- Displaying Main Category -->
            <td>
                <a href="{{ route('category.edit', ['category_id' => $category['id']]) }}" class="btn btn-sm btn-warning">
                    <i class="ri-pencil-fill"></i>
                </a>
                <form action="{{ route('category.destroy', $category['id']) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this Category?');"
                        class="btn btn-sm text-white bg-danger">
                        <i class="ri-delete-bin-fill"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection