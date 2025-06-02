@extends('demo')
@section('title', 'Show Report')
@section('content')
<h1>Show {{ auth()->user()->type }} Report</h1>
<a href="{{ route('report.create')}}" class="btn btn-primary mb-3">Add Report</a>
<div class="main" id="main">
    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <p>New reports Fillter.</p>
    <label class="switch">
        <input type="checkbox" id="toggleSwitch">
        <span class="slider"></span>
    </label>
    @if ($reports->isEmpty())
    <p>No reports found.</p>
    @else
    <div id="div1">
        <table class="table text-white">
            <thead>
                <tr class="bg-dark">
                    <th>ID</th>
                    <th>Part</th>
                    <th>Date</th>
                    <th>SR(FIBER)</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $index => $report)
                @php
                $type = auth()->user()->type;
                $temp = $report->temp;
                $status = $report->status;
                $part = $report->part;

                if ($status != 0 && $type == 'godown') {
                    continue;
                }
                @endphp
                <tr class="{{ $report->part == 0 ? 'new-part' : ($report->part == 1 ? 'repair-part' : 'unknown-part') }}">
                    <td style="background-color: {{ $report->status == 1 ? 'green' : ($report->status == 2 ? 'red' : 'inherit') }}"> {{ $report->id }}</td>
                    <td>{{ $report->part === 0 ? 'New' : ($report->part == 1 ? 'Repair' : 'Unknown') }}</td>
                    <td>{{ $report->created_at->format('d-m-Y') }}</td>
                    <td>{{ $report->sr_no_fiber ?? $report->temp }}</td>
                    <td>{{ $report->tbl_type->name ?? 'N/A' }}</td>
                    <td><a href="{{ route('report.show', $report->id) }}" class="btn btn-info">Show <i class="ri-eye-fill"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
<script>
    document.getElementById("toggleSwitch").addEventListener("change", function() {
        const rows = document.querySelectorAll("table tbody tr");
        if (this.checked) {
            rows.forEach(row => {
                if (row.classList.contains('new-part')) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        } else {
            rows.forEach(row => {
                row.style.display = "";
            });
        }
    });

</script>
@endsection