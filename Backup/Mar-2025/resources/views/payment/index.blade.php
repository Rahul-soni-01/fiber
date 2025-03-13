@extends('demo')

@section('title', 'Supplier')



@section('content')

        <div class="main" >

            <a href="{{ route('payment.create') }}" class="btn btn-primary mb-2">Add payment</a>



            <table class="table text-white datatable-remove">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>

                        <th>Supplier Name</th>

                        <th>Total INR Amount</th>

                        <th>Seller Payment</th>

                        {{-- <th>Total INR Payment</th>

                        <th>Payments</th> --}}

                        <th>Total INR Reaming</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($supplierData as $index => $supplier)

                    {{-- {{ dd($supplier)}} --}}

                        <tr>

                            <td>{{ $index+1 }}</td>

                            <td>{{ $supplier['party_name'] }}</td>

                            <td><b class="text-info">{{ $supplier['total_inr_amount'] }}</b>



                                {{-- <button class="btn btn toggle-btn float-right" data-target="purchases-{{ $index }}">

                                    <i class="bi bi-chevron-right"></i> Show

                                </button>

                                <table class="datatable-remove table table-sm table-striped mt-2 nested-table" id="purchases-{{ $index }}" style="display: none;">

                                    <thead>

                                        <tr>

                                            <th>Purchase ID</th>

                                            <th>Date</th>

                                            <th>Invoice No</th>

                                            <th>INR Amount</th>

                                            <th>show</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        @forelse ($supplier['purchases'] as $purchase)

                                            <tr>

                                                <td>{{ $purchase->id }}</td>

                                                <td>{{ $purchase->date }}</td>

                                                <td>{{ $purchase->invoice_no }}</td>

                                                <td>{{ $purchase->inr_amount }}</td>

                                                <td><a href="{{ route('show_item.details', ['invoice_no' => $purchase['invoice_no']]) }}"><i

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

                                </table> --}}



                                <button class="btn float-right"> <a href="{{ route('party.purchase.details', ['party_id' => $supplier['party_id'] ]) }}"> Show </a></button>

                            </td>

                            <td> <b class="text-success">{{ $supplier['total_inr_payments'] }} </b>

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

                                        @forelse ($supplier['payments'] as $payment)

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



                                <a class="btn float-right" href="{{ route('party.purchase.details', ['party_id' =>  $supplier['party_id'] ]) }}?payment"> Supplier Payment </a> 

                            </td>

                            

                            

                            <td><b class="text-danger">{{ $supplier['total_remaining_payment'] }}</b></td>

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

@endsection