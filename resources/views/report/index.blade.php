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

                            @if(auth()->user()->type === 'admin' )
                            <th>Serial No.</th>
                            <th>Type</th>
                            <th>Worker Name</th>
                            <th>Part</th>
                            <th>Final Amount</th>
                            <th>Action</th>
                            @endif

                            @if(auth()->user()->type === 'electric')
                            <th>Part</th>
                            <th>Note</th>
                            <th>Action</th>
                            @endif
                            @if(auth()->user()->type === 'cavity')
                            <th>Part</th>
                            {{-- <th>SR Cavity Nani</th>
                            <th>SR Cavity Moti</th>
                            <th>SR Combiner 3.1</th>
                            <th>AMP Combiner 3.1</th>
                            <th>Volt Combiner 3.1</th>
                            <th>Watt Combiner 3.1</th>
                            <th>SR Couplar 2.2</th> --}}
                            {{-- <th>AMP Couplar 2.2</th>
                            <th>Volt Couplar 2.2</th> --}}
                            {{-- <th>Watt Couplar 2.2</th> --}}
                            <th>SR(FIBER)</th>
                            <th>Note</th>
                            <th>Action</th>
                            @endif

                            @if(auth()->user()->type === 'user')
                            <th>Part</th>
                            <th>SR(FIBER)</th>
                            <th>Temp No.</th>
                            <th>M.J</th>
                            <th>Type</th>
                            {{-- <th>ISOLATOR</th>
                            <th>FIBER NANO</th>
                            <th>FIBER MOTO</th>
                            <th>CAVITY NANI </th>
                            <th>CAVITY FINAL</th> --}}
                            <th>Action</th>
                            @endif

                            @if(auth()->user()->type === 'account')
                            <th>SR(FIBER)</th>
                            <th>Type</th>
                            
                            <th>Action</th>
                            @endif
                    </thead>

                    <tbody>
                        @foreach ($reports as $report)
                        @php
                        $type = auth()->user()->type;
                        $temp = $report->temp;
                        $status = $report->status;
                        $part = $report->part;

                        if (in_array($type, ['electric', 'cavity', 'user']) && $temp == '0') {
                            continue;
                        }
                        if ($status != '0' && $type == 'account') {
                            continue;
                        }

                        if ($type == 'electric' && $part == '0') {
                            continue;
                        }
                        @endphp

                        <tr class="{{ $report->part == 0 ? 'new-part' : ($report->part == 1 ? 'repair-part' : 'unknown-part') }}">
                            <td
                                style="background-color: {{ $report->status == 1 ? 'green' : ($report->status == 2 ? 'red' : 'inherit') }}">
                                {{ $report->id }}</td>
                            <td>{{ $report->created_at->format('d-m-Y') }}</td>

                            @if ($type === 'electric')

                            <td>{{ $report->part === 0 ? 'New' : ($report->part == 1 ? 'Repair' : 'Unknown') }}</td>
                            <td>{{ $report->note1 }}</td>
                            <td>
                                @if ($type === 'electric')
                                <a href="{{ route('report.edit', $report->id) }}" class="btn btn-info">Edit</a>
                                @endif
                            </td>

                            @endif
                            @if ($type === 'cavity')
                            <td>{{ $report->part === 0 ? 'New' : ($report->part == 1 ? 'Repair' : 'Unknown') }}</td>
                            {{-- <td>{{ $report->sr_cavity_nani }}</td>
                            <td>{{ $report->sr_cavity_moti }}</td>
                            <td>{{ $report->sr_combiner_3_1 }}</td>
                            <td>{{ $report->amp_combiner_3_1 }}</td>
                            <td>{{ $report->volt_combiner_3_1 }}</td>
                            <td>{{ $report->watt_combiner_3_1 }}</td>
                            <td>{{ $report->sr_couplar_2_2 }}</td> --}}
                            {{-- <td>{{ $report->amp_couplar_2_2 }}</td>
                            <td>{{ $report->volt_couplar_2_2 }}</td> --}}
                            {{-- <td>{{ $report->watt_couplar_2_2 }}</td> --}}
                            <td>{{ $report->sr_no_fiber }}</td>
                            <td>{{ $report->note1 }}</td>
                            <td>
                                <a href="{{ route('report.edit', $report->id) }}" class="btn btn-info">Edit</a>
                            </td>

                            @endif
                            @if($type === 'user')
                            <td>{{ $report->part === 0 ? 'New' : ($report->part == 1 ? 'Repair' : 'Unknown') }}</td>
                            <td>{{ $report->sr_no_fiber }}</td>
                            <td>{{ $report->temp }}</td>
                            <td>{{ $report->m_j }}</td>
                            <td>{{ $report->Type }}</td>
                            {{-- <td>{{ $report->sr_isolator }}</td>
                            <td>{{ $report->sr_fiber_nano }}</td>
                            <td>{{ $report->sr_fiber_moto }}</td>
                            <td>{{ $report->nani_cavity }}</td>
                            <td>{{ $report->final_cavity }}</td> --}}
                            <td>
                                <a href="{{ route('report.edit', $report->id) }}" class="btn btn-info">Edit</a>
                            </td>
                            @endif
                            @if ($type === 'admin' )
                            <td>{{ $report->sr_no_fiber }}</td>
                            <td>{{ $report->type }}</td>
                            <td>{{ $report->worker_name }}</td>
                            <td>
                                @if ($report->part == 0)
                                New
                                @elseif ($report->part == 1)
                                Repair
                                @else
                                Unknown
                                @endif
                            </td>
                            <td>{{ $report->final_amount }}</td>
                            <td>
                                <a href="{{ route('report.show', $report->id) }}" class="btn btn-info">Show <i
                                        class="ri-eye-fill"></i></a>
                            </td>
                            @endif

                            @if(auth()->user()->type === 'account')
                            <td>{{ $report->sr_no_fiber }}</td>
                            <td>{{ $report->type }}</td>                            
                            <td>
                                <a href="{{ route('report.show', $report->id) }}" class="btn btn-info">Show <i
                                        class="ri-eye-fill"></i></a>
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
    </x-slot>
</x-layout>