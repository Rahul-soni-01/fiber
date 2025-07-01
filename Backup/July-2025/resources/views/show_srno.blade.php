@extends('demo')
@section('title', 'Serial No List')
@section('content')
<h1>Serial No List</h1>

<form action="" method="get">
    <div class="container-fluid">
        <div class="row g-3">
           
            <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                <select name="invoice_no" id="invoice_no" class="form-control">
                    <option value="" >All</option>
                    @foreach($serial_no_list->keys() as $invoice_no)
                        <option value="{{ $invoice_no }}" {{ request('invoice_no') == $invoice_no ? 'selected' : '' }}>
                            {{ $invoice_no }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 d-grid">
                <button type="submit" class="btn btn-primary btn-sm">Search</button>
            </div>
        </div>
    </div>
</form>

<table class="table text-white">
    <thead class=" bg-dark">
        <tr>
            {{-- <th>#</th> --}}
            <th>Pur-Invoice</th>
            <th>Sub Category</th>
            <th>unit</th>
            <th>Serial No</th>
            <th>Qty</th>
            <th>Used</th>
            <th>Dead</th>
        </tr>
    </thead>
    <tbody>
        @foreach($serial_no_list as $invoice_no => $items)

        @foreach($items as $index => $item)
        <tr>
            {{-- <td>{{ $item->id }}</td> --}}
            <td>{{ $invoice_no }}</td>
            <td>{{ $item->category->category_name ?? 'N/A' }} - {{ $item->subCategory->sub_category_name ?? 'N/A' }}
            </td>
            <td> @if ($item->subCategory->unit == 'Pic') 
                    Pcs
                @else
                    {{ $item->subCategory->unit }}
                @endif
            </td>
            <td>{{ $item->serial_no ?? 'N/A' }}</td>
            <td>{{ $item->qty ?? 'N/A' }}</td>
            <td>{{ $item->status == 0 ? 'No Use' : ($item->status == 1 ? 'Used' : 'Unknown') }}</td>
            <td>
                <div class="d-flex">
                    <div class="me-2">
                        @if($item->dead_status == 0)
                        <span id="badge-{{ $item->id }}" class="badge bg-success">Active</span>
                        @elseif($item->dead_status == 1)
                        <span id="badge-{{ $item->id }}" class="badge bg-danger">Dead</span>
                        @else
                        <span id="badge-{{ $item->id }}" class="badge bg-secondary">Unknown</span>
                        @endif
                    </div>
                    <select class="form-select" data-id="{{ $item->id }}" style="width: auto;"
                        onchange="deadstatus(this);">
                        <option value="0" {{ $item->dead_status == 0 ? 'selected' : '' }} class="bg-success">Active
                        </option>
                        <option value="1" {{ $item->dead_status == 1 ? 'selected' : '' }} class="bg-danger
                            text-white">Dead</option>
                        {{-- <option value="2" {{ $item->dead_status != 0 && $item->dead_status != 1 ? 'selected' : ''
                            }} class="text-secondary">Unknown</option> --}}
                    </select>
                </div>
            </td>
        </tr>
        @endforeach
        @endforeach


    </tbody>
</table>
<style>
    /* Style for select options */
    .form-select option.text-success {
        color: #28a745;
    }

    .form-select option.text-danger {
        color: #dc3545;
    }

    .form-select option.text-secondary {
        color: #6c757d;
    }

    /* Border colors */
    .border-success {
        border-color: #28a745 !important;
    }

    .border-danger {
        border-color: #dc3545 !important;
    }

    .border-secondary {
        border-color: #6c757d !important;
    }

    /* Validation feedback */
    .is-valid {
        border-color: #28a745 !important;
    }

    .is-invalid {
        border-color: #dc3545 !important;
    }
</style>
@endsection