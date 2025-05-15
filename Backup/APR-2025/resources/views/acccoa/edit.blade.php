@extends('demo')
@section('title', 'Show Accounts')
@section('content')

<h3>Edit Account</h3>
<a href="{{ route('acccoa.index') }}" class="btn btn-primary">Back to Account</a>
<form action="{{ route('acccoa.update', $acccoa->id) }}" method="POST">
    @csrf
    <div class="container">
        <div class="row justify-content-center">
            <!-- Centering the form on larger screens -->
            <div class="col-12 col-lg-6">
                @method('PUT')
                <div class="mb-3">
                    <label for="HeadName">Account Name</label>
                    <input type="text" name="HeadName" class="form-control"
                        placeholder="Enter Head Name" value="{{ $acccoa->HeadName }}" required>
                </div>

                <div class="mb-3">
                    <label for="PHeadCode" class="form-label">Parents Head Code</label>
                    {{-- <input type="text" name="PHeadCode" id="PHeadCode" class="form-control" placeholder="Enter Parent Head Code"> --}}
                    <select id="PHeadCode" name="PHeadCode" class="form-control select2"
                        placeholder="Enter Party Name">
                        <option value="" disabled selected>Choose a Parents Head Code</option>
                        @foreach($accounts as $accounts)
                        <option value="{{ $accounts->HeadCode }}" @if($accounts->HeadCode === $acccoa->PHeadCode) selected @endif>{{ $accounts->HeadCode }} - {{ $accounts->HeadName }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </div>
</form>
@endsection