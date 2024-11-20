<x-layout>
    <x-slot name="title">Show All sale</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <a href="{{ route('sale.create') }}" class="btn btn-primary mt-2 mb-2">Add User</a>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>customer_id</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                    <tr>
                        <td>{{$sale->sale_id}}</td>
                        <td>{{$sale->sale_date}}</td>
                        <td>{{$sale->customer_id}}</td>
                        <td>{{$sale->total_amount}}</td>
                        <td>
                            <a href="{{ route('sale.edit', ['sale_id' => $sale->id]) }}"><i class="ri-eye-fill"></i></a>  
                            <form action="{{ route('sale.destroy', $sale->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this sale?');" class="btn"> <i class="ri-delete-bin-fill"></i></button>
                        </form> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-layout>