@extends('demo')
@section('title', 'Report')
@section('content')
<h1>Report</h1>
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="container-fluid">
    <form action="{{route('report.stockReport')}}" method="post" id="report-form">
        @csrf
        <div class="container-fluid">
            <div class="row mb-3">
                @if( auth()->user()->type === 'godown')
                <div class="col-12 col-md-2">
                    <h5>Customer Name</h5>
                </div>
                <div class="col-12 col-md-3">
                    <select class="form-control" id="pname" name="party_name" required>
                        <option value="" disabled selected>Select</option>
                        @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                        @endforeach
                    </select>
                </div>
                @endif
            </div>
            {{-- if admin login then option for report layout append --}}
            @if( auth()->user()->type == 'admin')
            @if(auth()->user()->type === 'electric' || auth()->user()->type === 'admin')
            <div class="row mb-3">
                @if(auth()->user()->type == 'admin' || auth()->user()->type == 'electric')
                <div class="col-12 col-md-2" id="part-label">
                    <h5>Part</h5>
                </div>
                <!-- Part Dropdown -->
                <div class="col-12 col-md-3">
                    <select id="part" name="part" required class="form-control">
                        <option value="" selected disabled>Select Part</option>
                        <option value="0">New</option>
                        <option value="1">Repairing</option>
                    </select>
                </div>
                <div class="col-12 col-md-2" id="temp-label">
                    <h5>Temp no.</h5>
                </div>
                @endif
                @if(auth()->user()->type == 'admin' || auth()->user()->type == 'cavity')
                <div class="col-12 col-md-2" id="worker_name-label">
                    <h5>EMPLOYEE NAME</h5>
                </div>
                <div class="col-12 col-md-3">
                    <input type="text" id="worker_name" name="worker_name" class="form-control"
                        placeholder="Enter Worker Name">
                </div>
                @endif
            </div>
            @endif
            @if(auth()->user()->type === 'godown' || auth()->user()->type === 'electric' || auth()->user()->type ===
            'admin' || auth()->user()->type === 'user')
            <div class="row mb-3">
                @if(auth()->user()->type === 'godown' || auth()->user()->type === 'admin' ||
                auth()->user()->type === 'user')
                <!-- SR (FIBER) Label -->
                <div class="col-12 col-md-2" id="sr_no_fiber-label">
                    <h5>SR (FIBER)</h5>
                </div>
                <!-- SR (FIBER) Input -->
                <div class="col-12 col-md-3">
                    <input type="text" id="sr_no_fiber" name="sr_no_fiber" class="form-control"
                        placeholder="Enter SR No Fiber">
                </div>
                @endif
                @if(auth()->user()->type === 'electric')
                <div class="col-12 col-md-2"></div>
                <div class="col-12 col-md-3"></div>
                @endif
                @if(auth()->user()->type === 'admin' || auth()->user()->type === 'electric')
                <!-- Temporary No Input -->
                <div class="col-12 col-md-2">
                    <input type="text" id="temp" name="temp" class="form-control" placeholder="Enter Temporary No">
                </div>
                @endif
                @if(auth()->user()->type === 'admin' || auth()->user()->type === 'user')
                <!-- M.J Label -->
                <div class="col-12 col-md-2" id="mj-label">
                    <h5>M.J</h5>
                </div>
                <!-- M.J Input -->
                <div class="col-12 col-md-3">
                    <input type="text" id="mj" name="m_j" class="form-control" placeholder="Enter M/J Value">
                </div>
                @endif
            </div>
            @endif
            @if( auth()->user()->type === 'admin' || auth()->user()->type === 'user' || auth()->user()->type
            === 'godown')
            <div class="row mb-3">
                @if(auth()->user()->type == 'admin' || auth()->user()->type === 'godown')
                <!-- Warranty Label -->
                <div class="col-12 col-md-2" id="warranty-label">
                    <h5>Warranty</h5>
                </div>
                <!-- Warranty Dropdown -->
                <div class="col-12 col-md-3">
                    <select id="warranty" name="warranty" required class="form-control">
                        <option value="" selected disabled>Warranty Status</option>
                        <option value="0">No Warranty</option>
                        <option value="1">Warranty</option>
                    </select>
                </div>
                @endif
                @if(auth()->user()->type === 'admin')
                <!-- Placeholder Column -->
                <div class="col-12 col-md-2"></div>
                @endif
                @if(auth()->user()->type == 'admin' || auth()->user()->type == 'user' ||
                auth()->user()->type === 'godown')
                <!-- Type Label -->
                <div class="col-12 col-md-2" id="type-label">
                    <h5>Type</h5>
                </div>
                <!-- Type Dropdown -->
                <div class="col-12 col-md-3">
                    <select id="type" name="type" data-type="{{ json_encode($all_sub_categories) }}" required
                        class="form-control">
                        <option value="" disabled selected>Select Type</option>
                        @foreach($types as $type)
                        <option value="{{$type->id}}" data-value="{{$type->name}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
                @endif
            </div>
            @endif
            {{-- if admin not login then No for report layout append. --}}
            @else
            <div class="row mb-3">
                @foreach ($allowedFields as $field)
                @switch($field)

                @case('part')
                <div class="col-12 col-md-2">
                    <h5>Part</h5>
                </div>
                <div class="col-12 col-md-3 mb-2">
                    <select id="part" name="part" class="form-control" required>
                        <option value="" disabled selected>Select Part</option>
                        <option value="0">New</option>
                        <option value="1">Repairing</option>
                    </select>
                </div>
                @break

                @case('temp')
                <div class="col-12 col-md-2">
                    <h5>Temp no.</h5>
                </div>
                <div class="col-12 col-md-3 mb-2">
                    <input type="text" name="temp" class="form-control" placeholder="Enter Temporary No">
                </div>
                @break

                @case('worker_name')
                <div class="col-12 col-md-2">
                    <h5>Employee Name</h5>
                </div>
                <div class="col-12 col-md-3 mb-2">
                    <input type="text" name="worker_name" class="form-control" placeholder="Enter Worker Name">
                </div>
                @break

                @case('sr_no_fiber')
                <div class="col-12 col-md-2">
                    <h5>SR (Fiber)</h5>
                </div>
                <div class="col-12 col-md-3 mb-2">
                    <input type="text" name="sr_no_fiber" class="form-control" placeholder="Enter SR No Fiber">
                </div>
                @break

                @case('mj')
                <div class="col-12 col-md-2">
                    <h5>M.J</h5>
                </div>
                <div class="col-12 col-md-3 mb-2">
                    <input type="text" name="m_j" class="form-control" placeholder="Enter M/J Value">
                </div>
                @break

                @case('warranty')
                <div class="col-12 col-md-2">
                    <h5>Warranty</h5>
                </div>
                <div class="col-12 col-md-3 mb-2">
                    <select name="warranty" class="form-control" required>
                        <option value="" disabled selected>Select Warranty</option>
                        <option value="0">No Warranty</option>
                        <option value="1">Warranty</option>
                    </select>
                </div>
                @break

                @case('type')
                @if( auth()->user()->type === 'godown')
                </div>
                <div class="row mb-3">

                     <div class="col-12 col-md-2">
                        <h5>Type</h5>
                    </div>
                    <div class="col-12 col-md-3 mb-2">
                        <select id="type" name="type" class="form-control" data-type='@json($all_sub_categories)'
                            required>
                            <option value="" disabled selected>Select Type</option>
                            @foreach($types as $type)
                            <option value="{{ $type->id }}" data-value="{{ $type->name }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                     <div class="col-12 col-md-3">
                        <h5>Type</h5>
                    </div>
                    <div class="col-12 col-md-3 mb-2">
                        <select id="type" name="type" class="form-control select2" data-type='@json($all_sub_categories)'
                            required>
                            <option value="" disabled selected>Select Type</option>
                            @foreach($types as $type)
                            <option value="{{ $type->id }}" data-value="{{ $type->name }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                @break

                @endswitch
                @endforeach
            </div>

            @endif

            @if( auth()->user()->type !== 'godown')
            <div class="row mb-3">
                <!-- Empty Columns -->
                <div class="col-12 col-md-2"></div>
                <div class="col-12 col-md-2"></div>
                <div class="col-12 col-md-2"></div>
                <!-- Button Column -->
                <div class="col-12 col-md-4 text-right">
                    <button type="button" onclick="NewReportCreateRow({{ json_encode($all_sub_categories) }})"
                        class="btn btn-dark"> Add </button>
                </div>
                <div class="col-12 col-md-2"></div>
            </div>
            @endif

            @if( auth()->user()->type === 'admin' || auth()->user()->type === 'electric')
            <div class="row">
                <!-- ITEM -->
                <div class="col-12 col-md-3">
                    <h5>ITEM</h5>
                </div>
                <div class="row col-md-9 ">
                    <!-- SR -->
                    <div class="col-12 col-md-3">
                        <h5>SR</h5>
                    </div>
                    <!-- AMP. -->
                    <div class="col-12 col-md-2">
                        <h5>WATT</h5>
                    </div>
                    <!-- VOLT -->
                    <div class="col-12 col-md-2">
                        <h5>VOLT</h5>
                    </div>
                    <!-- WATT -->
                    <div class="col-12 col-md-3">
                        <h5>AMP.</h5>
                    </div>
                    <div class="col-12 col-md-2">
                        <h5>Action</h5>
                    </div>
                </div>
            </div>
            @endif
            <div id="TBody"></div>
            <div id="Append_Extra_Line"></div>
            <div class="row mt-3">
                <div class="col-12 col-md-2">
                    <strong>NOTE</strong>
                </div>
                <div class="col-12 col-md-10">
                    <textarea id="note1" name="note1" class="form-control"></textarea>
                </div>
            </div>
            <!-- Second Note Row -->
            <div class="row mt-3">
                <div class="col-12 offset-md-2 col-md-10">
                    <textarea id="note2" name="note2" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <button type="button" id="submit-button" class="btn btn-success mt-4">SUBMIT</button>
        </div>
    </form>
</div>
@endsection