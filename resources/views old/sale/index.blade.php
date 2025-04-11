@extends('demo')
@section('title', 'Sale')

@section('content')
<h1>Sale</h1>
<div class="main" id="main">
    <a href="{{ route('sale.create') }}" class="btn btn-primary mb-2">Add Sale</a>
    <table class="table text-white">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                {{-- <th>Date</th> --}}
                <th>Customer</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $index => $sale)
            {{-- {{ dd($sale);}} --}}
            <tr>
                <td>{{ $index + 1 }}</td>
                {{-- <td>{{ $sale->sale_date ?? 'N/A' }}</td> --}}
                <td>{{ $sale->customer_name ?? 'N/A' }}</td>
                <td>{{ $sale->total_sale_amount ?? 0 }}</td>
                <td>
                    <button class="btn"> <a href="{{ route('customer.sell.details', ['customer_id' =>  $sale->id ]) }}">
                            <i class="ri-history-fill"></i> </a></button>
                    </a>
                    {{-- <a class="btn" href="{{ route('sale.edit', ['sale_id' => $sale->id]) }}">
                        <i class="ri-pencil-line"></i>
                    </a> --}}
                    {{-- <form action="{{ route('sale.destroy', $sale->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this sale?');"
                            class="btn">
                            <i class="ri-delete-bin-fill"></i>
                        </button>
                    </form> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection