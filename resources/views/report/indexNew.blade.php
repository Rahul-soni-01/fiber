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

            {{-- <p>New reports Fillter.</p>
            <label class="switch">
                <input type="checkbox" id="toggleSwitch">
                <span class="slider"></span>
            </label> --}}

            @if ($types->isEmpty())
            <p>No reports found.</p>
            @else
            <div id="div1">
                <table class="table  table-striped">
                    <thead>
                        <tr class="bg-warning">
                            <th>ID</th>
                            <th>Type</th>                            
                            <th>Total Qty.</th>
                            <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($types as $key => $type)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td> {{ $type->name }} </td>
                            <td> {{ count($type->reports); }} </td>
                            <td> <a href="{{ route('report.type.show', $type->id) }}" class="btn btn-info">Show <i class="ri-eye-fill"></i></a></td>
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