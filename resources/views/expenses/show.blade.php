<x-layout>
    <x-slot name="title">Bank Details</x-slot>
    <x-slot name="main">
        <div class="main" id="main">

        
            {{-- <a href="?payment" class="btn btn-info mb-2">Customer Payment</a> --}}
            <div class="d-flex justify-content-center align-items-center">
                <h5> Payment </h5>
            </div>

            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Payment ID</th>
                        <th>Supplier Name</th>
                        <th>Amount Paid</th>
                        {{-- <th>Remaining Amount</th> --}}
                        <th>Payment Date</th>
                        {{-- <th>Payment Method</th> --}}
                        <th>Transaction Type</th>
                        <th>Reciver Bank Name</th>
                        <th>Reciver Account Holder Name</th>
                        {{-- <th>Branch Name</th>
                        <th>Account Number</th>
                        <th>Account Type</th>
                        <th>IFSC Code</th> --}}
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($supplier_payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td> {{ $payment->supplier->party_name ?? 'N/A' }}</td>
                        <td>{{ $payment->amount_paid }}</td>
                        {{-- <td>{{ $payment->remaining_amount }}</td> --}}
                        <td>{{ $payment->payment_date }}</td>
                        {{-- <td>{{ $payment->payment_method }}</td> --}}
                        <td>{{ $payment->transaction_type }}</td>
                        <td>{{ $payment->bank_name }}</td>
                        <td>{{ $payment->account_holder_name }}</td>
                        {{-- <td>{{ $payment->branch_name }}</td>
                        <td>{{ $payment->account_number }}</td>
                        <td>{{ $payment->account_type }}</td>
                        <td>{{ $payment->ifsc_code }}</td> --}}
                        <td>{{ $payment->notes }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </x-slot>
</x-layout>