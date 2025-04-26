@extends('demo')
@section('content')
<div class="container">
     <h2>Layout Preview: {{ $layout->name }}</h2>
 
     <div class="mb-3">
         <strong>Description:</strong> {{ $layout->description ?? '—' }}<br>
         <strong>Active:</strong>
         @if ($layout->is_active)
             <span class="badge bg-success">Yes</span>
         @else
             <span class="badge bg-secondary">No</span>
         @endif
     </div>
 
     <h4>Fields</h4>
     <table class="table datatable-remove table-bordered">
         <thead>
             <tr>
                 <th>Field Key</th>
                 <th>Label</th>
                 <th>Visible</th>
                 <th>Sort Order</th>
             </tr>
         </thead>
         <tbody>
             @foreach ($layout->fields as $field)
                 <tr>
                     <td>{{ $field->field_key }}</td>
                     <td>{{ $field->label }}</td>
                     <td>{{ $field->visible ? 'Yes' : 'No' }}</td>
                     <td>{{ $field->sort_order }}</td>
                 </tr>
             @endforeach
         </tbody>
     </table>
 
     <a href="{{ route('layouts.index') }}" class="btn btn-secondary">Back</a>
 </div>
@endsection