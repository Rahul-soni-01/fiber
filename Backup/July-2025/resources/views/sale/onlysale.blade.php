@extends('demo')
@section('title', 'Product Out')
@section('content')
<h1>Product Out</h1>
<div class="main" id="main">
<div class="d-flex align-items-center flex-wrap gap-1 m-1">
    <a href="{{ route('sale.create') }}" class="btn btn-primary m-1">Add Product Out</a>
    <a href="{{ route('sale.index') }}" class="btn btn-primary m-1">Customer Wise</a>
    
    <a href="?status=0" class="btn btn-success m-1">Sale</a>
    <a href="?status=1" class="btn btn-info m-1">Demo</a>
    <a href="?status=2" class="btn btn-warning m-1">Standby</a>
    <a href="?status=3" class="btn btn-danger m-1">Replacement</a>
</div>
@if($isReplacement) 
     <table class="table text-dark">
        <thead class="table-dark text-white">
          <tr>
               <th>#</th>
               <th>Sale ID</th>
               <th>Date</th>
               <th>Old SR No</th>
               <th>New SR No</th>
               <th>Note</th>
          </tr>
     </thead>
     <tbody>
          @foreach($sales as $index => $replacement)
          <tr>
               <td>{{ $index + 1 }}</td>
               <td>
                    @if($replacement->sale)
                         {{ $replacement->sale->id }} ({{ $replacement->sale->customer->customer_name ?? 'N/A' }})
                    @else
                         N/A
                    @endif
               </td>
               <td>{{ $replacement->date->format('d-m-Y') }}</td>
               <td>{{ $replacement->old_sr_no }}</td>
               <td>{{ $replacement->new_sr_no }}</td>
               <td>{{ Str::limit($replacement->note, 30) }}</td>
               
          </tr>
          @endforeach
     </tbody>
</table>
@else
     <table class="table text-dark">
        <thead class="table-dark text-white">
               <tr>
               <th>#</th>
               <th>Date</th>
               <th>Sr-No</th>
               <th>Status</th>
               <th>Price</th>
               <th>Action</th>
               </tr>
          </thead>
          <tbody>
               @foreach ($sales as $sale)
               <tr>
               <td>{{$sale->sale_id}}</td>
               <td>{{$sale->sale_date}}</td>
               <td> @foreach ($sale->items as $item)
                    {{ $item->sr_no }}
                    @if(!$loop->last), @endif
                    @endforeach</td>
                    
               <td> 
                    @switch($sale->status)
                         @case(0)
                              <span class="badge bg-success">Sale</span>
                              @break
                         @case(1)
                              <span class="badge bg-primary">Demo</span>
                              @break
                         @case(2)
                              <span class="badge bg-warning text-dark">Standby</span>
                              @break
                         @case(3)
                              <span class="badge bg-danger">Replacement</span>
                              @break
                         @case(4)
                              <span class="badge bg-info text-dark">Standby Return</span>
                              @break
                         @default
                              <span class="badge bg-secondary">Unknown</span>
                    @endswitch

                    @switch($sale->repair_status)
                         @case(0)
                         
                              @break
                         @case(1)
                              <span class="badge bg-primary">Repair</span>
                              @break
                         @default
                              <span class="badge bg-secondary">Unknown</span>
                    @endswitch
               </td>
               
               <td>{{$sale->amount}}</td>
               <td>
                    <a class="btn btn-sm btn-info" href="{{ route('sale.show', ['sale_id' => $sale->id]) }}"><i
                              class="ri-eye-fill"></i></a>

                    @if($sale->status == 1)
                         <a class="btn btn-sm btn-success" href="{{ route('sale.convert', ['sale_id' => $sale->id]) }}">
                              Convert to Sale
                         </a>
                    @endif
                    @if($sale->status == 2)
                         <a class="btn btn-sm btn-success" href="{{ route('standby.return', ['sale_id' => $sale->id]) }}">
                              Standby Returned 
                         </a>
                    @endif
                    {{-- <a class="btn" href="{{ route('sale.edit', ['sale_id' => $sale->id]) }}"><i
                              class="ri-pencil-line"></i></a> --}}
                    {{-- <form action="{{ route('sale.destroy', $sale->id) }}" method="POST"
                         style="display:inline;">
                         @csrf
                         @method('DELETE')
                         <button type="submit" onclick="return confirm('Are you sure you want to delete this sale?');" class="btn"><i
                                   class="ri-delete-bin-fill"></i></button>
                    </form> --}}
               </td>
               </tr>
               @endforeach
          </tbody>
     </table>
@endif
@endsection