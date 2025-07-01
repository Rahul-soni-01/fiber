@extends('demo')
@section('content')
{{-- <h1> Report Layout</h1> --}}
<div class="container">
     <h2 class="mb-4">Manufacture Report Layouts</h2>
 
     @if(session('success'))
         <div class="alert alert-success">{{ session('success') }}</div>
     @endif
 
     <div class="mb-3">
         <a href="{{ route('layouts.create') }}" class="btn btn-primary">+ Create New Layout</a>
     </div>
 
     <table class="table table-bordered datatable-remove text-dark">
         <thead class="bg-dark text-white">
             <tr>
                 <th>#</th>
                 <th>Layout Name</th>
                 <th>Description</th>
                 <th>Part</th>
                 <th>Active</th>
                 <th>Type</th>
                 <th>Created At</th>
                 <th>Actions</th>
             </tr>
         </thead>
         <tbody>
             @forelse($layouts as $index => $layout)
             <tr>
                 <td>{{ $index + 1 }}</td>
                 <td>{{ $layout->name }}</td>
                 <td>{{ $layout->description ?? '-' }}</td>
                 <td>{{ $layout->part == 0 ? 'New' : ($layout->part == 1 ? 'Repair' : 'Unknown') }}</td>
                 <td>
                     @if($layout->is_active)
                     <span class="badge bg-success">Active</span>
                     @else
                     <span class="badge bg-secondary">Inactive</span>
                     @endif
                    </td>
                    {{-- {{ dd($layouts[1],$layouts[0]);}} --}}
                     <td>{{ $layout->tbl_type->name ?? "N/A" }}</td>
                     <td>{{ $layout->created_at->format('d-m-Y') }}</td>
                     <td>
                         <a href="{{ route('layouts.edit', $layout->id) }}" class="btn btn-sm btn-warning"><i class="ri-pencil-fill"></i></a>
 
                         <form action="{{ route('layouts.destroy', $layout->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to delete this layout?');">
                             @csrf
                             @method('DELETE')
                             <button type="submit" class="btn btn-sm btn-danger"> <i class="ri-delete-bin-fill"></i></button>
                         </form>
 
                         <a href="{{ route('layouts.show', $layout->id) }}" class="btn btn-sm btn-info"><i class="ri-eye-fill"></i></a>
                     </td>
                 </tr>
             @empty
                 <tr>
                     <td colspan="7" class="text-center">No layouts found.</td>
                 </tr>
             @endforelse
         </tbody>
     </table>
 </div>
@endsection