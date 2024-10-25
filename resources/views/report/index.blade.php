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
                            <th>Temp</th>
                            <th>Cards</th>
                            <th>sr_aom_qswitch</th>
                            <th>amp_aom_qswitch</th>
                            <th>volt_aom_qswitch</th>
                            <th>watt_aom_qswitch</th>
                            <th>Action</th>

                            @endif
                            @if(auth()->user()->type === 'cavity' || auth()->user()->type === 'user')
                            <th>TYpe</th>
                            <th>SR Cavity Nani</th>
                            <th>SR Cavity Moti</th>
                            <th>SR Combiner 3.1</th>
                            <th>AMP Combiner 3.1</th>
                            <th>Volt Combiner 3.1</th>
                            <th>Watt Combiner 3.1</th>
                            <th>SR Couplar 2.2</th>
                            {{-- <th>AMP Couplar 2.2</th>
                            <th>Volt Couplar 2.2</th> --}}
                            <th>Watt Couplar 2.2</th>
                            <th>Action</th>
                            @endif
                    </thead>
                  
                    <tbody>
                        @foreach ($reports as $report)
                            @php
                                $type = auth()->user()->type;
                                $status = $report->r_status;
                                
                                if ($type === 'electric' && $status != '0' || $type === 'admin' && $status == '0' || $type === 'cavity' && $status != '0' || $type === 'user' && $status != '0') {
                                    continue;
                                }
                            @endphp
                                
                                <tr class="{{ $report->part == 0 ? 'new-part' : ($report->part == 1 ? 'repair-part' : 'unknown-part') }}"
                                    style="color:white;background-color: {{ $report->r_status == 1 ? 'green' : ($report->r_status == 0 ? 'red' : 'inherit') }}">
                                   

                                    <td>{{ $report->id }}</td>
                                    <td>{{ $report->created_at->format('d-m-Y') }}</td>
                    
                                @if ($type === 'electric')
                                
                                    <td>{{ $report->part == 0 ? 'New' : ($report->part == 1 ? 'Repair' : 'Unknown') }}</td>
                                    <td>{{ $report->temp }}</td>
                                    <td>
                                        <div class="row">
                                            @foreach ($report->tbl_cards as $card)
                                                <div class="col-md">
                                                    <ul>
                                                        <li>Card Serial: {{ $card->sr_card }}</li>
                                                        <li>Amp: {{ $card->amp_card }}</li>
                                                        <li>Volt: {{ $card->volt_card }}</li>
                                                        <li>Watt: {{ $card->watt_card }}</li>
                                                    </ul>
                                                </div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>{{ $report->sr_aom_qswitch }}</td>
                                    <td>{{ $report->amp_aom_qswitch }}</td>
                                    <td>{{ $report->volt_aom_qswitch }}</td>
                                    <td>{{ $report->watt_aom_qswitch }}</td>
                                    <td>
                                        @if ($type === 'electric')
                                            <a href="{{ route('report.edit', $report->id) }}" class="btn btn-info">Edit</a>
                                        @endif
                                    </td>
                    
                                    @endif 
                                    @if ($type === 'cavity'|| $type === 'user' )
                                    <td>{{ $report->temp }}</td>
                                    <td>{{ $report->sr_cavity_nani }}</td>
                                    <td>{{ $report->sr_cavity_moti }}</td>
                                    <td>{{ $report->sr_combiner_3_1 }}</td>
                                    <td>{{ $report->amp_combiner_3_1 }}</td>
                                    <td>{{ $report->volt_combiner_3_1 }}</td>
                                    <td>{{ $report->watt_combiner_3_1 }}</td>
                                    <td>{{ $report->sr_couplar_2_2 }}</td>
                                    {{-- <td>{{ $report->amp_couplar_2_2 }}</td>
                                    <td>{{ $report->volt_couplar_2_2 }}</td> --}}
                                    <td>{{ $report->watt_couplar_2_2 }}</td>
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
                                        <a href="{{ route('report.show', ['report_id' => $report->id]) }}"><i class="ri-eye-fill"></i></a>
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