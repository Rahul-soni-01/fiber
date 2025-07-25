@extends('demo')
@section('title', 'Report Type')
@section('content')
<h1>Fiber Type</h1>
<div class="text-white">
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
    <p>No Fiber found.</p>
    @else
    <div id="div1">
        <table class="table text-dark">
            <thead class="bg-dark text-white">
                <tr>
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
@endsection