<x-layout>
    <x-slot name="title">Show Departments</x-slot>
    <x-slot name="main">
        <div class="main" id="main" style="">
            

            <a href="{{ route('departments.create') }}" class="btn btn-primary">Add Departments</a>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>departments name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <td>{{$department->id}}</td>
                            <td>{{$department->name}}</td>

                            <td><a href="{{ route('departments.edit', ['department_id' => $department->id]) }}"><i class="ri-eye-fill"></i></a>  <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE') <!-- Specify the method as DELETE -->
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this department?');" class="btn "> <i class="ri-delete-bin-fill"></i></button>
                            </form> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-layout>