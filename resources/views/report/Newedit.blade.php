<x-layout>
    <x-slot name="title">Edit {{auth()->user()->type}} Report</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <form action="{{ route('report.update', $report->id) }}" method="POST">
                @csrf
                @method('PUT')

                @if ($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div id="Tbody">
                    @if(in_array(auth()->user()->type, ['electric', 'admin', 'cavity', 'user']))
                    <div class="row mt-3">
                        <div class="col-md-2">
                            <h5>Part</h5>
                        </div>
                        <div class="col-md-3">
                            <select id="part" name="part" class="form-control" @if(in_array(auth()->user()->type,
                                ['electric', 'cavity'])) readonly @endif>
                                <option value="" disabled {{ old('part', $report->part ?? null) === null ? 'selected' :
                                    '' }}>
                                    Select Part
                                </option>
                                <option value="0" {{ old('part', $report->part ?? null) === 0 ? 'selected' : '' }}>New
                                </option>
                                <option value="1" {{ old('part', $report->part ?? null) === 1 ? 'selected' : ''
                                    }}>Repairing</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <h5>Temp no.</h5>
                        </div>
                        <div class="col-md-2">
                            @if(in_array(auth()->user()->type, ['admin','user','electric', 'cavity']))
                            <h5>WORKER NAME</h5>
                            @endif
                        </div>
                        <div class="col-md-3">
                            @if(in_array(auth()->user()->type, ['admin','user','electric', 'cavity']))
                            <input type="text" id="wn" name="worker_name" class="form-control"
                                placeholder="Enter Worker Name" value="{{ old('worker_name', $report->worker_name) }}"
                                @if($report->part == 1 && in_array(auth()->user()->type, ['electric', 'cavity'])) readonly @endif
                                >
                                @endif
                            </div>
                    </div>
                    @endif

                    @if(in_array(auth()->user()->type, ['admin', 'user', 'electric', 'cavity']))
                    <div class="row mt-3">
                        <div class="col-md-2">
                            @if(in_array(auth()->user()->type, ['admin', 'user', 'electric', 'cavity']))
                            <h5>SR(FIBER)</h5>
                            @endif
                        </div>
                        <div class="col-md-3">
                            @if(in_array(auth()->user()->type, ['admin', 'user', 'electric', 'cavity']))
                            <input type="text" id="srfiber" name="sr_no_fiber" class="form-control"
                                placeholder="Enter SR No Fiber" value="{{ old('sr_no_fiber', $report->sr_no_fiber) }}"
                                @if(in_array(auth()->user()->type,
                                ['electric', 'cavity'])) readonly @endif>
                                @endif
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="temp" name="temp" class="form-control"
                                placeholder="Enter Temperature" value="{{ old('temp', $report->temp) }}"
                                @if(in_array(auth()->user()->type, ['electric', 'cavity'])) readonly @endif>
                        </div>
                        <div class="col-md-2">
                            @if(in_array(auth()->user()->type, ['admin', 'user', 'electric', 'cavity']))
                            <h5>M.J</h5>
                            @endif
                        </div>
                        <div class="col-md-3">
                            @if(in_array(auth()->user()->type, ['admin', 'user', 'electric', 'cavity']))
                            <input type="text" id="mj" name="m_j" class="form-control" placeholder="Enter M/J Value"
                                value="{{ old('m_j', $report->m_j) }}" @if(in_array(auth()->user()->type, ['electric', 'cavity'])) readonly @endif>
                            @endif
                        </div>
                    </div>
                    @endif

                    @if(in_array(auth()->user()->type, ['admin', 'user', 'cavity','electric']))
                    <div class="row mt-3">
                        <div class="col-md-2">
                            <h5>Warranty</h5>
                        </div>
                        <div class="col-md-3">
                            <select id="warranty" name="warranty" class="form-control" required
                                @if(in_array(auth()->user()->type, ['electric', 'cavity'])) disabled @endif>
                                <option value="" disabled>Select Warranty Status</option>
                                <option value="0" {{ $report->f_status == '0' ? 'selected' : '' }}>No Warranty</option>
                                <option value="1" {{ $report->f_status == '1' ? 'selected' : '' }}>Warranty</option>
                            </select>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            @if(in_array(auth()->user()->type, ['admin', 'user', 'electric', 'cavity']))
                            <h5>Type</h5>
                            @endif
                        </div>
                        <div class="col-md-3">
                            @if(in_array(auth()->user()->type, ['admin', 'user', 'electric', 'cavity']))
                            <select id="type" name="type" class="form-control" required @if(in_array(auth()->user()->type, ['electric', 'cavity'])) readonly @endif>
                                <option value="">Select Type</option>
                                <option value="15" {{ old('type', $report->type) == '15' ? 'selected' : '' }}>15
                                </option>
                                <option value="18" {{ old('type', $report->type) == '18' ? 'selected' : '' }}>18
                                </option>
                                <option value="21" {{ old('type', $report->type) == '21' ? 'selected' : '' }}>21
                                </option>
                                <option value="26" {{ old('type', $report->type) == '26' ? 'selected' : '' }}>26
                                </option>
                            </select>
                            @endif
                        </div>
                    </div>
                    @endif
                    <div class="container-fluid">
                        <div class="row mt-3">
                            <!-- Empty Columns -->
                            <div class="col-12 col-md-2"></div>
                            <div class="col-12 col-md-2"></div>
                            <div class="col-12 col-md-2"></div>

                            <!-- Button Column -->
                            <div class="col-12 col-md-4 text-right">
                                <button type="button"
                                    onclick="NewReportCreateRow({{ json_encode($all_sub_categories) }})"
                                    class="btn btn-dark">
                                    Add
                                </button>
                            </div>
                            <div class="col-12 col-md-2"></div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <h5>ITEM</h5>
                        </div>
                        <div class="row col-md-9">
                            <div class="col-md-3">
                                <h5>SR</h5>
                            </div>
                            <div class="col-md-2">
                                <h5>AMP.</h5>
                            </div>
                            <div class="col-md-2">
                                <h5>VOLT</h5>
                            </div>
                            <div class="col-md-3">
                                <h5>WATT</h5>
                            </div>
                            <div class="col-md-2">
                                <h5>Dead/Action</h5>
                            </div>
                        </div>
                    </div>
                    @foreach($reportitems as $reportitem)
                    
                    <div class="row mt-4 ">
                        <div class="col-md-3">
                            <strong>{{ $reportitem->tbl_sub_category->category->category_name}}:- {{ $reportitem->tbl_sub_category->sub_category_name }}</strong>
                        </div>
                        <div class="row col-md-9">
                            <div class="col-md-3">
                                <span>{{ $reportitem->sr_no }}</span>
                            </div>
                            <div class="col-md-2">
                                <span>{{ $reportitem->amp }}</span>
                            </div>
                            <div class="col-md-2">
                                <span>{{ $reportitem->volt }}</span>
                            </div>
                            <div class="col-md-3">
                                <span>{{ $reportitem->watt }}</span>
                               
                            </div>
                            <div class="col-md-2">
                                <span >
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
                    </div>
                    @endforeach

                    <div id="TBody" class="mt-4"></div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <h5>NOTE</h5>
                        </div>
                        <div class="col-md-9">
                            <textarea id="note1" name="note1"
                                class="form-control">{{ old('note1', $report->note1) }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-9 offset-md-3">
                            <textarea id="note2" name="note2"
                                class="form-control">{{ old('note2', $report->note2) }}</textarea>
                        </div>
                    </div>

                    

                    @if(in_array(auth()->user()->type, ['admin', 'user']))
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <h5>Remark</h5>
                        </div>
                        <div class="col-md-9">
                            <textarea id="remark" name="remark"
                                class="form-control">{{ old('remark', $report->remark) }}</textarea>
                        </div>
                    </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-success">SUBMIT</button>
        </div>
    </x-slot>
</x-layout>