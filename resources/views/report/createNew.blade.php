<x-layout>
    <x-slot name="title">Add Report</x-slot>
    <x-slot name="main">
        <div class="main" id="main">


            <form action="{{route('report.store')}}" method="post">
                @csrf

                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                {{-- <div class="table table-bordered custom-border datatable-remove" id="tbl"> --}}
                    <div class="container-fluid">
                        <div class="row mb-3">

                            @if( auth()->user()->type === 'godown')
                            <div class="col-12 col-md-3">
                                <label for="pname" class="form-label font-weight-bold">PARTY NAME</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select class="form-control" id="pname" name="party_name" required>
                                    <option value="" disabled selected>Select</option>
                                    @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                        </div>

                        @if(auth()->user()->type === 'electric' || auth()->user()->type === 'admin')
                        <div class="container-fluid">
                            <div class="row mb-3">
                                @if(auth()->user()->type == 'admin' || auth()->user()->type == 'electric')
                                <!-- Part Label -->
                                <div class="col-12 col-md-2">
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
                                <!-- Temp No. Label -->
                                <div class="col-12 col-md-2">
                                    <h5>Temp no.</h5>
                                </div>
                                @endif

                                @if(auth()->user()->type == 'admin' || auth()->user()->type == 'cavity')
                                <!-- Worker Name Label -->
                                <div class="col-12 col-md-2">
                                    <h5>WORKER NAME</h5>
                                </div>
                                <!-- Worker Name Input -->
                                <div class="col-12 col-md-3">
                                    <input type="text" id="wn" name="worker_name" class="form-control"
                                        placeholder="Enter Worker Name">
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif
                        @if(auth()->user()->type === 'godown' || auth()->user()->type === 'electric' ||
                        auth()->user()->type === 'admin' || auth()->user()->type === 'user')
                        <div class="container-fluid">
                            <div class="row mb-3">
                                @if(auth()->user()->type === 'godown' || auth()->user()->type === 'admin' ||
                                auth()->user()->type === 'user')
                                <!-- SR (FIBER) Label -->
                                <div class="col-12 col-md-2">
                                    <h5>SR (FIBER)</h5>
                                </div>
                                <!-- SR (FIBER) Input -->
                                <div class="col-12 col-md-3">
                                    <input type="text" id="srfiber" name="sr_no_fiber" class="form-control"
                                        placeholder="Enter SR No Fiber">
                                </div>
                                @endif

                                @if(auth()->user()->type === 'admin' || auth()->user()->type === 'electric')
                                <!-- Temporary No Input -->
                                <div class="col-12 col-md-2">
                                    <input type="number" id="temp" name="temp" class="form-control"
                                        placeholder="Enter Temporary No">
                                </div>
                                @endif
                           
                                @if(auth()->user()->type === 'admin' || auth()->user()->type === 'user')
                                <!-- M.J Label -->
                                <div class="col-12 col-md-2">
                                    <h5>M.J</h5>
                                </div>
                                <!-- M.J Input -->
                                <div class="col-12 col-md-3">
                                    <input type="text" id="mj" name="m_j" class="form-control"
                                        placeholder="Enter M/J Value">
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif
                        @if( auth()->user()->type === 'admin' || auth()->user()->type === 'user' || auth()->user()->type
                        === 'godown')
                        <div class="container-fluid">
                            <div class="row mb-3">
                                @if(auth()->user()->type == 'admin' || auth()->user()->type === 'godown')
                                <!-- Warranty Label -->
                                <div class="col-12 col-md-2">
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
                                <div class="col-12 col-md-2">
                                    <h5>Type</h5>
                                </div>
                                <!-- Type Dropdown -->
                                <div class="col-12 col-md-3">
                                    <select id="type" name="type" required class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="15">15</option>
                                        <option value="18">18</option>
                                        <option value="21">21</option>
                                        <option value="26">26</option>
                                    </select>
                                </div>
                                @endif
                            </div>
                        </div>

                        @endif
                        <div class="container-fluid">
                            <div class="row mb-3">
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
                        @if( auth()->user()->type === 'admin' || auth()->user()->type === 'electric')
                        <div class="container-fluid">
                            <div class="row ">
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
                                    <h5>AMP.</h5>
                                </div>
                                <!-- VOLT -->
                                <div class="col-12 col-md-2">
                                    <h5>VOLT</h5>
                                </div>
                                <!-- WATT -->
                                <div class="col-12 col-md-3">
                                    <h5>WATT</h5>
                                </div>
                                <div class="col-12 col-md-2">
                                    <h5>Action</h5>
                                </div>
                            </div>
                        </div>

                        @endif
                        <div id="TBody"></div>
                        <div class="row mb-3">
                            <div class="col-12 col-md-2">
                                <strong>NOTE</strong>
                            </div>
                            <div class="col-12 col-md-10">
                                <textarea id="note1" name="note1" class="form-control"></textarea>
                            </div>
                        </div>

                        <!-- Second Note Row -->
                        <div class="row">
                            <div class="col-12 offset-md-2 col-md-10">
                                <textarea id="note2" name="note2" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                {{-- </div> --}}
                <button type="submit" class="btn btn-success">SUBMIT</button>
            </form>
        </div>
    </x-slot>
</x-layout>