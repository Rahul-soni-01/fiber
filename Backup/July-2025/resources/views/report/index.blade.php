@extends('demo')
@section('title', 'All Report')
@section('content')
<h1>All Report</h1>
<a href="{{ route('report.create')}}" class="btn btn-primary mb-3">Add Report</a>
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
                    <input type="text" id="sr_no" name="sr_no" placeholder="Serial No." class="form-control"
                        value="{{ request('sr_no') }}">
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <select name="p_name" id="sid" class="form-control">
                        <option value="" disabled selected>Select Party</option>
                        @foreach($tbl_parties as $tbl_party)
                        <option value="{{ $tbl_party->id }}" {{ request('c_name')==$tbl_party->id ? 'selected' : '' }}>
                            {{ $tbl_party->customer_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <select id="part" name="part" required class="form-control">
                        <option value="" selected disabled>Select Part</option>
                        <option value="0">New</option>
                        <option value="1">Repairing</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 d-grid">
                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                </div>
            </div>
        </div>
    </form>

    @if(!isset($ready))
    <p class="mt-2 text-dark">New reports Filter.</p>
    <label class="switch">
        <input type="checkbox" id="toggleSwitch">
        <span class="slider"></span>
    </label>
    @endif
    @if ($reports->isEmpty())
    <div class="d-flex justify-content-center align-items-center flex-column mt-4 text-muted">
        <i class="fas fa-exclamation-circle fa-5x mb-2 "></i>
        <p class="text-dark">No reports found.</p>
    </div>
    @else
    <div id="div1" class="table-responsive mt-4">
        <table class="table text-dark">
            <thead class="bg-dark text-white">
                <tr>
                    <th>ID</th>
                    <th>Part</th>
                    <th>W/N.W.</th>
                    @if(auth()->user()->type === 'godown')
                    <th>SR(FIBER) / Temp No.</th>
                    @endif
                    <th>Date</th>
                    <th>Section</th>

                    @if(auth()->user()->type === 'admin')
                    <th>Serial No.</th>
                    <th>Type</th>
                    <th>Worker Name</th>
                    <th>Final Amount</th>
                    <th>Sale</th>
                    @if(isset($ready) && $ready == 1) // for stock route
                    <th>Stock</th>
                    @endif
                    <th>Action</th>
                    @endif

                    @if(auth()->user()->type === 'electric')

                    <th>SR(FIBER) / Temp No</th>
                    <th>Note</th>
                    <th>Action</th>
                    @endif
                    @if(auth()->user()->type === 'cavity')

                    <th>SR(FIBER) / Temp No</th>
                    <th>Note</th>
                    <th>Action</th>
                    @endif

                    @if(auth()->user()->type === 'user')

                    <th>SR(FIBER) / Temp No</th>
                    <th>Note</th>
                    <th>Type</th>
                    <th>Action</th>
                    @endif

                    @if(auth()->user()->type === 'account')
                    <th>SR(FIBER) / Temp No.</th>
                    <th>Type</th>
                    <th>Final Amount</th>
                    <th>Party</th>
                    <th>Action</th>
                    @endif


            </thead>
            <tbody>
                @foreach ($reports as $index => $report)
                {{-- {{dd($reports);}} --}}
                @php
                $type = auth()->user()->type;
                $temp = $report->temp;
                $status = $report->status;
                $sale_status = $report->sale_status;
                $part = $report->part;
               

                @endphp
                <tr
                    class="{{ $report->part == 0 ? 'new-part' : ($report->part == 1 ? 'repair-part' : 'unknown-part') }}">
                    <td style="background-color: {{ $report->status == 1 ? 'green' : ($report->status == 2 ? 'red' : 'inherit') }}">
                        {{ $report->id }}</td>
                    <td>{{ $report->part === 0 ? 'New' : ($report->part == 1 ? 'Repair' : 'Unknown') }}</td>
                    <td>{{ $report->f_status === 0 ? 'No warranty' : ($report->f_status == 1 ? 'Warranty' : 'Unknown')
                        }}</td>
                    @if(auth()->user()->type === 'godown')
                    <td>{{ $report->sr_no_fiber ?? $report->temp }}</td>
                    @endif
                    <td>{{ $report->created_at->format('d-m-Y') }}</td>
                    <td> @switch($report->section)
                        @case(0)
                        Mainstore
                        @break
                        @case(1)
                        Manufacture
                        @break
                        @case(2)
                        Repair
                        @break
                        @case(3)
                        Baddesk
                        @break
                        @case(4)
                        Sell
                        @break
                        @default
                        Unknown
                        @endswitch
                    </td>
                    @if ($type === 'electric')
                    <td>{{ $report->sr_no_fiber ?? $report->temp }}</td>
                    <td>{{ $report->note1 }}</td>
                    <td> @if ($type === 'electric')
                        <a href="{{ route('report.edit', $report->id) }}" class="btn btn-info">Edit</a>
                        @endif
                    </td>
                    @endif
                    @if ($type === 'cavity')

                    <td>{{ $report->sr_no_fiber ?? $report->temp }}</td>
                    <td>{{ $report->note1 }}</td>
                    <td>
                        <a href="{{ route('report.edit', $report->id) }}" class="btn btn-info">Edit</a>
                    </td>
                    @endif
                    @if($type === 'user')
                    <td>{{ $report->sr_no_fiber ?? $report->temp }}</td>
                    <td>{{ $report->note1 }} ,{{ $report->note2 }} </td>
                    <td>{{ $report->tbl_type->name ?? null}}</td>
                    <td><a href="{{ route('report.edit', $report->id) }}" class="btn btn-info">Edit</a>
                    </td>
                    @endif
                    @if ($type === 'admin' )
                    <td>{{ $report->sr_no_fiber ?? $report->temp }}</td>
                    <td>{{ $report->tbl_type->name ?? 0 }}</td>
                    <td>{{ $report->worker_name }}</td>
                    <td>{{ $report->final_amount }}</td>
                    <td>
                        @php
                        $isSale = $report->sale_status;
                        @endphp
                        @if ($isSale == 1)
                        Sale
                        @elseif ($isSale == 0)
                        Nosale
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
                        <a href="{{ route('report.show', $report->id) }}" class="btn btn-sm btn-primary"><i
                                class="ri-eye-fill"></i></a>
                        <a href="{{ route('report.edit', $report->id) }}" class="btn btn-sm btn-warning"> <i
                                class="ri-pencil-fill"></i> </a>
                        @if (auth()->user()->type === 'admin')    
                                <form action="{{ route('report.destroy', $report->id) }}" method="POST"
                                    style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                            onclick="return confirm('Are you sure you want to delete this sale?');"
                            class="btn btn-sm  btn-danger">
                            <i class="ri-delete-bin-fill"></i>
                            </button>
                        </form>
                        @endif
                    </td>
                    @endif
                    @if(auth()->user()->type === 'account')

                    <td>{{ $report->sr_no_fiber ?? $report->temp }}</td>
                    <td>{{ $report->tbl_type->name ?? 'N/A' }}</td>
                    <td>{{ $report->final_amount }}</td>
                    <td>{{ $report->customer->customer_name ?? "N/A" }}</td>
                    <td> <a href="{{ route('report.show', $report->id) }}" class="btn btn-primary"> <i
                                class="ri-eye-fill"></i></a>
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