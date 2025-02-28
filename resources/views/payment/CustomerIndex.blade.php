<x-layout>
    <x-slot name="title">Show Customer payment</x-slot>
    <x-slot name="main">
        <div class="main" id="main" style="">
            <a href="{{ route('payment.create') }}" class="btn btn-primary">Add payment</a>

            <table class="table table-bordered datatable-remove">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Total INR Amount</th>
                        <th>Customer Payment </th>
                        {{-- <th>Total INR Payment</th>
                        <th>Payments</th> --}}
                        <th>Total INR Reaming</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($CustomerPayment as $index => $customer)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $customer['customer_name'] }}</td>
                            <td><b class="text-info">{{ $customer['total_inr_amount'] }}</b>
                                {{-- <button class="btn btn toggle-btn float-right" data-target="purchases-{{ $index }}">
                                    <i class="bi bi-chevron-right"></i> Show</button> --}}
                                <button class="btn float-right"> <a href="{{ route('customer.sell.details', ['customer_id' => $customer['customer_id'] ]) }}"> Show </a></button>  
                                
                                <table class="datatable-remove table table-sm table-striped mt-2 nested-table" id="purchases-{{ $index }}" style="display: none;">
                                    <thead>
                                        <tr>
                                            <th>Sele ID</th>
                                            <th>Date</th>
                                            <th>Invoice No</th>
                                            <th>INR Amount</th>
                                            <th>show</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($customer['sales'] as $sale)
                                            <tr>
                                                <td>{{ $sale->id }}</td>
                                                <td>{{ $sale->sale_date }}</td>
                                                <td>{{ $sale->sale_id }}</td>
                                                <td>{{ $sale->total_amount }}</td>
                                                <td><a href="{{ route('sale.show', ['sale_id' => $sale->id]) }}"><i
                                                    class="ri-eye-fill"></i></a> </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td ></td>
                                                <td >No purchases found.</td>
                                                <td ></td>
                                                <td ></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </td>
                            <td> <b class="text-success">{{ $customer['total_inr_payments'] }} </b>
                                
                                {{-- <button class="btn btn toggle-btn float-right" data-target="payments-{{ $index }}">
                                    <i class="bi bi-chevron-right"></i> Show 
                                </button>
                                <table class="datatable-remove table table-sm table-striped mt-2 nested-table" id="payments-{{ $index }}" style="display: none;">
                                    <thead>
                                        <tr>
                                            <th>Payment ID</th>
                                            <th>Amount Paid</th>
                                            <th>Payment Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @forelse ($customer['payments'] as $payment)
                                            <tr>
                                                <td>{{ $payment->id }}</td>
                                                <td>{{ $payment->amount_paid }}</td>
                                                <td>{{ $payment->payment_date }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>No payments found.</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table> --}}
                                <a class="btn float-right" href="{{ route('customer.sell.details', ['customer_id' =>  $customer['customer_id'] ]) }}?payment"> Customer Payment </a>  
                            </td>
                            
                            
                            <td><b class="text-danger">{{ $customer['total_remaining_payment'] }}</b></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- <div class="d-flex justify-content-center align-items-center"> <h5>Supplier Payment Details </h5></div>

            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Supplier</th>
                        <th>Amount Paid</th>
                        <th>Payment Method</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Supplierpaymentes as $payment)
                    
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->payment_date }}</td>
                            <td>{{ $payment->supplier->party_name }}</td>
                            <td>{{ number_format($payment->amount_paid, 2) }}</td>
                            <td>{{ $payment->payment_method }}</td>

                            <td>
                                <a href="{{ route('payment.edit', ['payment_id' => $payment->id]) }}"><i class="ri-eye-fill"></i></a> 

                                <form action="{{ route('payment.destroy', $payment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE') 
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this Payment?');" class="btn "> <i class="ri-delete-bin-fill"></i></button>
                            </form> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center align-items-center"> <h5>Customer Payment Details </h5></div>

            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Amount Paid</th>
                        <th>Payment Method</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($CustomerPayment as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->payment_date }}</td>
                            <td>{{ $payment->customer->customer_name }}</td>
                            <td>{{ number_format($payment->amount_paid, 2) }}</td>
                            <td>{{ $payment->payment_method }}</td>

                            <td>
                                <a href="{{ route('payment.edit', ['payment_id' => $payment->id]) }}"><i class="ri-eye-fill"></i></a> 

                                <form action="{{ route('payment.destroy', $payment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE') 
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this Payment?');" class="btn "> <i class="ri-delete-bin-fill"></i></button>
                            </form> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
        </div>

        <script>
            document.querySelectorAll('.toggle-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const targetId = this.dataset.target;
                    const targetTable = document.getElementById(targetId);
                    // const icon = this.querySelector('i');

                    if (targetTable.style.display === 'none' || targetTable.style.display === '') {
                        targetTable.style.display = 'table';
                        // icon.classList.remove('bi-chevron-right');
                        // icon.classList.add('bi-chevron-left');
                        this.innerHTML = 'Hide';
                    } else {
                        targetTable.style.display = 'none';
                        // icon.classList.remove('bi-chevron-left');
                        // icon.classList.add('bi-chevron-right');
                        this.innerHTML = 'Show';
                    }
                });
            });
        </script>
    </x-slot>
</x-layout>