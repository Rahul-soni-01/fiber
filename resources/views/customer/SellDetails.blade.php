<x-layout>
    <x-slot name="title">Supplier Purchase Details</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            {{-- <form action="search" method="get" class="mb-5">
                <div class="row">
                    <div class="col">
                        <input type="date" id="s_date" name="s_date" class="form-control"
                            value="{{ request('s_date') }}">
                    </div>
                    <div class="col">
                        <input type="date" id="e_date" name="e_date" class="form-control"
                            value="{{ request('e_date') }}">
                    </div>
                    <div class="col">
                        <input type="text" id="invoice_number" name="invoice_number" placeholder="Invoice Number"
                            class="form-control" value="{{ request('invoice_number') }}">
                    </div>
                   
                    <div class="col">
                        <input type="text" id="amount" name="amount" placeholder="Amount" class="form-control">
                    </div>
                    <div class="col"><input type="text" id="amount_inr" name="amount_inr" placeholder="Amount (₹)"
                            class="form-control"></div>
                    <div class="col">
                        <form method="post"><button type="submit" class="btn btn-dark" id="search"
                                name="search">Search</button></form>
                    </div>
                </div>
            </form> --}}

            <div class="d-flex justify-content-center align-items-center"> <h5>Sell Details </h5></div>

            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        {{-- <th>Customer</th> --}}
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                    <tr>
                        <td>{{$sale->sale_id}}</td>
                        <td>{{$sale->sale_date}}</td>
                        {{-- <td>{{ $sale->customer->customer_name ?? 'N/A' }}</td> --}}
                        <td>{{$sale->total_amount}}</td>
                        <td>
                            <a  class="btn" href="{{ route('sale.show', ['sale_id' => $sale->id]) }}"><i class="ri-eye-fill"></i></a>
                            <a  class="btn" href="{{ route('sale.edit', ['sale_id' => $sale->id]) }}"><i class="ri-pencil-line"></i></a>
                            {{-- <form action="{{ route('sale.destroy', $sale->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this sale?');"
                                    class="btn"><i class="ri-delete-bin-fill"></i></button>
                            </form> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center align-items-center mt-5">
                <h5>
                    <a href="#purchase-return-table" class="text-decoration-none" data-bs-toggle="collapse" aria-expanded="false" aria-controls="purchase-return-table">
                        Sell Return Details 
                    </a>
                </h5> 
                <div class="ml-2">click on it..</div>
            </div>
            <div class="collapse mt-3" id="purchase-return-table">
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
        </div>
    </x-slot>
</x-layout>