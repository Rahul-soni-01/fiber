@extends('demo')
@section('title', 'Report')
@section('content')
<h1>Report</h1>
@if ($errors->any())
<div style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
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
            <tr class="bg-warning">
                <th>ID</th>
                <th>Date</th>
                @if(in_array(auth()->user()->type, ['admin', 'user', 'account']) )
                <th>SR(FIBER)</th>
                <th>Part</th>
                <th>Note</th>
                <th>Remark</th>
                <th>Action</th>
                @endif
        </thead>
        <tbody>
            @foreach ($reports as $report)
            @php
            $type = auth()->user()->type;
            @endphp
            <tr class="{{ $report->part == 0 ? 'new-part' : ($report->part == 1 ? 'repair-part' : 'unknown-part') }}">
                <td style="background-color: {{ $report->status == 1 ? 'green' : ($report->status == 2 ? 'red' : 'inherit') }}">
                    {{ $report->id }}</td>
                <td>{{ $report->created_at->format('d-m-Y') }}</td>
                @if(in_array(auth()->user()->type, ['admin', 'user', 'account']))
                <td>{{ $report->part === 0 ? 'New' : ($report->part == 1 ? 'Repair' : 'Unknown') }}</td>
                <td>{{ $report->sr_no_fiber }}</td>
                <td>{{ $report->note1 }} <br>{{ $report->note2 }}</td>
                <td>{{ $report->remark }}</td>
                <td><a href="{{ route('report.edit', $report->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('report.show', $report->id) }}" class="btn btn-primary"> <i class="ri-eye-fill"></i></a>
                </td>
                
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{-- <div id="div2" style="display:none;">This is Col mode</div> --}}
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