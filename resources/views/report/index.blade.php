<x-layout>
    <x-slot name="title">Show Report</x-slot>
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
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Serial No.</th>
                            <th>Type</th>
                            <th>Worker Name</th>
                            <th>Part</th>
                            <th>Final Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                        <tr
                            class="{{ $report->part == 0 ? 'new-part' : ($report->part == 1 ? 'repair-part' : 'unknown-part') }}">
                            <td>{{ $report->id }}</td>
                            <td>{{ $report->created_at->format('d-m-Y') }}</td>
                            <td>{{ $report->sr_no_fiber }}</td>
                            <td>{{ $report->type }}</td>
                           
                            <td>{{ $report->worker_name }}</td>
                            <td>
                                @if($report->part == 0)
                                New
                                @elseif($report->part == 1)
                                Repair
                                @else
                                Unknown
                                @endif
                            </td>
                            {{-- <td>
                                <div class="row">
                                    @foreach($report->tbl_leds as $led)
                                    <div class="col-md-6">
                                        <ul>
                                            <li>LED Serial: {{ $led->sr_led }}</li>
                                            <li>Amp: {{ $led->amp_led }}</li>
                                            <li>Volt: {{ $led->volt_led }}</li>
                                            <li>Watt: {{ $led->watt_led }}</li>
                                        </ul>
                                    </div>
                                    @endforeach
                                </div>
                            </td> --}}
                            <td>{{ $report->final_amount }}</td>

                            <td> <a href="{{ route('report.show', ['report_id' => $report->id]) }}"><i
                                        class="ri-eye-fill"></i></a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="div2" style="display:none;">This is Col mode</div>
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