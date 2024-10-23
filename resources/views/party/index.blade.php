<x-layout>
    <x-slot name="title">Show Party</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <form action="search" method="get">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3 mb-3">
                            <input type="text" id="party_name" name="party_name" class="form-control" placeholder="Party Name" value="{{ request('party_name') }}">
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 mb-3">
                            <input type="text" id="address" name="address" class="form-control" placeholder="Address" value="{{ request('address') }}">
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 mb-3">
                            <input type="text" id="telephone_no" name="telephone_no" class="form-control" placeholder="Telephone No." value="{{ request('telephone_no') }}">
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 mb-3">
                            <input type="text" id="cont_name" name="cont_name" class="form-control" placeholder="Contact Person Name" value="{{ request('cont_name') }}">
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
            @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>party name</th>
                        <th>Address</th>
                        <th>telephone no </th>
                        <th>contact person name </th>
                        <th>Action </th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($parties as $party)
                        <tr>
                            <td>{{$party->id}}</td>
                            <td>{{$party->party_name}}</td>
                            <td>{{$party->address}}</td>
                            <td>{{$party->telephone_no}}</td>
                            <td>{{$party->sender_name}}</td>
                            <td>
                                <a href="{{ route('party.edit', ['party_id' => $party->id]) }}"><i class="ri-eye-fill"></i></a>  
                                <form action="{{ route('party.destroy', $party->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this department?');" class="btn "> <i class="ri-delete-bin-fill"></i></button>
                            </form> </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </x-slot>
</x-layout>