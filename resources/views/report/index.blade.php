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
            @if ($reports->isEmpty())
            <p>No reports found.</p>
            @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Worker Name</th>
                        <th>Type</th>
                        <th>SR Card</th>
                        <th>LEDs</th>
                        <th>Nani Cavity</th>
                        <th>Final Cavity</th>
                        <th>Note 1</th>
                        <th>Note 2</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                    <tr>
                        <td>{{ $report->id }}</td>
                        <td>{{ $report->worker_name }}</td>
                        <td>{{ $report->type }}</td>
                        <td>{{ $report->sr_card }}</td>
                        <td>
                            <div class="row">
                                @foreach($report->tbl_leds as $led)
                                    <div class="col-md-6"> <!-- 3 columns for each item (4 items per row) -->
                                        <ul>
                                            <li>LED Serial: {{ $led->sr_led }}</li>
                                            <li>Amp: {{ $led->amp_led }}</li>
                                            <li>Volt: {{ $led->volt_led }}</li>
                                            <li>Watt: {{ $led->watt_led }}</li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                        <td>{{ $report->nani_cavity }}</td>
                        <td>{{ $report->final_cavity }}</td>
                        <td>{{ $report->note1 }}</td>
                        <td>{{ $report->note2 }}</td>
                        <td>{{ $report->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </x-slot>
</x-layout>