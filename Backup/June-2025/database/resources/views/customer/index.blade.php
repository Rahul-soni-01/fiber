@extends('demo')
@section('title', 'Customer')

@section('content')
<h1>Customer</h1>


@if ($errors->any())
<div style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<a href="{{ route('customer.create') }}" class="btn btn-primary mb-3">Add customer</a>
<div class="table-responsive">
<table class="table text-white">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Customer Name</th>
            <th>Address</th>
            <th>Telephone no </th>
            <th>Contact Person Name </th>
            <th>Action </th>
        </tr>
    </thead>

    <tbody>

        @foreach ($customers as $customer)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $customer->customer_name }}</td>
            <td>{{ $customer->address }}</td>
            <td>{{ $customer->telephone_no }}</td>
            <td>{{ $customer->receiver_name }}</td>
            <td class="d-flex">
                {{-- <button class=""> --}}
                    <a href="{{ route('customer.edit', ['customer_id' => $customer->id]) }}" class="btn btn-sm btn-primary"><i
                        class="ri-eye-fill"></i></a>
                {{-- </button> --}}
             
                <form action="{{ route('customer.destroy', $customer->id) }}" method="POST" style="display:inline;" class="text-white">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this customer?');"
                        class="btn btn-sm text-white bg-danger">
                        <i class="ri-delete-bin-fill"></i>
                    </button>
                </form>
                <button class="btn"> <a href="{{ route('customer.sell.details', ['customer_id' =>  $customer->id ]) }}">
                        <i class="ri-history-fill"></i> </a></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection