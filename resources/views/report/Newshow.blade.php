<x-layout>
    <x-slot name="title">Show Report</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <div class="container-fluid custom-border">
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
                            @if($report->r_status == 0)
                            No warranty
                            @elseif($report->r_status == 1)
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
                        <span>{{ $report->type }}</span>
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

                @foreach($reportitems as $reportitem)
                <div class="row mt-4 ">
                    <div class="col-md-3">
                        <strong>Sub Category Name :- {{ $reportitem->tbl_sub_category->sub_category_name }}</strong>
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
                        <span class="float-right">
                            @if($reportitem->tbl_stocks->dead_status == 0)
                            <span class="badge badge-success">Active</span>
                            @elseif($reportitem->tbl_stocks->dead_status == 1)
                            <span class="badge badge-danger">Dead</span>
                            {{-- Dead Stock --}}
                            @else
                            Unknown
                            @endif
                        </span>
                    </div>
                </div>
                @endforeach

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

                @if(auth()->user()->type == 'account' )
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

        </div>
    </x-slot>
</x-layout>