@extends('demo')
@section('title', 'Report')
@section('content')
<h1>Report</h1>
<form method="GET" action="{{route('report.search')}}" class="row">
    <input type="text" name="sr_no" placeholder="Enter SR No." class="input-number form-control col-md-6"
        value="{{ request('sr_no') }}" required />
    <button type="submit" class="col-md-1 btn btn-info mt-2">Search</button>
</form>
<div class="row mt-4">
    <div class="col">
        @if(isset($reports) && $reports->isNotEmpty())
        @php
        // Calculate the total amount
        $amount = $reports->sum('final_amount');
        @endphp
        <h5>Total Amount: {{ $amount }}</h5>
        @endif
    </div>
</div>
{{--
@if(isset($reports) && $reports->isNotEmpty())
@foreach($reports as $report)
<div class="container-fluid border mt-3">
    <div class="d-flex justify-content-center align-items-center">
        <div class="row mt-4">
            <div class="col">
                <h5> Date : {{ $report->updated_at->format('d-m-Y') }}</h5>
            </div>
        </div>
    </div>
    <div class="row mt-4 ">
        <div class="col-md-3">
            <h5>Part</h5>
        </div>
        <div class="col-md-2">
            <span>
                @if($report->part == 0)
                New
                @elseif($report->part == 1)
                Repair
                @else
                Unknown
                @endif
            </span>
        </div>
        <div class="col-md-2">
            <h5>Temp No.</h5>
        </div>
        <div class="col-md-3">
            <h5>WORKER NAME</h5>
        </div>
        <div class="col-md-2">
            <span>{{ $report->worker_name }}</span>
        </div>
    </div>
    @if(auth()->user()->type === 'account' || auth()->user()->type === 'electric' || auth()->user()->type
    === 'admin' || auth()->user()->type === 'user')
    <div class="row mt-4 ">
        <div class="col-md-3">
            @if(auth()->user()->type === 'account' ||auth()->user()->type == 'admin' || auth()->user()->type
            === 'user' )
            <h5>SR(FIBER)</h5>
            @endif
        </div>
        <div class="col-md-2">
            @if(auth()->user()->type === 'account' || auth()->user()->type == 'admin' ||
            auth()->user()->type === 'user')
            <span>{{ $report->sr_no_fiber }}</span>
            @endif
        </div>
        <div class="col-md-2">
            @if(auth()->user()->type == 'admin' || auth()->user()->type === 'electric')
            <span>{{ $report->temp }}</span>
            @endif
        </div>
        <div class="col-md-3">
            @if(auth()->user()->type === 'account' || auth()->user()->type == 'admin'|| auth()->user()->type
            === 'user')
            <h5>M.J</h5>
            @endif
        </div>
        <div class="col-md-2">
            @if(auth()->user()->type === 'account' || auth()->user()->type == 'admin' ||
            auth()->user()->type === 'user')
            <span>{{ $report->m_j }}</span>
            @endif
        </div>
    </div>
    @endif
    <div class="row mt-4 ">
        <div class="col-md-3">
            <h5>Warranty</h5>
        </div>
        <div class="col-md-2">
            <span>
                @if($report->f_status == 0)
                No warranty
                @elseif($report->f_status == 1)
                In Warranty
                @else
                Unknown
                @endif
            </span>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-3">
            <h5>Type</h5>
        </div>
        <div class="col-md-2">
            <span>{{ $report->tbl_type->name ?? null }}</span>
        </div>
    </div>
    <div class="row mt-4 ">
        <div class="col-md-3">
            <h5>ITEM</h5>
        </div>
        <div class="col-md-2">
            <h5>SR</h5>
        </div>
        <div class="col-md-2">
            <h5>AMP</h5>
        </div>
        <div class="col-md-3">
            <h5>VOLT</h5>
        </div>
        <div class="col-md-2">
            <h5>WATT</h5>
        </div>
    </div>
    @php
    $itemsForReport = $reportitems->where('report_id', $report->id);
    @endphp
    @if($itemsForReport->isEmpty())
    <p>No items found for this report.</p>
    @else
    @foreach($itemsForReport as $reportitem)
    <div class="row mt-4 ">
        <div class="col-md-3">
            <strong>{{ $reportitem->tbl_sub_category->category->category_name}} - {{
                $reportitem->tbl_sub_category->sub_category_name }}</strong>
        </div>
        <div class="col-md-2">
            <span>{{ $reportitem->sr_no }}</span>
        </div>
        <div class="col-md-2">
            <span>{{ $reportitem->amp }}</span>
        </div>
        <div class="col-md-3">
            <span>{{ $reportitem->volt }}</span>
        </div>
        <div class="col-md-2">
            <span>{{ $reportitem->watt }}</span>
            <span class="float-end">
                @if($reportitem->dead_status == 0)
                <span class="badge bg-success">Active</span>
                @elseif($reportitem->dead_status == 1)
                <span class="badge bg-danger">Dead</span>
                @else
                Unknown
                @endif
            </span>
        </div>
    </div>
    @endforeach
    @endif
    <div class="row mt-4 ">
        <div class="col-md-3">
            <strong>NOTE</strong>
        </div>
        <div class="col-md-9">
            <span>{{ $report->note1 }}</span>
            <br>
            <span>{{ $report->note2 }}</span>
        </div>
    </div>
</div>
@endforeach
@endif
--}}
@if(!empty($sortedResults) && $sortedResults->isNotEmpty())
<table class="table text-dark">
    <thead class="table-dark text-white">
        <tr>
            <th>#</th>
            <th>SR No</th>
            <th>Part</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sortedResults as $key => $result)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $result->sr_no }}</td>
            <td>
                @if($result->table_name === 'tbl_reports')
                {{ $result->part === 0 ? 'New :- Manufacturing' : ($result->part == 1 ? 'Repair' : '') }}
                @if($result->part === 0)
                | Current Section: <strong class="bg-primary"> @switch($result->section)
                    @case(0) Mainstore @break
                    @case(1) Manufactur @break
                    @case(2) Repair @break
                    @case(3) Baddesk @break
                    @case(4) Sell @break
                    @default Unknown
                    @endswitch
                </strong>
                @endif
                @elseif($result->table_name === 'tbl_sales_items')
                Invoice No:- {{ $result->sale_id}}, @switch($result->status)
                @case(0)
                <span class="badge bg-success">Sale</span>
                @break
                @case(1)
                <span class="badge bg-primary">Demo</span>
                @break
                @case(2)
                <span class="badge bg-warning text-dark">Standby</span>
                @break
                @case(3)
                <span class="badge bg-danger">Replacement</span>
                @break
                @case(4)
                <span class="badge bg-info text-dark">Standby Return</span>
                @break
                @default
                <span class="badge bg-secondary">Unknown</span>
                @endswitch:- {{$result->customer_name ?? 'sales item' }}
                @elseif($result->table_name === 'tbl_sale_returns')
                Sale Return:- Invoice No:- {{ $result->sale_id}}
                @elseif($result->table_name === 'tbl_stock')
                {{$result->category_name}} || {{ $result->sub_category_name}}
                @elseif($result->table_name === 'tbl_report_items')
                Fiber SR NO:- {{ $result->report->sr_no_fiber ?? $result->report->temp ?? 'N/A'}}
                @if(!empty($result->report) && $result->report->part === 0)
                | Current Section: <strong class="bg-primary"> @switch($result->section)
                    @case(0) Mainstore @break
                    @case(1) Manufactur @break
                    @case(2) Repair @break
                    @case(3) Baddesk @break
                    @case(4) Sell @break
                    @default Unknown
                    @endswitch
                </strong>
                @endif
                @elseif($result->table_name === 'replacements')
                <span class="badge bg-warning">Replaced</span>
                ({{ $result->old_sr_no }} → {{ $result->new_sr_no }})
                @endif
            </td>
            <td>{{ \Carbon\Carbon::parse($result->date)->format('d-M-Y') }}</td>
            <td>
                @if($result->table_name === 'tbl_reports')
                <a href="{{ route('report.show', $result->id) }}" class="btn btn-sm btn-primary">
                    <i class="ri-eye-fill"></i>
                </a>
                @elseif($result->table_name === 'tbl_sales_items')
                <a class="btn btn-sm btn-primary" href="{{ route('sale.show', ['sale_id' => $result->invoice_no]) }}"><i
                        class="ri-eye-fill"></i></a>

                @elseif($result->table_name === 'tbl_sale_returns')
                <a class="btn btn-sm btn-primary" href=""><i class="ri-eye-fill"></i></a>
                @elseif($result->table_name === 'tbl_stock')
                <a class="btn btn-sm btn-primary"
                    href="{{ route('add_sr_no', ['invoice_no' => $result->invoice_no,'category' => $result->cid,'subcategory' => $result->scid,'unit' =>$result->unit,'qty' =>$result->qty,'price'=>$result->price]) }}"><i
                        class="ri-eye-fill"></i></a>
                @elseif($result->table_name === 'tbl_report_items')
                <a class="btn btn-sm btn-primary" href="{{ route('report.show', $result->report_id) }}"><i
                        class="ri-eye-fill"></i></a>
                @endif
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
@endif

@if (!empty($sortedResults) && $sortedResults->isNotEmpty())
    <div class="report-container mt-4">
        @foreach($sortedResults as $key => $result)
            @if($result->table_name === 'tbl_reports')
                <div class="report-card card shadow-sm mb-4">
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="bi bi-calendar-check me-2"></i>
                            IN Date: {{ $result->indate ?? $result->created_at->format('d-m-Y') }}
                        </h5>
                        <span class="badge bg-{{ $result->part === 0 ? 'primary' : 'warning' }}">
                            {{ $result->part === 0 ? 'New (Manufacturing)' : ($result->part == 1 ? 'Repair' : 'Other') }}
                        </span>
                    </div>
                    
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0 datatable-remove text-dark">
                                <thead class="table-light">
                                    <tr>
                                        <th class="min-w-200">Category - Subcategory</th>
                                        <th>Serial No / Used Qty</th>
                                        <th class="text-end">Amp</th>
                                        <th class="text-end">Volt</th>
                                        <th class="text-end">Watt</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($result->reportItems as $reportitem)
                                    <tr>
                                        <td>
                                            <div class="fw-semibold">{{ $reportitem->tbl_sub_category->category->category_name }}</div>
                                            <div class="text-muted small">{{ $reportitem->tbl_sub_category->sub_category_name }}</div>
                                        </td>
                                        <td>
                                            <div> Qty: {{ $reportitem->used_qty }}</div>
                                            <div class="text-muted small"> {{ $reportitem->sr_no ?: 'N/A' }}</div>
                                        </td>
                                        <td class="text-end">{{ $reportitem->amp ?: '-' }}</td>
                                        <td class="text-end">{{ $reportitem->volt ?: '-' }}</td>
                                        <td class="text-end">{{ $reportitem->watt ?: '-' }}</td>
                                        <td>
                                            @if($reportitem->dead_status == 0)
                                                <span class="badge bg-success rounded-pill">
                                                    <i class="bi bi-check-circle me-1"></i> Active
                                                </span>
                                            @elseif($reportitem->dead_status == 1)
                                                <span class="badge bg-danger rounded-pill">
                                                    <i class="bi bi-x-circle me-1"></i> Dead
                                                </span>
                                            @else
                                                <span class="badge bg-secondary rounded-pill">Unknown</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    @if($result->reportItems->isEmpty())
                        <div class="card-footer text-center text-muted py-3">
                            No items found in this report
                        </div>
                    @endif
                </div>
            @endif
        @endforeach
    </div>
@else
    <div class="alert alert-info">
        <i class="bi bi-info-circle me-2"></i> No reports found.
    </div>
@endif

<style>
    .report-card {
        border-radius: 0.5rem;
        overflow: hidden;
    }
    .table th {
        white-space: nowrap;
    }
    .bg-light-primary {
        background-color: #e3f2fd;
    }
    .min-w-200 {
        min-width: 200px;
    }
</style>

@endsection