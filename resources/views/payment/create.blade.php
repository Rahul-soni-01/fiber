<x-layout>
    <x-slot name="title">New Payment</x-slot>
    <x-slot name="main">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
        <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />
        
        <div class="main" id="main">
            <a href="{{ route('payment.index') }}" class="btn btn-primary">Back to Payment</a>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-6 text-center border p-4" id="col1" style="cursor: pointer;">
                        <h4>Customer Payment</h4>
                    </div>
                    <div class="col-6 text-center border p-4" id="col2" style="cursor: pointer;">
                        <h4>Supplier Payment</h4>
                    </div>
                </div>

                <!-- Form 1 -->
                <div id="form1" class="form-container mt-4 d-block">
                    <h4>Customer Payment</h4>
                    <form action="{{ route('payment.store') }}" method="POST">
                        @csrf
                        <div class="mb-3 offset-sm-3 col-md-6">
                            <label>Date</label>
                            <div>
                                <input type="date" id="date" name="date" class="form-control" placeholder="Enter Date" value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
                            </div>
                        </div>
                        <div class="mb-3 offset-sm-3  col-md-6">
                            <label for="customer_name">Customer Name</label>
                            <select id="customer_select" name="cid" class="form-control" required
                                onchange="filterSales();">
                                <option value="" disabled selected>Choose a Customer</option>
                                @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 offset-sm-3  col-md-6">
                            <label for="sall_no">Sell No</label>
                            <select id="sell_no_select" name="sale_id[]" class="chosen-select" required
                                onchange="GetInvoiceData('customer',this.id);" multiple>
                                <option value="" disabled selected>Choose a Sell No</option>
                                @foreach($selles as $sale)
                                <option value="{{ $sale->sale_id }}" data-customer="{{ $sale->customer_id }}">
                                    {{ $sale->sale_id }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 offset-sm-3  col-md-6">
                            <label>Paid Amount</label>
                            <div>
                                <input type="number" id="paid_total" step="0.01" value="0" name="paid_total"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 offset-sm-3 col-md-6">
                            <label for="payment_method">Payment Method</label>
                            <select id="payment_method" name="payment_method" class="form-control" onchange="toggleBankDetails('customer')"> 
                                <option value="Cash" selected>Cash</option>
                                <option value="Bank">Bank</option>
                            </select>
                        </div>
                        <div id="bank_details" class="mt-3 offset-sm-3 col-md-6" style="display: none;">
                            <label for="transaction_type">Transaction Yype</label>
                            <div class="form-check">
                                <input type="radio" id="rtgs" name="transaction_type" value="RTGS" class="form-check-input">
                                <label for="rtgs" class="form-check-label">RTGS</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="neft" name="transaction_type" value="NEFT" class="form-check-input">
                                <label for="neft" class="form-check-label">NEFT</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="cheque" name="transaction_type" value="CHEQUE" class="form-check-input">
                                <label for="cheque" class="form-check-label">Cheque</label>
                            </div>

                            <div class="form-group mt-2">
                                <label for="bank_name">Reciver Bank Name:</label>
                                {{-- <input type="text" id="bank_name" name="b" class="form-control" placeholder="Enter Bank Name"> --}}
                                <select id="bank_id" name="bank_id" class="form-control" placeholder="Select Bank Your send Name"> 
                                    <option value="" disabled selected>Select Your Reciver Bank Name</option>
                                    @foreach($banks as $key => $bank)
                                        <option value="{{$bank->id}}"> {{$bank->bank_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-2">
                                <label for="bank_name">Customer Bank Name:</label>
                                <input type="text" id="bank_name" name="bank_name" class="form-control" placeholder="Enter Bank Name">
                            </div>
                            <div class="form-group">
                                <label for="holder_name">Customer Account Holder Name:</label>
                                <input type="text" id="holder_name" name="holder_name" class="form-control" placeholder="Enter Account Holder Name">
                            </div>
                            <div class="form-group">
                                <label for="branch_name">Customer Branch Name:</label>
                                <input type="text" id="branch_name" name="branch_name" class="form-control" placeholder="Enter Branch Name">
                            </div>
                            <div class="form-group">
                                <label for="account_number">Customer Account Number:</label>
                                <input type="text" id="account_number" name="account_number" class="form-control" placeholder="Enter Account Number">
                            </div>
                            <div class="form-group">
                                <label for="account_type">Type of Account:</label>
                                <select id="account_type" name="account_type" class="form-control">
                                    <option value="" disabled selected>Select Type of Account</option>
                                    <option value="HSS">HSS</option>
                                    <option value="CD">CD</option>
                                    <option value="CC">CC</option>
                                    <option value="OD">OD</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ifsc_code">IFSC Code:</label>
                                <input type="text" id="ifsc_code" name="ifsc_code" class="form-control" placeholder="Enter IFSC Code">
                            </div>

                            <div class="form-group mt-2">
                                <label for="cheque_no">Cheque No: *(Cheque available)</label>
                                <input type="text" id="cheque_no" name="cheque_no" class="form-control" placeholder="Enter Cheque No.">
                            </div>
                        </div>
                            <div class="mb-3 offset-sm-3 col-md-6">
                                <label for="note">Note:</label>
                                <textarea id="note" name="note" class="form-control"></textarea>
                            </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>

                <!-- Form 2 -->
                <div id="form2" class="form-container mt-4 d-none">
                    <h4>Supplier Payment</h4>
                    <form action="{{ route('payment.store') }}" method="POST">
                        @csrf

                        <div class="mb-3 offset-sm-3 col-md-6">
                            <label>Date</label>
                            <div>
                                <input type="date" id="date" name="date" class="form-control" placeholder="Enter Date" value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
                            </div>
                        </div>

                        <div class="mb-3 offset-md-3 col-md-6">
                            <label for="party_name">Supplier Name</label>
                            <select id="supplier_select" name="sid" class="form-control"
                                placeholder="Enter Party Name" required onchange="filterInvoices();">
                                <option value="" disabled selected>Choose a Supplier</option>
                                @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->party_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 offset-md-3 col-md-6">
                            <label for="party_name">Invoice </label>
                            <select id="invoice_select" name="invoice_no[]" class="chosen-select"
                                placeholder="Enter Invoice" required onchange="GetInvoiceData('supplier',this.id);"
                                multiple>
                                <option value="" disabled selected>Choose a Invoice</option>
                                @foreach($tbl_purchases as $tbl_purchase)
                                <option value="{{ $tbl_purchase->invoice_no }}" data-supplier="{{$tbl_purchase->pid}}">
                                    {{ $tbl_purchase->invoice_no }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 offset-md-3 col-md-6">
                            <label>Paid Amount</label>
                            <div>
                                <input type="number" id="paid_total" step="0.01" value="0" name="paid_total"
                                    class="form-control" >
                            </div>
                        </div>
                        <div class="mb-3 offset-sm-3 col-md-6">
                            <label for="payment_method">Payment Method</label>
                            <select id="supplier_payment_method" name="payment_method" class="form-control" onchange="toggleBankDetails('supplier')"> 
                                <option value="Cash" selected>Cash</option>
                                <option value="Bank">Bank</option>
                            </select>
                        </div>
                        <div id="supplier_bank_details" class="mt-3 offset-sm-3 col-md-6" style="display: none;">
                            
                            
                            <label for="transaction_type">Sender Transaction Type</label>
                            <div class="form-check">
                                <input type="radio" id="rtgs" name="transaction_type" value="RTGS" class="form-check-input">
                                <label for="rtgs" class="form-check-label">RTGS</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="neft" name="transaction_type" value="NEFT" class="form-check-input">
                                <label for="neft" class="form-check-label">NEFT</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="cheque" name="transaction_type" value="CHEQUE" class="form-check-input">
                                <label for="cheque" class="form-check-label">Cheque</label>
                            </div>
                        
                            <div class="form-group mt-2">
                                <label for="bank_name">Sender Bank Name:</label>
                                {{-- <input type="text" id="bank_name" name="b" class="form-control" placeholder="Enter Bank Name"> --}}
                                <select id="bank_id" name="bank_id" class="form-control" placeholder="Select Bank Your send Name"> 
                                    <option value="" disabled selected>Select Your Bank Name </option>
                                    @foreach($banks as $key => $bank)
                                        <option value="{{$bank->id}}"> {{$bank->bank_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-2">
                                <label for="bank_name">Reciver Bank Name:</label>
                                <input type="text" id="bank_name" name="bank_name" class="form-control" placeholder="Enter Bank Name">
                            </div>
                            <div class="form-group">
                                <label for="holder_name">Reciver Account Holder Name:</label>
                                <input type="text" id="holder_name" name="holder_name" class="form-control" placeholder="Enter Account Holder Name">
                            </div>
                            <div class="form-group">
                                <label for="branch_name">Reciver Branch Name:</label>
                                <input type="text" id="branch_name" name="branch_name" class="form-control" placeholder="Enter Branch Name">
                            </div>
                            <div class="form-group">
                                <label for="account_number">Reciver Account Number:</label>
                                <input type="text" id="account_number" name="account_number" class="form-control" placeholder="Enter Account Number">
                            </div>
                            <div class="form-group">
                                <label for="account_type">Reciver Type of Account:</label>
                                <select id="account_type" name="account_type" class="form-control">
                                    <option value="" disabled selected>Select Type of Account</option>
                                    <option value="HSS">HSS</option>
                                    <option value="CD">CD</option>
                                    <option value="CC">CC</option>
                                    <option value="OD">OD</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ifsc_code">IFSC Code:</label>
                                <input type="text" id="ifsc_code" name="ifsc_code" class="form-control" placeholder="Enter IFSC Code">
                            </div>
                            <div class="form-group mt-2">
                                <label for="cheque_no">Cheque No: *if(Cheque available) </label>
                                <input type="text" id="cheque_no" name="cheque_no" class="form-control" placeholder="Enter Cheque No.">
                            </div>
                        </div>
                            <div class="mb-3 offset-sm-3 col-md-6">
                                <label for="note">Note:</label>
                                <textarea id="note" name="note" class="form-control"></textarea>
                            </div>
                        
                        <button type="submit" class="btn btn-success float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <script>
        $(document).ready(function () {
            $(".chosen-select").chosen({
                no_results_text: "Oops, nothing found!"
            });
        });
        
        document.getElementById('col1').addEventListener('click', function () {
            document.getElementById('form1').classList.remove('d-none');
            document.getElementById('form1').classList.add('d-block');
            document.getElementById('form2').classList.remove('d-block');
            document.getElementById('form2').classList.add('d-none');
        });

        document.getElementById('col2').addEventListener('click', function () {
            document.getElementById('form2').classList.remove('d-none');
            document.getElementById('form2').classList.add('d-block');
            document.getElementById('form1').classList.remove('d-block');
            document.getElementById('form1').classList.add('d-none');
        });

        function filterInvoices() {
            const selectedSupplierId = document.getElementById('supplier_select').value;

            const invoiceSelect = document.getElementById('invoice_select');
            // const invoiceOptions = invoiceSelect.querySelectorAll('option');

            $(invoiceSelect).find('option').each(function () {
                const supplierId = $(this).data('supplier');
                if (supplierId == selectedSupplierId || !supplierId) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            $(invoiceSelect).val([]); // Reset selection
            $(invoiceSelect).trigger("chosen:updated");
        }

        function filterSales() {
            const selectedCustomerId = document.getElementById('customer_select').value;
            const sellSelect = document.getElementById('sell_no_select');

            // Show/hide options based on the selected customer
            $(sellSelect).find('option').each(function () {
                const customerId = $(this).data('customer');
                if (customerId == selectedCustomerId || !customerId) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            // Reset Chosen dropdown to reflect updated options
            $(sellSelect).val([]); // Reset selection
            $(sellSelect).trigger("chosen:updated");
        }

        function GetInvoiceData(user,selectId){
            const selectedId = document.getElementById(selectId).value;

            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            if(user === 'supplier'){
                var url = "/get-invoice-details";
                const party = document.getElementById('supplier_select').value;
                var data = {
                    _token: csrfToken,
                    invoice_no: selectedId,
                    party: party,
                    status: 1,
                };
            }
            else{
               var url = "/get-invoice-sell-details"; 
               const customer = document.getElementById('customer_select').value;
               var data = {
                    _token: csrfToken,
                    invoice_no: selectedId,
                    customer: customer,
                    status: 1,
                };
            }
            
            $.ajax({
                url: url,
                type: "POST",
                data: data,
                success: function (response) {
                    if(user === 'supplier'){
                        $('#supplier_paid_total').val(response.data[0].amount); 
                    }else if(user === 'customer'){
                        $('#customer_amount').val(response.data[0].total_amount); 
                    }
                }
            });
        }

        function toggleBankDetails(user) {
            if( user ==='customer'){
                const paymentMethod = document.getElementById('payment_method').value;
                const bankDetails = document.getElementById('bank_details');

                if (paymentMethod === 'Bank') {
                    bankDetails.style.display = 'block';
                } else {
                    bankDetails.style.display = 'none';
                }
            } else if(user ==='supplier'){
                const paymentMethod = document.getElementById('supplier_payment_method').value;
                const bankDetails = document.getElementById('supplier_bank_details');

                if (paymentMethod === 'Bank') {
                    bankDetails.style.display = 'block';
                } else {
                    bankDetails.style.display = 'none';
                }
            }
        }
        </script>
    </x-slot>
</x-layout>