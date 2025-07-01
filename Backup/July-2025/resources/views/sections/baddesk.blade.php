@extends('demo')
@section('title', 'Bad Debt')
@section('content')
<h1>Bad Debt</h1>
<div class="text-white">
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


    @if ($reports->isEmpty())
    <p>No reports found.</p>
    @else
    <div id="div1" class="table-responsive mt-4">
        <table class="table text-dark">
            <thead class="table-dark text-white">
                <th>ID</th>
                <th>Part</th>
                <th>Section</th>
                <th>W/N.W.</th>

                <th>Date</th>
                <th>Serial No.</th>
                <th>Type</th>
                <th>Worker Name</th>
                {{-- <th>Final Amount</th> --}}
                {{-- <th>Sale</th> --}}
                {{-- <th>Stock</th> --}}
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($reports as $sr_no_fiber => $reportGroup)
                {{-- {{ dd($reports);}} --}}
                @foreach ($reportGroup as $report)
                <tr
                    class="{{ $report->part == 0 ? 'new-part' : ($report->part == 1 ? 'repair-part' : 'unknown-part') }}">
                    <td>{{ $report->id }}</td>
                    <td>
                        @if($report->part == 0)
                        <span class="badge bg-primary">New</span>
                        @elseif($report->part == 1)
                        <span class="badge bg-warning">Repair</span>
                        @else
                        <span class="badge bg-secondary">Unknown</span>
                        @endif
                    </td>
                    <td>
                        <select id="section" class="form-select section" data-id="{{ $report->id }}">
                            <option value="0" {{ $report->section == 0 ? 'selected' : '' }}>Mainstore</option>
                            <option value="1" {{ $report->section == 1 ? 'selected' : '' }}>Manufacture</option>
                            <option value="2" {{ $report->section == 2 ? 'selected' : '' }}>Repair</option>
                            <option value="3" {{ $report->section == 3 ? 'selected' : '' }}>Baddesk</option>
                            <option value="4" {{ $report->section == 4 ? 'selected' : '' }}>Sell</option>
                        </select>
                    </td>

                    <td>{{ $report->f_status === 0 ? 'No warranty' : ($report->f_status == 1 ? 'Warranty' : 'Unknown')
                        }}</td>
                    <td>{{ $report->created_at->format('d-m-Y') ?? 'N/A' }}</td>
                    <td>{{ $sr_no_fiber }}</td>
                    <td>{{ $report->tbl_type->name ?? ($report->type ?? 'N/A') }}</td>
                    <td>{{ $report->worker_name ?? 'N/A' }}</td>
                    {{-- <td>{{ $report->final_amount ? '₹'.number_format($report->final_amount, 2) : 'N/A' }}</td> --}}
                    {{-- <td>
                        @if($report->sale_status)
                        <span class="badge badge-success">Sold</span>
                        @else
                        <span class="badge badge-secondary">Unsold</span>
                        @endif
                    </td>
                    <td>
                        @if($report->stock_status)
                            <span class="badge badge-info">In Stock</span>
                        @else
                        <span class="badge badge-light">Out of Stock</span>
                        @endif
                    </td> --}}
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('report.search', ['sr_no' => $sr_no_fiber]) }}" class="btn btn-sm btn-info"><i class="ri-eye-fill"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection