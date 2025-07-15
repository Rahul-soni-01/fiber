@extends('demo')
@section('title', 'Bad Desk')
@section('content')
<h1>Move to Trash</h1>
{{-- resources/views/baddesk/create.blade.php --}}

<div class="container text-dark">
     @if($reports->isEmpty() || $reports->first()->reportItems->isEmpty())
     <p>No items found. <a href="#">Add your
               first item</a></p>
     @else
     <!-- Report Information -->
     <div class="mb-4 p-3 border rounded">
          <div class="d-flex justify-content-between align-items-center">
               <h4>Report Information</h4>
          </div>
          <div class="row mt-3">
               <div class="col-md-4">
                    <p><strong>SR NO:</strong> {{ $reports->first()->sr_no_fiber }}</p>
                    <p><strong>M/J:</strong> {{ $reports->first()->m_j }}</p>
               </div>
               <div class="col-md-4">
                    <p><strong>Type:</strong> {{ $reports->first()->tbl_type->name }} W.</p>
               </div>
               <div class="col-md-4">
                    <p><strong>Section:</strong>
                         @switch($reports->first()->section)
                              @case(0) Mainstore @break
                              @case(1) Manufactur @break
                              @case(2) Repair @break
                              @case(3) Baddesk @break
                              @case(4) Sell @break
                              @default Unknown
                         @endswitch
                    </p>
                    {{-- <p><strong>Final Amount:</strong> ${{ number_format($reports->first()->final_amount, 2) }}</p> --}}
               </div>
          </div>
     </div>
     <table class="table datatable-remove table-bordered text-dark">
          <thead class="bg-dark text-light">
               <tr>
                    <th>#</th>
                    <th>report Id / Part </th>
                    <th>Sub Category</th>
                    <th>Unit</th>
                    <th>Used Qty</th>
                    <th>SR No</th>
                    <th>Actions</th>
               </tr>
          </thead>
          <tbody>
               <form action="{{route('baddesk.store')}}" method="post" class="status-form">
               @csrf
               <input type="hidden" name="sr_no" value="{{$id}}">
               @php $counter = 1; @endphp
               @foreach($reports as $report)

               <input type="hidden" name="report_id[]" value="{{ $report->id }}">
               @if($report->reportItems->isNotEmpty())
               <tr class="report-header text-dark">
                    <td colspan="7">
                         <strong>Report #{{ $report->id }}</strong> -
                         @if($report->part == 0)
                         <span class="badge badge-primary">New</span>
                         @elseif($report->part == 1)
                         <span class="badge badge-warning">Repair</span>
                         @else
                         <span class="badge badge-secondary">Unknown</span>
                         @endif
                         ({{ $report->reportItems->count() }} items)
                    </td>
               </tr>

               @foreach($report->reportItems as $item)
               <tr>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $report->id }}
                         @if($report->part == 0)
                         <span class="badge badge-primary">New</span>
                         @elseif($report->part == 1)
                         <span class="badge badge-warning">Repair</span>
                         @else
                         <span class="badge badge-secondary">Unknown</span>
                         @endif
                    </td>
                    <td>{{ optional($item->tbl_sub_category)->sub_category_name }}</td>
                    <td>{{ $item->unit }}</td>
                    <td>{{ $item->used_qty }}</td>
                    <td>{{ $item->sr_no ?? 'N/A' }}</td>
                    <td>
                         <input type="hidden" name="tblstock_id[]" value="{{$item->tblstock_id}}">
                         <input type="hidden" name="used_qty[]" value="{{$item->used_qty}}">
                         <input type="hidden" name="sr_no_or_not[]" value="{{$item->tbl_sub_category->sr_no}}">
                         <input type="hidden" name="unit[]" value="{{$item->tbl_sub_category->unit}}">
                              <select name="dead_status[]" class="status-select form-select" >
                                  <option value="1" {{ $item->dead_status == '1' ? 'selected' : '' }}>Bad Desk</option>
                                  <option value="0" {{ $item->dead_status == '0' ? 'selected' : '' }}>In Stock</option>
                              </select>
                         </td>
                    </tr>
               @endforeach
               @endif
               @endforeach
                    <tr>
                         <td colspan="7" class="text-center">
                             <button type="submit" class="btn btn-primary">Update All Status</button>
                         </td>
                     </tr>
               </form>
          </tbody>
     </table>

     @endif
</div>
<style>
     .report-header {
         background-color: #f5f5f5;
     }
     .badge {
         padding: 2px 6px;
         border-radius: 4px;
         font-size: 12px;
         display: inline-block;
     }
     .badge-primary {
         background-color: #007bff;
     }
     .badge-warning {
         background-color: #ffc107;
         color: black;
     }
     .badge-secondary {
         background-color: #6c757d;
     }
 </style>
@endsection