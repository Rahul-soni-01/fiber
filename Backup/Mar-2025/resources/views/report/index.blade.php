@extends('demo')
@section('title', 'Report')
@section('content')
<h1>Report</h1>
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
            <form action="" method="get">
                <div class="container-fluid">
                    <div class="row g-3">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <input type="date" id="s_date" name="s_date" class="form-control" value="{{ request('s_date') }}">
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <input type="date" id="e_date" name="e_date" class="form-control" value="{{ request('e_date') }}">
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <input type="text" id="sr_no" name="sr_no" placeholder="Serial No." class="form-control" value="{{ request('sr_no') }}">
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <select name="p_name" id="sid" class="form-control">
                                <option value="" disabled selected>Select Party</option>
                                @foreach($tbl_parties as $tbl_party)
                                <option value="{{ $tbl_party->id }}" {{ request('p_name')==$tbl_party->id ? 'selected' : '' }}>
                                    {{ $tbl_party->party_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <input type="text" id="worker_name" name="worker_name" placeholder="Worker Name" class="form-control">
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2 d-grid">
                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                        </div>
                    </div>
                </div>
            </form>        

            @if(!isset($ready))
            <p class="mt-4">New reports Filter.</p>
            <label class="switch">
                <input type="checkbox" id="toggleSwitch">
                <span class="slider"></span>
            </label>
            @endif
            @if ($reports->isEmpty())
            <p>No reports found.</p>
            @else
            <div id="div1" class="table-responsive mt-4">
                <table class="table text-white">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th>ID</th>
                            <th>Date</th>
                            @if(auth()->user()->type === 'admin')
                            <th>Serial No.</th>
                            <th>Type</th>
                            <th>Worker Name</th>
                            <th>Part</th>
                            <th>Final Amount</th>
                            <th>Sale</th>
                            @if(isset($ready) && $ready == 1)
                            <th>Stock</th>
                            @endif
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

                        @endphp



                        <tr class="{{ $report->part == 0 ? 'new-part' : ($report->part == 1 ? 'repair-part' : 'unknown-part') }}">

                            <td style="background-color: {{ $report->status == 1 ? 'green' : ($report->status == 2 ? 'red' : 'inherit') }}">

                                {{ $report->id }}</td>

                            <td>{{ $report->created_at->format('d-m-Y') }}</td>



                            @if ($type === 'electric')

                            <td>{{ $report->part === 0 ? 'New' : ($report->part == 1 ? 'Repair' : 'Unknown') }}</td>

                            <td>{{ $report->note1 }}</td>

                            <td> @if ($type === 'electric')

                                <a href="{{ route('report.edit', $report->id) }}" class="btn btn-info">Edit</a>

                                @endif

                            </td>



                            @endif

                            @if ($type === 'cavity')

                            <td>{{ $report->part === 0 ? 'New' : ($report->part == 1 ? 'Repair' : 'Unknown') }}</td>

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

                            <td>{{ $report->tbl_type->name ?? null}}</td>

                            <td><a href="{{ route('report.edit', $report->id) }}" class="btn btn-info">Edit</a>

                            </td>

                            @endif

                            @if ($type === 'admin' )

                            <td>{{ $report->sr_no_fiber }}</td>

                            <td>{{ $report->tbl_type->name ?? 0 }}</td>

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
                                @if ($report->sale_status == 0)
                                No sale
                                @elseif ($report->sale_status == 1)
                                Sale
                                @else
                                Unknown
                                @endif
                            </td>

                            @if(isset($ready) && $ready == 1)
                            <td>
                                <label class="switch">
                                    <input type="checkbox" {{ $report->stock_status == 1 ? 'checked' : '' }}
                                    id="ReadyStock" data-id="{{ $report->id}}">
                                    <span class="slider round"></span>
                                </label>
                                <div class="row-spinner spinner-border" role="status" style="display: none;">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </td>
                            @endif

                            <td>
                                <a href="{{ route('report.show', $report->id) }}" class="btn btn-sm btn-primary"><i class="ri-eye-fill"></i></a>
                                <a href="{{ route('report.edit', $report->id) }}" class="btn btn-sm btn-warning"> <i class="ri-pencil-fill"></i> </a>

                                {{-- <form action="{{ route('sale.destroy', $report->id) }}" method="POST"

                                    style="display:inline;">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"

                                        onclick="return confirm('Are you sure you want to delete this sale?');"

                                        class="btn btn-sm  btn-danger">

                                        <i class="ri-delete-bin-fill"></i>

                                    </button>

                                </form> --}}
                            </td>
                            @endif
                            @if(auth()->user()->type === 'account')
                            <td>{{ $report->sr_no_fiber }}</td>
                            <td>{{ $report->tbl_type->name ?? null }}</td>
                            <td> <a href="{{ route('report.show', $report->id) }}" class="btn btn-primary"> <i class="ri-eye-fill"></i></a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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