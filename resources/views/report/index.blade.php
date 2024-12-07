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

            <form action="" method="get">
                <div class="row">
                    <div class="col">
                        <input type="date" id="s_date" name="s_date" class="form-control"
                            value="{{ request('s_date') }}">
                    </div>
                    <div class="col">
                        <input type="date" id="e_date" name="e_date" class="form-control"
                            value="{{ request('e_date') }}">
                    </div>
                    <div class="col">
                        <input type="text" id="sr_no" name="sr_no" placeholder="Serial No." class="form-control"
                            value="{{ request('sr_no') }}">
                    </div>
                    <div class="col">
                        <select name="p_name" id="sid" class="form-control">
                            <option value="" disabled selected>Select Party</option>
                            @foreach($tbl_parties as $tbl_party)
                            <option value="{{ $tbl_party->id }}" {{ request('p_name')==$tbl_party->id ? 'selected' : ''
                                }} >{{ $tbl_party->party_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col">
                        <input type="text" id="worker_name" name="worker_name" placeholder="Worker Name"
                            class="form-control">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-dark" id="search">Search</button>
                    </div>
                </div>
            </form>

            @if (request()->path() !== 'report-new')
            <p class="mt-4">New reports Filter.</p>
            <label class="switch">
                <input type="checkbox" id="toggleSwitch">
                <span class="slider"></span>
            </label>
            @endif


            @if ($reports->isEmpty())
            <p>No reports found.</p>
            @else
            <div id="div1" class="mt-4">
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
                            <th>Action</th>
                            @endif

                            @if(auth()->user()->type === 'account')
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

                        if (in_array($type, ['electric', 'cavity', 'user']) && $status == '1') {
                        continue;
                        }
                        if ($status != 0 && $type == 'account') {
                        continue;
                        }

                        if ($type == 'electric' && $part == '0') {
                        continue;
                        }
                        @endphp

                        <tr
                            class="{{ $report->part == 0 ? 'new-part' : ($report->part == 1 ? 'repair-part' : 'unknown-part') }}">
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
                            <td>{{ $report->tbl_type->name }}</td>
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
                            <td>{{ $report->tbl_type->name }}</td>
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