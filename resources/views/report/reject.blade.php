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
                <table class="table table-striped">
                    <thead>
                        <tr class="bg-warning">
                            <th>ID</th>
                            <th>Date</th>
                            @if(auth()->user()->type === 'user')
                            <th>SR(FIBER)</th>
                            <th>Temp No.</th>
                            <th>M.J</th>
                            <th>Type</th>
                            <th>ISOLATOR</th>
                            <th>FIBER NANO</th>
                            <th>FIBER MOTO</th>
                            <th>CAVITY NANI </th>
                            <th>CAVITY FINAL</th>
                            <th>Action</th>
                            @endif
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                        @php
                        $type = auth()->user()->type;
                        @endphp
                        <tr class="{{ $report->part == 0 ? 'new-part' : ($report->part == 1 ? 'repair-part' : 'unknown-part') }}">
                            <td style="background-color: {{ $report->status == 1 ? 'green' : ($report->status == 2 ? 'red' : 'inherit') }}"> {{ $report->id }}</td>
                            <td>{{ $report->created_at->format('d-m-Y') }}</td>
                            @if($type === 'user')
                            <td>{{ $report->sr_no_fiber }}</td>
                            <td>{{ $report->temp }}</td>
                            <td>{{ $report->m_j }}</td>
                            <td>{{ $report->Type }}</td>
                            <td>{{ $report->sr_isolator }}</td>
                            <td>{{ $report->sr_fiber_nano }}</td>
                            <td>{{ $report->sr_fiber_moto }}</td>
                            <td>{{ $report->nani_cavity }}</td>
                            <td>{{ $report->final_cavity }}</td>
                            <td>
                                <a href="{{ route('report.edit', $report->id) }}" class="btn btn-info">Edit</a>
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