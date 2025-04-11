
@extends('demo')
@section('title', 'Insert Acc Coa')

@section('content')
    <div class="main" id="main">
        <a href="{{ route('acccoa.index') }}" class="btn btn-primary">Back to ACC COA</a>
        <form action="{{ route('acccoa.store') }}" method="POST">
            @csrf
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-9">
                        <div class="card">
                            
                            <div class="card-body">
                                
                                {{-- <div class="mb-3">
                                    <label for="HeadCode" class="form-label">Head Code</label>
                                    <input type="text" name="HeadCode" id="HeadCode" class="form-control" placeholder="Enter Head Code">
                                </div> --}}
                                
                                <div class="mb-3">
                                    <label for="HeadName" class="form-label">Head Name</label>
                                    <input type="text" name="HeadName" id="HeadName" class="form-control" placeholder="Enter Head Name">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="PHeadCode" class="form-label">Parents Head Code</label>
                                    {{-- <input type="text" name="PHeadCode" id="PHeadCode" class="form-control" placeholder="Enter Parent Head Code"> --}}
                                    <select id="PHeadCode" name="PHeadCode" class="form-control select2"
                                        placeholder="Enter Party Name" >
                                        <option value="" disabled selected>Choose a Parents Head Code</option>
                                        @foreach($accounts as $accounts)
                                        <option value="{{ $accounts->HeadCode }}">{{ $accounts->HeadCode }} - {{ $accounts->HeadName }} , Parents {{ $accounts->PHeadCode }}/{{ $accounts->PHeadName }} </option>
                                        @endforeach
                                    </select>
                                </div>
        
                                {{-- <!-- HeadLevel -->
                                <div class="mb-3">
                                    <label for="HeadLevel" class="form-label">Head Level</label>
                                    <input type="number" name="HeadLevel" id="HeadLevel" class="form-control" placeholder="Enter Head Level">
                                </div> --}}
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="{{ route('acccoa.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
@endsection