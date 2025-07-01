@extends('demo')

@section('title', 'FInal Balance')
@section('content')

<div class="container">
     <h2 class="mb-4">Final Account Balances</h2>

     <!-- Balance Sheet Card -->
     <div class="card shadow">
          <div class="card-header bg-primary text-white">
               <h4 class="mb-0">Balance Sheet (As of {{ now()->format('d-M-Y') }})</h4>
          </div>
          <div class="card-body">
               <div class="row">
                    <!-- Assets Column -->
                    <div class="col-md-6">
                         <h5 class="text-success">Assets</h5>
                         <table class="table datatable-remove table-sm table-warning text-dark">
                              <!-- Added table-warning class -->
                              <thead>
                                   <tr>
                                        <th>Account</th>
                                        <th class="text-end">Amount</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <tr>
                                        <td><strong>Cash in Hand</strong></td>
                                        <td class="text-end">{{ number_format($cash_in_hand, 2) }}</td>
                                   </tr>
                                   <tr>
                                        <td><strong>Bank Balance</strong></td>
                                        <td class="text-end">{{ number_format($bank_balance, 2) }}</td>
                                   </tr>
                                   <tr>
                                        <td><strong>Accounts Receivable</strong></td>
                                        <td class="text-end">{{ number_format($accounts_receivable, 2) }}</td>
                                   </tr>
                                   <tr class="table-active">
                                        <td><strong>Total Assets</strong></td>
                                        <td class="text-end"><strong>{{ number_format($cash_in_hand + $bank_balance +
                                                  $accounts_receivable, 2) }}</strong></td>
                                   </tr>
                              </tbody>
                         </table>
                    </div>

                    <!-- Liabilities & Equity Column -->
                    <div class="col-md-6">
                         <h5 class="text-danger">Liabilities & Equity</h5>
                         <table class="table datatable-remove table-sm table-warning text-dark">
                              <!-- Added table-warning class -->
                              <thead>
                                   <tr>
                                        <th>Account</th>
                                        <th class="text-end">Amount</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <tr>
                                        <td><strong>Accounts Payable</strong></td>
                                        <td class="text-end">{{ number_format($accounts_payable, 2) }}</td>
                                   </tr>
                                   <tr class="table-active">
                                        <td><strong>Total Liabilities</strong></td>
                                        <td class="text-end"><strong>{{ number_format($accounts_payable, 2) }}</strong>
                                        </td>
                                   </tr>
                              </tbody>
                         </table>
                    </div>
               </div>
          </div>
     </div>

     <table class="table table-sm datatable-remove">
          <tr>
               <td><strong>Total Sales</strong></td>
               <td class="text-end">{{ number_format($total_sales, 2) }}</td>
          </tr>
          <tr>
               <td><strong>Total Purchases</strong></td>
               <td class="text-end">{{ number_format($total_purchases, 2) }}</td>
          </tr>
          <tr>
               <td><strong>Gross Profit</strong></td>
               <td class="text-end">{{ number_format($total_sales - $total_purchases, 2) }}</td>
          </tr>
          <tr>
               <td><strong>Total Expenses</strong></td>
               <td class="text-end">{{ number_format($total_expenses, 2) }}</td>
          </tr>
          <tr class="table-success">
               <td><strong>Net Profit</strong></td>
               <td class="text-end"><strong>{{ number_format($net_profit, 2) }}</strong></td>
          </tr>
     </table>
</div>
<script>
     $(document).ready(function() {
        // Initialize DataTable with warning-styled tables
        $('.table').not('.datatable-remove').DataTable({
            pageLength: 25,
            responsive: true,
            paging: true,
            ordering: true,
            dom: '<"top"lf>rt<"bottom"ip>', // Layout control
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search...",
            }
        });

        // Optional: Add warning border to DataTables
        $('.table-warning').parent().css('border', '2px solid #ffc107');
    });
</script>
@endsection