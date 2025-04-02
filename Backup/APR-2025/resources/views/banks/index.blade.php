@extends('demo')

@section('title', 'Bank')



@section('content')

<h1>Bank</h1>


@if (session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif



<a href="{{ route('banks.create') }}" class="btn btn-primary mb-3">Add Bank</a>
<div class="table-responsive">
    <table class="table text-white">

        <thead class="table-dark">

            <tr>

                <th>#</th>

                <th>Bank Name</th>

                <th>Branch</th>

                <th>Account Type</th>

                <th>Opening Blanace</th>

                <th>Account Number</th>

                <th>Account Holder</th>

                <th>Action</th>

            </tr>

        </thead>

        <tbody>

            @forelse ($banks as $bank)

            <tr>

                <td>{{ $bank->id }}</td>

                <td>{{ $bank->bank_name }}</td>

                <td>{{ $bank->branch ?? 'N/A' }}</td>

                <td>{{ $bank->account_type }}</td>

                <td>{{ $bank->opening_balance }}</td>

                <td>{{ $bank->account_number }}</td>

                <td>{{ $bank->account_holder_name }}</td>

                <td>

                    <!-- Edit Button -->

                    <a href="{{ route('banks.edit', $bank->id) }}" class="btn btn-sm btn-warning">

                        <i class="ri-pencil-fill"></i>

                    </a>

                    <!-- Delete Form -->

                    <form action="{{ route('banks.destroy', $bank->id) }}" method="POST" style="display:inline;">

                        @csrf

                        @method('DELETE')

                        <button type="submit" onclick="return confirm('Are you sure you want to delete this bank?');"
                            class="btn btn-sm btn-danger">

                            <i class="ri-delete-bin-fill"></i>

                        </button>

                    </form>

                    <!-- Show Button -->

                    <a href="{{ route('banks.show', $bank->id) }}" class="btn btn-sm btn-info">

                        <i class="ri-eye-fill"></i>

                    </a>

                </td>

            </tr>

            @empty

            <tr>

                <td class="text-center"></td>

                <td class="text-center"></td>

                <td class="text-center"></td>

                <td class="text-center">No banks found.</td>

                <td class="text-center"></td>

                <td class="text-center"></td>

                <td class="text-center"></td>

                <td class="text-center"></td>

            </tr>

            @endforelse

        </tbody>

    </table>
</div>


@endsection