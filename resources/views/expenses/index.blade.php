<x-layout>
    <x-slot name="title">Show Bank</x-slot>
    <x-slot name="main">
        <div class="main" id="main" style="">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <a href="{{ route('expenses.create') }}" class="btn btn-primary mb-3">Add Expenses</a>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Expense Name</th>
                        <th>Amount</th>
                        <th>Payment Type</th>
                        <th>Bank ID</th>
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
                        <td>{{ $expense->bank_id ?? 'N/A' }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-sm btn-warning">
                                    <i class="ri-pencil-fill"></i> Edit
                                </a>
                                <!-- Delete Form -->
                                <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this expense?');" class="btn btn-sm btn-danger">
                                        <i class="ri-delete-bin-fill"></i> Delete
                                    </button>
                                </form>
                                <!-- Show Button -->
                                {{-- <a href="{{ route('expenses.show', $expense->id) }}" class="btn btn-sm btn-info">
                                    <i class="ri-eye-fill"></i> Show
                                </a> --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">No  found.</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-slot>
</x-layout>