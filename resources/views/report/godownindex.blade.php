<x-layout>
    <x-slot name="title">Show {{ auth()->user()->type }} Report</x-slot>
    <x-slot name="main">
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
                <table class="table  table-striped">
                    <thead>
                        <tr class="bg-warning">
                            <th>ID</th>
                            <th>Date</th>
                            @if(auth()->user()->type === 'godown')
                            <th>SR(FIBER)</th>
                            <th>Type</th>
                            <th>Action</th>
                            @endif
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
                        <tr
                            class="{{ $report->part == 0 ? 'new-part' : ($report->part == 1 ? 'repair-part' : 'unknown-part') }}">
                            <td
                                style="background-color: {{ $report->status == 1 ? 'green' : ($report->status == 2 ? 'red' : 'inherit') }}">
                                {{ $report->id }}</td>
                            <td>{{ $report->created_at->format('d-m-Y') }}</td>
                            <td>{{ $report->sr_no_fiber }}</td>
                            <td>{{ $report->tbl_type->name }}</td>
                            <td>
                                <a href="{{ route('report.show', $report->id) }}" class="btn btn-info">Show <i class="ri-eye-fill"></i></a>
                            </td>
                        
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
    </x-slot>
</x-layout>