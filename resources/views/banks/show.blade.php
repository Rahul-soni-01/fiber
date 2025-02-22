@extends('demo')
@section('title', 'Bank')

@section('content')
<h1>Bank</h1>
        <div class="main" id="main">
            
            <ul class="nav nav-tabs " id="customerTab" role="tablist">
                <li class="nav-item ml-1" role="presentation">
                    <a href="{{ route('banks.index') }}" class="btn btn-info"> show All Banks </a>
                    <a href="{{ route('generate-pdf', ['bank' => $id]) }}" class="btn btn-primary" id="download-btn1212">Download PDF</a>

                    {{-- <form action="/download-pdf12" method="POST"> --}}
                        {{-- @csrf <!-- CSRF token for security --> --}}
                        {{-- <button type="button" class="btn btn-primary" id="download-btn">Download current as PDF</button> --}}
                    {{-- </form> --}}

                </li>
                <li class="nav-item ml-1" role="presentation">
                    <a class="nav-link text-info" id="payment-tab" data-bs-toggle="tab" href="#payment" role="tab" aria-controls="customer-payment" aria-selected="true">Payment History </a>
                </li>
                <li class="nav-item ml-1" role="presentation">
                  <a class="nav-link text-info" id="customer-payment-tab" data-bs-toggle="tab" href="#customer-payment" role="tab" aria-controls="customer-payment" aria-selected="true">Customer Payment</a>
                </li>
                <li class="nav-item ml-1" role="presentation">
                  <a class="nav-link text-info" id="supplier-payment-tab" data-bs-toggle="tab" href="#supplier-payment" role="tab" aria-controls="supplier-payment" aria-selected="false">Supplier Payment</a>
                </li>
            </ul>
            <div class="tab-content mt-2" id="customerTabContent">
                <div class="tab-pane fade show active" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                    <table class="table text-white datatable-remove">
                        <thead class="table-dark">
                            <tr>
                                <th width="30%" bgcolor="#E7E0EE" align="center">Particulars
                                </th>
                                <th width="10%" bgcolor="#E7E0EE" align="center"> Date</th>
                                <th width="20%" bgcolor="#E7E0EE" align="center" class="text-center">Debit</th>
                                <th width="20%" bgcolor="#E7E0EE" align="center" class="text-center">Credit</th>
                                <th width="20%" bgcolor="#E7E0EE" align="center" class="text-center">Balance</th>
                            </tr>
                        </thead>
                        @php
                            $balance = 0;
                        @endphp
                        <tbody>
                            <tr>
                                <td>
                                    Opening Balance
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td align="center"> {{ number_format($balance = $bank->opening_balance ?? 0,2) }} </td>
                            </tr>
                            @foreach($all_payments as $all_payment)
                            <tr>
                                <td>
                                    @if(isset($all_payment->supplier_id)) 
                                        {{ $all_payment->supplier->party_name ?? 'N/A' }} 
                                    @elseif(isset($all_payment->customer_id))
                                        {{ $all_payment->customer->customer_name ?? 'N/A' }}
                                    @elseif(isset($all_payment->type)=='expense')
                                        {{$all_payment->name}}
                                    @endif
                                    
                                </td>
                                <td align="center">    
                                    {{ ($all_payment->payment_date ?? $all_payment->date)}}
                                </td>
                                <td align="center">
                                    @if(isset($all_payment->supplier_id)) 
                                        {{ number_format($all_payment->amount_paid, 2) }} 
                                        @php $balance -= $all_payment->amount_paid; @endphp

                                    @elseif(isset($all_payment->type)=='expense')
                                        {{ number_format($all_payment->amount, 2) }} 
                                        @php $balance -= $all_payment->amount; @endphp
                                    @endif
                                </td>
                                <td align="center">
                                    @if(isset($all_payment->customer_id))
                                        {{ number_format($all_payment->amount_paid, 2) }} 
                                        @php $balance += $all_payment->amount_paid; @endphp
                                    @endif
                                </td>
                                <td align="center">
                                    {{ number_format($balance, 2) }} {{-- Updated balance --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" align="right"><strong>Final Balance:</strong></td>
                                <td class="text-center fw-bold {{ $balance >= 0 ? 'text-success' : 'text-danger' }}">
                                    {{ number_format($balance, 2) }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="tab-pane fade" id="customer-payment" role="tabpanel" aria-labelledby="customer-payment-tab">
                    <div class="d-flex justify-content-center align-items-center">
                        <h5>Customer Payment </h5>
                    </div>
                    <table class="table text-white">
                        <thead class="table-dark">
                            <tr>
                                <th>Payment ID</th>
                                <th> Customer Name</th>
                                <th>Amount Paid</th>
                                <th>Payment Date</th>
                                <th>Transaction Type</th>
                                <th>Sender Bank Name</th>
                                <th>Sender Account Holder Name</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer_payments as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>{{ $payment->customer->customer_name ?? 'N/A' }}</td>
                                <td>{{ $payment->amount_paid }}</td>
                                <td>{{ $payment->payment_date }}</td>
                                <td>{{ $payment->transaction_type }}</td>
                                <td>{{ $payment->bank_name }}</td>
                                <td>{{ $payment->account_holder_name }}</td>
                                <td>{{ $payment->notes }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="supplier-payment" role="tabpanel" aria-labelledby="supplier-payment-tab">
                    {{-- <a href="?payment" class="btn btn-info mb-2">Customer Payment</a> --}}
                    <div class="d-flex justify-content-center align-items-center">
                        <h5>Supplier Payment </h5>
                    </div>

                    <table class="table text-white">
                        <thead class="table-dark">
                            <tr>
                                <th>Payment ID</th>
                                <th>Supplier Name</th>
                                <th>Amount Paid</th>
                                <th>Payment Date</th>
                                <th>Transaction Type</th>
                                <th>Reciver Bank Name</th>
                                <th>Reciver Account Holder Name</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supplier_payments as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>{{ $payment->supplier->party_name ?? 'N/A' }}</td>
                                <td>{{ $payment->amount_paid }}</td>
                                <td>{{ $payment->payment_date }}</td>
                                <td>{{ $payment->transaction_type }}</td>
                                <td>{{ $payment->bank_name }}</td>
                                <td>{{ $payment->account_holder_name }}</td>
                              
                                <td>{{ $payment->notes }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
   @endsection