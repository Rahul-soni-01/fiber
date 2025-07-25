@extends('demo')
@section('title', 'Product Out')
@section('content')
<h1>Product Out</h1>
<div class="main" id="main">
<div class="d-flex align-items-center flex-wrap gap-1 m-1">
    <a href="{{ route('sale.create') }}" class="btn btn-primary m-1">Add Product Out</a>
    
    <a href="?status=0" class="btn btn-success m-1">Sale</a>
    <a href="?status=1" class="btn btn-info m-1">Demo</a>
    <a href="?status=2" class="btn btn-warning m-1">Standby</a>
    <a href="?status=3" class="btn btn-danger m-1">Replacement</a>
</div>
    
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <table class="table text-dark">
        <thead class="table-dark text-white">
            <tr>
                <th>#</th>
                {{-- <th>Date</th> --}}
                <th>Customer</th>
                <th>Sr-No</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $index => $sale)
             {{-- <!-- {{ dd($sale);}}  --> --}}
            <tr>
                <td>{{ $index + 1 }}</td>
                
                <td>{{ $sale->customer_name ?? 'N/A' }}</td>
                <td>{{ $sale->items->sr_no ?? 'N/A' }}</td>
                <td>{{ $sale->total_sale_amount ?? 0 }}</td>
                <td>
                    <button class="btn btn-primary"> <a href="{{ route('customer.sell.details', ['customer_id' =>  $sale->id ]) }}">
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