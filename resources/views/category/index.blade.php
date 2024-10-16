<x-layout>
    <x-slot name="title">Show Sub Category</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
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
                        {{-- <th>Category Add Date</th> --}}
                        <th>Category Name</th>
                        <th>Action</th>
                        {{-- <th>Sub Category Add Date</th> --}}
                        {{-- <th>Sub Category Name</th> --}}
                        {{-- <th>Unit</th> --}}
                        {{-- <th>Sr No</th> --}}
                    </tr>
                </thead>

                <tbody>

                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- <td>{{$category['category_date']}}</td> --}}
                        <td>{{$category['category_name']}}</td>
                        <td>
                            <a href="{{ route('party.edit', ['party_id' => $category['id']]) }}"><i class="ri-eye-fill"></i></a>  
                            <form action="{{ route('party.destroy', $category['id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this department?');" class="btn "> <i class="ri-delete-bin-fill"></i></button>
                        </form> </td>
                        {{-- <td>{{$category['sub_category_date']}}</td> --}}
                        {{-- <td>{{$category['sub_category_name']}}</td> --}}
                        {{-- <td>{{$category['unit']}}</td> --}}
                        {{-- <td>{{$category['sr_no']}}</td> --}}
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </x-slot>
</x-layout>