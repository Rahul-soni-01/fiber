@extends('demo')
@section('title', 'Report')
@section('content')
<h1>Report</h1>
<a href="{{ route('generate-pdf', ['report' => $report->id]) }}" class="btn btn-primary mb-3"
    id="download-btn1212">Download PDF</a>
<div class="container-fluid custom-border">
    <div class="row mt-4 ">
        <div class="col-md-3 col-sm-3">
            <h5>Part</h5>
        </div>
        <div class="col-md-2 col-sm-2">
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
        <div class="col-md-2 col-sm-2">
            <h5>Temp No.</h5>
        </div>
        <div class="col-md-3 col-sm-3">
            <h5>WORKER NAME</h5>
        </div>
        <div class="col-md-2 col-sm-2">
            <span>{{ $report->worker_name }}</span>
        </div>
    </div>
    @if(auth()->user()->type === 'account' || auth()->user()->type === 'electric' || auth()->user()->type
    === 'admin' || auth()->user()->type === 'user')
    <div class="row mt-4 ">
        <div class="col-md-3">

            <h5>SR(FIBER)</h5>

        </div>
        <div class="col-md-2">

            <span>{{ $report->sr_no_fiber ?? 'N/A'}}</span>

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
            <span>{{ $report->tbl_type->name ?? 'N/A' }}</span>
        </div>
    </div>

    <div class="table-responsive">

        <table class="table text-dark datatable-remove">
            <thead class="bg-dark text-white">
                <tr>
                    <th>ITEM</th>
                    <th>SR / Qty</th>
                    <th>AMP</th>
                    <th>VOLT</th>
                    <th>WATT</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reportitems as $reportitem)
                <tr>
                    <td>
                        <strong>{{ $reportitem->tbl_sub_category->category->category_name }} - {{
                            $reportitem->tbl_sub_category->sub_category_name }}</strong>
                    </td>
                    <td>{{ $reportitem->sr_no }} / {{ $reportitem->used_qty }}</td>
                    <td>{{ $reportitem->amp }}</td>
                    <td>{{ $reportitem->volt }}</td>
                    <td>{{ $reportitem->watt }}</td>
                    <td>
                        @if($reportitem->dead_status == 0)
                        <span class="badge bg-success">Active</span>
                        @elseif($reportitem->dead_status == 1)
                        <span class="badge bg-danger">Dead</span>
                        @else
                        Unknown
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @php
    $extraData = json_decode($report->extra_line, true);
    @endphp

    @if(!empty($extraData))
    @foreach($extraData as $key => $value)
    <div class="row mt-4 ">
        <div class="col-md-3">
            <strong>{{ $key }}</strong>
        </div>
        <div class="col-md-9">
            <span>{{ $value ?? 'N/A' }}</span>
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
        <div class="row mt-4">
            <div class="col-md-3">
                <strong>
                    {{ $report->indate ? 'In Date' : 'Created Date' }}
                </strong>
            </div>
            <div class="col-md-9">
                <span>{{ \Carbon\Carbon::parse($report->indate ?? $report->created_at)->format('Y-m-d') }}</span>

                <br>
                <span>{{ $report->outdate }}</span>
            </div>
        </div>

        <div class="row mt-4 ">
            <div class="col-md-3">
                <strong>Report Status</strong> :-
            </div>
            <div class="col-md-9">
                @if($report->status == '1')
                <span class="badge bg-success"> Verified</span>
                @elseif($report->status == '2')
                <span class="badge bg-danger">Rejected</span>
                @else
                <span class="badge bg-primary">Pending</span>
                @endif
            </div>
            @if(auth()->user()->type == 'account')
            <small class="text-dark">*Leave it unchanged if you don't want to update the status.</small>
            @endif
        </div>
        @if(auth()->user()->type == 'account' && $report->sale_status == '0' && $report->status !== '1' && ($report->section == '1' || $report->section == '2'))
        
        <form action="{{ route('report.update', $report->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mt-4 ">
                <div class="col-md-3"></div>
                <div class="col-md-9">
                    <button class="btn btn-success" name="status" value="1">Verify</button>
                    <button class="btn btn-danger" name="status" value="2">Reject</button>
                </div>
            </div>
            <div class="row mt-4 ">
                <div class="col-md-3">In-Date</div>
                <div class="col-md-3">
                    <input type="date" id="indate" name="indate" class="form-control" placeholder="Enter Date"
                        value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <strong>Remark</strong>
                </div>
                <div class="col-md-9">
                    <textarea id="remark" name="remark"
                        class="form-control">{{ old('remark', $report->remark) }}</textarea>
                </div>
            </div>
        </form>
        @endif
    </div>
    @endsection