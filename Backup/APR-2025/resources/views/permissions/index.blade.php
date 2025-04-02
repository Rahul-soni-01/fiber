<x-layout>
    <x-slot name="title">Show Party</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
        
            <h1>Permission Details </h1>

            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Permission name</th>
                        
                    </tr>
                </thead>

                <tbody>

                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{$permission->id}}</td>
                            <td>{{$permission->name}}</td>
                     
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </x-slot>
</x-layout>