@extends('demo')

@section('title', 'Opening Balance')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Opening Balances</h2>

    {{-- Flash message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('openingbalance.create') }}" class="btn btn-primary mb-3">+ Add Opening Balance</a>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Date</th>
                <th>Cash on Hand</th>
                <th>Petty Cash</th>
                <th>Bank</th>
                <th>Inventory Total</th>
                <th>Equity Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($balances as $balance)
                <tr>
                    <td>{{ $balance->balance_date->format('Y-m-d') }}</td>
                    <td>{{ number_format($balance->cash_on_hand, 2) }}</td>
                    <td>{{ number_format($balance->petty_cash, 2) }}</td>
                    <td>{{ number_format($balance->bank, 2) }}</td>
                    <td>
                        {{ number_format($balance->raw_materials + $balance->work_in_progress + $balance->finished_goods, 2) }}
                    </td>
                    <td>
                        {{ number_format($balance->share_capital + $balance->retained_earnings + $balance->current_profit, 2) }}
                    </td>
                    <td>
                        <a href="{{ route('openingbalance.edit', $balance->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('openingbalance.destroy', $balance->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to delete this entry?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No opening balances found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection