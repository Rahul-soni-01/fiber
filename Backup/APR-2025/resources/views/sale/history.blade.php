<x-layout>
    <x-slot name="title">Search Serial No</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <form method="GET" action="{{route('serial.history')}}" class="row">
                <input type="number" name="sr_no" placeholder="Enter SR No." class="input-number form-control col-md-6"
                    value="{{ request('sr_no') }}" required />
                <button type="submit" class="col-md-1 btn btn-grey">Search</button>
            </form>
            <div class="row mt-4">
                <div class="col">
                    @if(isset($reports) && $reports->isNotEmpty())
                    @php
                    // Calculate the total amount
                    $amount = $reports->sum('final_amount');
                    @endphp
                    <h5>Total Amount: {{ $amount }}</h5>
                    @endif
                </div>
            </div>
            @if(isset($reports) && $reports->isNotEmpty())
                <div class="d-flex justify-content-center align-items-center">
                    <h5>Report Details </h5>
                </div>
                <table class="table  table-striped">
                    <thead>
                        <tr class="bg-warning">
                            <th>ID</th>
                            <th>Date</th>
                            <th>New/Repair</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                        <tr>
                            <td>{{$report->id}} </td>
                            <td>{{$report->created_at->format('d-m-Y');}} </td>
                            <td>{{ $report->part === 0 ? 'New' : ($report->part == 1 ? 'Repair' : 'Unknown') }}</td>
                            <td>{{$report->final_amount ?? 0}} </td>
                            <td>
                                <a href="{{ route('report.show', $report->id) }}" class="btn btn-info">Show <i
                                        class="ri-eye-fill"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            @if(isset($sales) && $sales->isNotEmpty())
                <div class="d-flex justify-content-center align-items-center">
                    <h5>Sale Details </h5>
                </div>
                <table class="table  table-striped">
                    <thead>
                        <tr class="bg-warning">
                            <th>ID</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sales as $sale)
                        <tr>
                            <td>{{$sale->id}} </td>
                            <td>{{$sale->created_at->format('d-m-Y');}} </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('sale.show', ['sale_id' => $sale->id]) }}">Show <i
                                        class="ri-eye-fill"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            @if(isset($sales) && $sales->isNotEmpty())
                <div class="d-flex justify-content-center align-items-center">
                    <h5>Sale Return Details </h5>
                </div>
                <table class="table  table-striped">
                    <thead>
                        <tr class="bg-warning">
                            <th>ID</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Salereturns as $Salereturn)
                        <tr>
                            <td>{{$Salereturn->id}} </td>
                            <td>{{$Salereturn->created_at->format('d-m-Y');}} </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('sale.show', ['sale_id' => $Salereturn->id]) }}">Show<i
                                        class="ri-eye-fill"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </x-slot>
</x-layout>