@extends('demo')
@section('title','Report')
@section('content')
<h1>Report</h1>
@if ($errors->any())
<div style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="main" id="main">
    <form action="{{ route('report.update', $report->id) }}" method="POST" id="report-form">
        @csrf
        @method('PUT')
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row mb-3">
            @if( auth()->user()->type === 'godown')
            <div class="col-12 col-md-2">
                <h5>Customer Name</h5>
            </div>
            <div class="col-12 col-md-3">
                <select id="party_name" name="party_name" class="form-control" required>
                    <option value="" disabled>Choose a Customer</option>
                    @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $customer->id == $report->party_name ? 'selected' : '' }}>{{
                        $customer->customer_name }}</option>
                    @endforeach
                </select>
            </div>
            @endif
            <div class="col-md-3">In-Date</div>
            <div class="col-md-3">
                <input type="date" id="indate" name="indate" class="form-control" placeholder="Enter Date"
                    value="{{ old('indate', isset($report->indate) ? \Carbon\Carbon::parse($report->indate)->format('Y-m-d') : \Carbon\Carbon::now()->format('Y-m-d')) }}"
                    required>
            </div>
        </div>
        {{-- {{ dd($report);}} --}}
        <div id="Tbody">
            @if(in_array(auth()->user()->type, ['electric', 'admin', 'cavity', 'user','godown']))
            <div class="row mt-3">
                <div class="col-md-2">
                    <h5>Part</h5>
                </div>
                <div class="col-md-3">
                    <select id="part1" name="part" class="form-control" @if(in_array(auth()->user()->type,
                        ['cavity'])) readonly @endif>
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
                @if(in_array(auth()->user()->type, ['admin','user','electric', 'cavity']))
                <div class="col-md-2">
                    <h5>Temp no.</h5>
                </div>
                <div class="col-md-2">
                    <h5>EMPLOYEE NAME</h5>
                </div>
                @endif
                <div class="col-md-3">
                    @if(in_array(auth()->user()->type, ['admin','user','electric', 'cavity']))
                    <input type="text" id="wn" name="worker_name" class="form-control" placeholder="Enter Worker Name"
                        value="{{ old('worker_name', $report->worker_name) }}" @if(in_array(auth()->user()->type,
                    ['electric', 'cavity']))
                    readonly @endif >
                    @endif
                </div>
            </div>
            @endif
            @if(in_array(auth()->user()->type, ['admin', 'user', 'electric', 'cavity','godown']))
            <div class="row mt-3">
                <div class="col-md-2">
                    @if(in_array(auth()->user()->type, ['admin', 'user', 'electric', 'cavity','godown']))
                    <h5>SR(FIBER)</h5>
                    @endif
                </div>
                <div class="col-md-3">
                    @if(in_array(auth()->user()->type, ['admin', 'user', 'electric', 'cavity','godown']))
                    <input type="text" id="srfiber" name="sr_no_fiber" class="form-control"
                        placeholder="Enter SR No Fiber" value="{{ old('sr_no_fiber', $report->sr_no_fiber) }}"
                        @if(in_array(auth()->user()->type,
                    ['electric', 'cavity'])) readonly @endif>
                    @endif
                </div>
                @if(in_array(auth()->user()->type, ['admin', 'user', 'electric', 'cavity']))
                <div class="col-md-2">
                    <input type="text" id="temp" name="temp" class="form-control" placeholder="Enter Body/ Temp No"
                        value="{{ old('temp', $report->temp) }}" @if(in_array(auth()->user()->type, ['cavity']))
                    readonly @endif>
                </div>
                <div class="col-md-2">
                    <h5>M.J</h5>
                </div>
                @endif
                <div class="col-md-3">
                    @if(in_array(auth()->user()->type, ['admin', 'user', 'electric', 'cavity',]))
                    <input type="text" id="mj" name="m_j" class="form-control" placeholder="Enter M/J Value"
                        value="{{ old('m_j', $report->m_j) }}" @if(in_array(auth()->user()->type, ['electric',
                    'cavity'])) readonly @endif>
                    @endif
                </div>
            </div>
            @endif
            @if(in_array(auth()->user()->type, ['admin', 'user', 'cavity','electric','godown']))
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
                    @if(in_array(auth()->user()->type, ['admin', 'user', 'electric', 'cavity','godown']))
                    <h5>Type</h5>
                    @endif
                </div>
                <div class="col-md-3">
                    @if(in_array(auth()->user()->type, ['admin', 'user', 'electric', 'cavity','godown']))
                    <select id="type1" name="type" class="form-control" required @if(in_array(auth()->user()->type,
                        ['electric', 'cavity'])) readonly @endif>
                        <option value="" disabled selected>Select Type</option>
                        @foreach($types as $type)
                        <option value="{{$type->id}}" @if($type->id == $report->type) selected
                            @endif>{{$type->name}}
                        </option>
                        @endforeach
                    </select>
                    @endif
                </div>
            </div>
            @endif
            @if (!in_array(auth()->user()->type, ['godown']))
                
            <div class="container-fluid">
                <div class="row mt-3">
                    <!-- Empty Columns -->
                    <div class="col-12 col-md-2"></div>
                    <div class="col-12 col-md-2"></div>
                    <div class="col-12 col-md-2"></div>
                    <!-- Button Column -->
                    <div class="col-12 col-md-4 text-right">
                        <button type="button" onclick="NewReportCreateRow({{ json_encode($all_sub_categories) }})"
                        class="btn btn-dark">
                        Add
                    </button>
                    </div>
                    <div class="col-12 col-md-2"></div>
                </div>
            </div>
            
            @endif
            <div class="row mt-3">
                <div class="col-md-3">
                    <h5>ITEM</h5>
                </div>
                <div class="row col-md-9">
                    <div class="col-md-3">
                        <h5>SR</h5>
                    </div>
                    <div class="col-md-2">
                        <h5>WATT</h5>
                    </div>
                    <div class="col-md-2">
                        <h5>WALT</h5>
                    </div>
                    <div class="col-md-3">
                        <h5>AMP.</h5>
                    </div>
                    <div class="col-md-2">
                        <h5>Dead/Action</h5>
                    </div>
                </div>
            </div>
            {{-- {{ dd($reportitems)}} --}}
            @foreach($reportitems as $index => $reportitem)
            <div class="row mt-4 align-items-center" id="row_{{$index+1}}">
                <div class="col-12 col-md-2 d-flex">
                    <select required onchange="tbl_stock({{$index+1}});" id="subcategory_{{$index+1}}"
                        name="sub_category[]" class="tbl_sub ml-2 form-control">
                        <option value="" selected disabled>Select</option>
                        @foreach($all_sub_categories as $key => $sub_category)
                        <option value="{{$sub_category->id}}" data-unit="{{$sub_category->unit}}"
                            data-sr_no="{{$sub_category->sr_no}}" @if($sub_category->id == $reportitem->scid)
                            selected @endif>
                            {{$sub_category->category->category_name}} - {{$sub_category->sub_category_name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-10" id="col_{{$index+1}}">
                    <div class="row" id="row_{{$index+1}}">
                        <input type="hidden" name="sr_no_or_not[]" value="{{$reportitem->tbl_sub_category->sr_no}}">
                        <div class="col-12 col-md-3">
                            @if($reportitem->sr_no != 0)
                            <input type="hidden" name="used_qty[]" value="1">
                            {{-- <input type="text" name="srled[]" list="srled_{{$index+1}}" class="form-control"
                                placeholder="Select or enter a new sr no, Small Alpha Plz" required
                                value="{{$reportitem->sr_no}}">
                            <datalist id="srled_{{$index+1}}">
                                <option value="{{$reportitem->sr_no}}" selected>{{$reportitem->sr_no}} </option>
                            </datalist> --}}
                            <select name="srled[]" class="form-control select2" id="srled_{{$index+1}}" required>
                                <option value="{{$reportitem->sr_no}}" selected>{{$reportitem->sr_no}}</option>
                                <!-- Add more options here if needed -->
                            </select>
                            @else
                            <input type="hidden" name="srled[]" value="0">
                            <input type="number" id="used_qty_{{$index+1}}" value="{{$reportitem->used_qty}}"
                                name="used_qty[]" class="form-control" placeholder="Enter Qty">
                            @endif
                        </div>
                        <div class="col-md-2">
                            @if($reportitem->sr_no != 0)
                            <input type="text" id="ampled_1" name="wattled[]" class="form-control"
                                value="{{ $reportitem->watt }}" placeholder="Enter Watt">
                            @else
                            <input type="hidden" id="ampled_1" name="wattled[]" class="form-control"
                                value="{{ $reportitem->watt }}" placeholder="Enter Watt">
                            @endif
                        </div>
                        <div class="col-md-2">
                            @if($reportitem->sr_no != 0)
                            <input type="text" id="ampled_1" name="voltled[]" class="form-control"
                                value="{{ $reportitem->volt }}" placeholder="Enter Volt">
                            @else
                            <input type="hidden" id="ampled_1" name="voltled[]" class="form-control"
                                value="{{ $reportitem->volt }}" placeholder="Enter Volt">
                            @endif
                        </div>
                        <div class="col-12 col-md-5 d-flex justify-content-between">

                            @if($reportitem->sr_no != 0)
                            <input type="text" id="ampled_1" name="ampled[]" class="form-control"
                                value="{{ $reportitem->amp }}" placeholder="Enter AMP">
                            @else
                            <input type="hidden" id="ampled_1" name="ampled[]" class="form-control"
                                value="{{ $reportitem->amp }}" placeholder="Enter AMP">
                            @endif
                            <input type="hidden" name="dead[]" value="0" class="hidden-dead-{{$index+1}}"
                                @if($reportitem->dead_status == '1') disabled @endif>
                            <input type="checkbox" name="dead[]" value="1" class="m-2" @if($reportitem->dead_status
                            ==
                            '1') checked @endif
                            onchange="syncHiddenInput(this, {{$index+1}})">
                            <lable class="m-2">Dead</lable>
                            <button type="button" onclick="NewremoveRow(this)" class="btn btn-danger margin-btn"
                                id="1">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <script>
                let row = {{ count($reportitems); }}+1;
            </script>
            <div id="TBody" class="mt-4"></div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <h5>NOTE</h5>
                </div>
                <div class="col-md-9">
                    <textarea id="note1" name="note1" class="form-control">{{ old('note1', $report->note1) }}</textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-9 offset-md-3">
                    <textarea id="note2" name="note2" class="form-control">{{ old('note2', $report->note2) }}</textarea>
                </div>
            </div>
            {{-- @if(in_array(auth()->user()->type, ['admin', 'user'])) --}}
            <div class="row mt-3">
                <div class="col-md-3">
                    <h5>Remark</h5>
                </div>
                <div class="col-md-9">
                    <textarea id="remark" name="remark"
                        class="form-control">{{ old('remark', $report->remark) }}</textarea>
                </div>
            </div>
            {{-- @endif --}}
        </div>
        <button type="button" id="submit-button" class="btn btn-success">SUBMIT</button>
</div>
@endsection