@extends('demo')
@section('title', 'Show Types')

@section('content')
<a href="{{ route('type.create') }}" class="btn btn-primary mb-3">Add Type</a>
<table class="table text-white">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($types as $type)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$type->name}}</td>

            <td><a href="{{ route('type.edit', ['type_id' => $type->id]) }}"><i class="ri-eye-fill"></i></a>
                <form action="{{ route('type.destroy', $type->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <!-- Specify the method as DELETE -->
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this type?');"
                        class="btn text-white"> <i class="ri-delete-bin-fill"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection