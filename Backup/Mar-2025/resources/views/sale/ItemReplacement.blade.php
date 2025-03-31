@extends('demo')
@section('title', 'Out')
@section('content')
<h1>Product Out</h1>
<a href="{{ route('sale.index') }}" class="btn btn-primary">Show Out Data</a>
@if ($errors->any())
<div style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header bg-primary text-white">
                     <h4>Replace Item: {{ $saleItem->sr_no }}</h4>
                 </div>
 
                 <div class="card-body">
                     <form action="{{ route('item-replacement.store')}}" method="POST">
                         {{-- <form> --}}
                         @csrf
                              <input type="hidden" value="{{$saleItem->id}}" name="item_id" >
                         <div class="row mb-3">
                             <div class="col-md-12">
                                 <label class="form-label text-dark">Current Serial Number</label>
                                 <input type="text" class="form-control" value="{{ $saleItem->sr_no }}" readonly>
                             </div>
                         </div>
 
                         <hr>
 
                         <div class="row mb-3">
                             <div class="col-md-12">
                                 <label for="new_report_id" class="form-label text-dark">Select Replacement Item</label>
                                 <select class="form-select" id="new_report_id" name="report_id" required>
                                     <option value="" disabled selected>-- Select Replacement --</option>
                                     @foreach($serial_nos as $serial)
                                         <option value="{{ $serial->id }}">{{ $serial->sr_no_fiber }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
  
                         <div class="row mb-3">
                             <div class="col-md-12">
                                 <label for="reason" class="form-label text-dark">Reason for Replacement</label>
                                 <textarea class="form-control" id="reason" name="reason" rows="3"  required ></textarea>
                             </div>
                         </div>
 
                         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                             <button type="submit" class="btn btn-primary me-md-2">
                                 <i class="fas fa-sync-alt me-1"></i> Process Replacement
                             </button>
                             <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                 <i class="fas fa-times me-1"></i> Cancel
                             </a>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div> 
@endsection