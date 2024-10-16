<x-layout>
    <x-slot name="title">Show Party</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <form action="search" method="get">
                <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3 mb-3">
                        <input type="text" id="party_name" name="party_name" class="form-control" placeholder="Party Name">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 mb-3">
                        <input type="text" id="address" name="address" class="form-control" placeholder="Address">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 mb-3">
                        <input type="text" id="telephone_no" name="telephone_no" class="form-control" placeholder="Telephone No.">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 mb-3">
                        <input type="text" id="cont_name" name="cont_name" class="form-control" placeholder="Contact Person Name">
                    </div>
                </div>
                    <div class="row justify-content-center" style="margin-top:2%">
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-dark" id="search" name="search">Search</button>
                        </div>
                    </div>
                </div>
            </form> 

            <h1>Party Details </h1>

            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>party name</th>
                        <th>Address</th>
                        <th>telephone no </th>
                        <th>contact person name </th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->party_name}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->telephone_no}}</td>
                            <td>{{$user->sender_name}}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </x-slot>
</x-layout>