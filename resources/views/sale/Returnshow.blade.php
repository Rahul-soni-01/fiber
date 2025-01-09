<x-layout>
    <x-slot name="title">Show Sale Return: {{$id }}</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <a href="{{ route('sale.return') }}" class="btn btn-primary mb-2">Add Sale Return</a>
            <a href="{{ route('generate-pdf', ['sale_return' => $id]) }}" class="btn btn-primary mb-2">Download PDF</a>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Sub category</th>
                        <th>Qty</th>
                        <th>Reason</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salereturns as $index => $return)
                    <tr>
                        {{-- {{ dd($return);}} --}}
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $return->date }}</td>
                        <td>{{ $return->customer->customer_name ?? 'N/A' }}</td> <!-- Adjust based on customer model field -->
                        <td>{{ $return->subCategory->name }}</td>
                        <td>{{ $return->qty }}</td>
                        <td>{{ $return->reason }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-layout>