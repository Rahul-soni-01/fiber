@extends('demo')

@section('title', 'Opening Balance')
@section('content')
<div class="container mt-4">
     <h2 class="mb-4">Add Opening Balance</h2>

     @if ($errors->any())
     <div class="alert alert-danger">
          <strong>There were some problems with your input:</strong>
          <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
          </ul>
     </div>
     @endif

     <form action="{{ route('openingbalance.store') }}" method="POST">
          @csrf

          @php
          $currentYear = now()->year;
          $startYear = $currentYear - 4; // Show last 4 years + current/upcoming
          @endphp

          <div class="form-group">
               <label for="balance_date">Select Financial Year</label>
               <select name="balance_date" class="form-control form-control-sm" required>
                    <option value="">-- Choose Financial Year Start Date --</option>
                    @for ($year = $startYear; $year <= $currentYear + 1; $year++) <option value="{{ $year }}-04-01" {{
                         old('balance_date')=="$year-04-01" ? 'selected' : '' }}>
                         1-Apr-{{ $year }} to 31-Mar-{{ $year + 1 }}
                         </option>
                         @endfor
               </select>
          </div>


          <hr>
          <h5>Cash</h5>
          <div class="row">
               <div class="form-group col-md-6">
                    <label>Cash on Hand</label>
                    <input type="number" name="cash_on_hand" placeholder="e.g. 10000.00" step="0.01"
                         class="form-control form-control-sm">
               </div>
               <div class="form-group col-md-6">
                    <label>Petty Cash</label>
                    <input type="number" name="petty_cash" placeholder="e.g. 500.00" step="0.01"
                         class="form-control form-control-sm">
               </div>
          </div>

          <hr>
          <h5>Bank & Investments</h5>
          <div class="row">
               <div class="form-group col-md-6">
                    <label>Bank</label>
                    <input type="number" name="bank" placeholder="e.g. 200000.00" step="0.01"
                         class="form-control form-control-sm">
               </div>
               <div class="form-group col-md-6">
                    <label>Investment Accounts</label>
                    <input type="number" name="investment_accounts" placeholder="e.g. 50000.00" step="0.01"
                         class="form-control form-control-sm">
               </div>
          </div>

          <hr>
          <h5>Receivables</h5>
          <div class="row">
               <div class="form-group col-md-4">
                    <label>Trade Receivables</label>
                    <input type="number" name="trade_receivables" placeholder="e.g. 15000.00" step="0.01"
                         class="form-control form-control-sm">
               </div>
               <div class="form-group col-md-4">
                    <label>Loans Receivable</label>
                    <input type="number" name="loans_receivable" placeholder="e.g. 7000.00" step="0.01"
                         class="form-control form-control-sm">
               </div>
               <div class="form-group col-md-4">
                    <label>Allowance Doubtful</label>
                    <input type="number" name="allowance_doubtful" placeholder="e.g. 500.00" step="0.01"
                         class="form-control form-control-sm">
               </div>
          </div>

          <hr>
          <h5>Inventory</h5>
          <div class="row">
               <div class="form-group col-md-4">
                    <label>Raw Materials</label>
                    <input type="number" name="raw_materials" placeholder="e.g. 25000.00" step="0.01"
                         class="form-control form-control-sm">
               </div>
               <div class="form-group col-md-4">
                    <label>Work In Progress</label>
                    <input type="number" name="work_in_progress" placeholder="e.g. 15000.00" step="0.01"
                         class="form-control form-control-sm">
               </div>
               <div class="form-group col-md-4">
                    <label>Finished Goods</label>
                    <input type="number" name="finished_goods" placeholder="e.g. 30000.00" step="0.01"
                         class="form-control form-control-sm">
               </div>
          </div>

          <hr>
          <h5>Liabilities</h5>
          <div class="row">
               <div class="form-group col-md-3">
                    <label>Trade Payables</label>
                    <input type="number" name="trade_payables" placeholder="e.g. 10000.00" step="0.01"
                         class="form-control form-control-sm">
               </div>
               <div class="form-group col-md-3">
                    <label>Short Term Loans</label>
                    <input type="number" name="short_term_loans" placeholder="e.g. 5000.00" step="0.01"
                         class="form-control form-control-sm">
               </div>
               <div class="form-group col-md-3">
                    <label>Long Term Loans</label>
                    <input type="number" name="long_term_loans" placeholder="e.g. 20000.00" step="0.01"
                         class="form-control form-control-sm">
               </div>
               <div class="form-group col-md-3">
                    <label>Tax Payable</label>
                    <input type="number" name="tax_payable" placeholder="e.g. 3000.00" step="0.01"
                         class="form-control form-control-sm">
               </div>
          </div>

          <hr>
          <h5>Equity</h5>
          <div class="row">
               <div class="form-group col-md-4">
                    <label>Share Capital</label>
                    <input type="number" name="share_capital" placeholder="e.g. 100000.00" step="0.01"
                         class="form-control form-control-sm">
               </div>
               <div class="form-group col-md-4">
                    <label>Retained Earnings</label>
                    <input type="number" name="retained_earnings" placeholder="e.g. 25000.00" step="0.01"
                         class="form-control form-control-sm">
               </div>
               <div class="form-group col-md-4">
                    <label>Current Profit</label>
                    <input type="number" name="current_profit" placeholder="e.g. 15000.00" step="0.01"
                         class="form-control form-control-sm">
               </div>
          </div>

          <div class="form-group">
               <label>Capital</label>
               <input type="number" name="capital" placeholder="e.g. 50000.00" step="0.01"
                    class="form-control form-control-sm">
          </div>

          <div class="mt-4">
               <button type="submit" class="btn btn-success">Save Opening Balance</button>
               <a href="{{ route('openingbalance.index') }}" class="btn btn-secondary">Back</a>
          </div>
     </form>
</div>
@endsection