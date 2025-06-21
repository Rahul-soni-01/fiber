@extends('demo')
@section('title', 'GST PDF')
@section('content')
<h1>GST PDF</h1>
@if ($errors->any())
<div style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (session('success'))
<div style="color: green;">
    {{ session('success') }}
</div>
@endif
<div class="main" id="main">
    <a href="{{ route('gst-pdf.create') }}" class="btn btn-primary mb-2">Add GST Pdf</a>
    <div class="table-responsive">
      <table class="table text-dark">
        <thead class="table-dark text-white">
                <tr>
                    <th>#</th>
                    <th>Invoice No</th>
                    <th>Date</th>
                    <th>Grand Total Qty</th>
                    <th>Grand Total </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gstPdfRecords as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->invoice_no }}</td>
                    <td>{{ date("d-m-Y",strtotime($record->date)) }} </td>
                    <td>{{ $record->grand_total_qty }}</td>
                    <td>{{ $record->grand_total_amt }}</td>
                    <td>
                        <a href="{{ route('gst-pdf.edit',['id'=> $record->id  ])}}" class="btn btn-sm btn-primary">
                            <i class="ri-edit-fill"></i>
                        </a>
                        <a class="btn  btn-sm btn-info" href="{{ route('gst-pdf.show', ['id' => $record->id]) }}"><i
                                class="ri-eye-fill"></i></a>
                        <form action="{{ route('gst-pdf.delete',['id'=> $record->id  ])}}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this record?');"
                                class="btn btn-sm btn-danger">
                                <i class="ri-delete-bin-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection