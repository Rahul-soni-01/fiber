<x-layout>
    <x-slot name="title">Show All sale Return</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <a href="{{ route('sale.return') }}" class="btn btn-primary mt-2 mb-2">Add Sale Return</a>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Serial No</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salereturns as $salereturn)
                    
                    <tr>
                        <td>{{$salereturn->id}}</td>
                        <td>{{$salereturn->date}}</td>
                        <td>{{$salereturn->customer->customer_name ?? 'N/A' }}</td>
                        <td>{{$salereturn->sr_no}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-layout>