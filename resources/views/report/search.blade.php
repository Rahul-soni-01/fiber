<x-layout>
    <x-slot name="title">Search Report</x-slot>
    <x-slot name="main">
        <div class="main" id="main">

            <form method="GET" action="{{route('report.search')}}" class="row">
                <input type="number" name="sr_no" placeholder="Enter SR No." class="input-number form-control col-md-6"
                    value="{{ request('sr_no') }}" required />
                <button type="submit" class="col-md-1 btn btn-grey">Search</button>
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

                @php
                $itemsForReport = $reportitems->where('report_id', $report->id);
                @endphp


                @if($itemsForReport->isEmpty())
                <p>No items found for this report.</p>
                @else
                @foreach($itemsForReport as $reportitem)
                {{-- {{dd($reportitem)}} --}}
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
                        <span class="float-right">
                            @if($reportitem->dead_status == 0)
                            <span class="badge badge-success">Active</span>
                            @elseif($reportitem->dead_status == 1)
                            <span class="badge badge-danger">Dead</span>
                            {{-- Dead Stock --}}
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

        </div>
    </x-slot>
</x-layout>