@extends('demo')
@section('title', 'Sale Return')

@section('content')
<h1>Sale Return</h1>
        <div class="main" id="main">
            <a href="{{ route('sale.return') }}" class="btn btn-primary mt-2 mb-2">Add Sale Return</a>
            <table class="table text-white">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Sale Invoice No</th>
                        <th>Qty</th>
                        <th>Reason</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salereturns as $index => $return)
                    {{-- {{dd($salereturns);}} --}}
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $return->max_date }}</td>
                        <td>{{ $return->customer->customer_name ?? 'N/A' }}</td> <!-- Adjust based on customer model field -->
                        <td>{{ $return->sale_id }}</td>
                        <td>{{ $return->total_qty }}</td>
                        <td>{{ $return->reasons }}</td>
                        <td>
                            <a href="{{ route('sale.return.show', $return->sale_id) }}" class="btn btn-info">View</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
   @endsection