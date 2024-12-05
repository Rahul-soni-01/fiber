<x-layout>
    <x-slot name="title">Show Type</x-slot>
    <x-slot name="main">
        <div class="main" id="main" style="">

            <a href="{{ route('type.create') }}" class="btn btn-primary">Add Type</a>
            <table class="table table-striped">
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
                            <td>{{$type->id}}</td>
                            <td>{{$type->name}}</td>

                            <td><a href="{{ route('type.edit', ['type_id' => $type->id]) }}"><i class="ri-eye-fill"></i></a>  <form action="{{ route('type.destroy', $type->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE') <!-- Specify the method as DELETE -->
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this type?');" class="btn "> <i class="ri-delete-bin-fill"></i></button>
                            </form> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-layout>