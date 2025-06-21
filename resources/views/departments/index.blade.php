@extends('demo')
@section('title', 'Show Departments')
@section('content')
<a href="{{ route('departments.create') }}" class="btn btn-primary mb-2">Add Departments</a>
<table class="table text-dark">
    <thead class="bg-dark text-white">
        <tr>
            <th>#</th>
            <th>departments name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($departments as $department)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$department->name}}</td>
            <td>
                <a href="{{ route('departments.edit', ['department_id' => $department->id]) }}" class="btn btn-sm btn-warning"><i
                        class="ri-pencil-fill"></i></a>
                <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
                    style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <!-- Specify the method as DELETE -->
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this department?');"
                        class="btn btn-sm text-white bg-danger"> <i class="ri-delete-bin-fill"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection