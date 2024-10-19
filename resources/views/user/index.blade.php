<x-layout>
    <x-slot name="title">Show All User</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <a href="{{ route('user.create') }}" class="btn btn-primary mt-2 mb-2">Add User</a>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->type}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="{{ route('user.edit', ['user_id' => $user->id]) }}"><i class="ri-eye-fill"></i></a>  
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this User?');" class="btn"> <i class="ri-delete-bin-fill"></i></button>
                        </form> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-layout>