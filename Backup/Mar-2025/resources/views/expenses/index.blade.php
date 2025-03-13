@extends('demo')

@section('title', 'Expense')



@section('content')

<div class="main" id="main">

    @if (session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

    @endif



    <a href="{{ route('expenses.create') }}" class="btn btn-primary mb-3">Add Expenses</a>

    <table class="table text-white">

        <thead class="table-dark">

            <tr>

                <th>#</th>

                <th>Expense Name</th>

                <th>Amount</th>

                <th>Payment Type</th>

                <th>Action</th>

            </tr>

        </thead>

        <tbody>

            @forelse ($expenses as $expense)

            <tr>

                <td>{{ $expense->id }}</td>

                <td>{{ $expense->name ?? 'N/A' }}</td>

                <td>{{ $expense->amount }}</td>

                <td>{{ $expense->payment_type ?? 'N/A' }}</td>

                <td>

                    <!-- Edit Button -->

                    <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-sm btn-warning">

                        <i class="ri-pencil-fill"></i> 

                    </a>

                    <!-- Delete Form -->

                    <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline;">

                        @csrf

                        @method('DELETE')

                        <button type="submit" onclick="return confirm('Are you sure you want to delete this expense?');"

                            class="btn btn-sm btn-danger">

                            <i class="ri-delete-bin-fill"></i> 

                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td class="text-center"></td>

                <td class="text-center"></td>

                <td class="text-center">No found.</td>

                <td class="text-center"></td>

                <td class="text-center"></td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection