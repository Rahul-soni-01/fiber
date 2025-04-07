        @extends('demo')
@section('title', 'Web Setting Page')
@section('content')
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
    <form action="{{ route('websetting.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="company_name" class="form-label">Company Name:</label>
                    <input type="text" class="form-control" placeholder="Company Name" id="company_name" name="company_name" value="{{ $websetting->company_name  ?? null }}" required>
                </div>
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="company_address" class="form-label">Company Address:</label>
                    <input type="text" class="form-control" placeholder="Company Address" id="company_address" name="company_address" value="{{ $websetting->company_address  ?? null }}" required>
                </div>
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="PAN_no" class="form-label">PAN No:</label>
                    <input type="text" class="form-control" placeholder="PAN No" id="PAN_no" name="PAN_no" value="{{ $websetting->PAN_no  ?? null }}" required>
                </div>
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="GSTIN_no" class="form-label">GST IN:</label>
                    <input type="text" class="form-control" placeholder="GST No" id="GSTIN_no" name="GSTIN_no" value="{{ $websetting->GSTIN_no  ?? null }}" required>
                </div>
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="cgst" class="form-label">CGST</label>
                    <input type="text" class="form-control" placeholder="CGST ()" id="cgst" name="cgst" value="{{ $websetting->cgst  ?? null }}" required>
                </div>
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="sgst" class="form-label">SGST</label>
                    <input type="text" class="form-control" placeholder="SGST ()" id="sgst" name="sgst" value="{{ $websetting->sgst  ?? null }}" required>
                </div>
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="igst" class="form-label">IGST </label>
                    <input type="text" class="form-control" placeholder="IGST ()" id="igst" name="igst" value="{{ $websetting->igst  ?? null }}" required>
                </div>
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="phno" class="form-label">Ph No:</label>
                    <input type="text" class="form-control" placeholder="Phone no" id="phno" name="phno" value="{{ $websetting->phno  ?? null }}" required>
                </div>
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{ $websetting->email  ?? null }}" required>
                </div>
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="lutno" class="form-label">Lut no:</label>
                    <input type="text" class="form-control" placeholder="Lut no" id="lutno" name="lutno" value="{{ $websetting->lutno  ?? null }}" required>
                </div>
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="logo" class="form-label">Logo:</label>
                    <input type="file" class="form-control" id="logo" name="logo">
                    {{-- {{dd(asset($websetting->logo));}} --}}
                    @if($websetting->logo ?? null)
                        <img src="{{ asset($websetting->logo) }}" alt="Logo" width="100" class="mt-2">
                    @endif
                </div>
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="invoice_logo" class="form-label">Invoice Logo:</label>
                    <input type="file" class="form-control" id="invoice_logo" name="invoice_logo">
                    @if($websetting->invoice_logo ?? null)
                        <img src="{{ asset($websetting->invoice_logo) }}" width="100" alt="Invoice Logo" class="mt-2">
                    @endif
                </div>
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="favicon" class="form-label">Favicon:</label>
                    <input type="file" class="form-control" id="favicon" name="favicon">
                    @if($websetting->favicon  ?? null)
                        <img src="{{ asset($websetting->favicon) }}" alt="Favicon" width="100" class="mt-2">
                    @endif
                </div>
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="currency" class="form-label">Currency:</label>
                    <input type="text" class="form-control" id="currency" name="currency" placeholder="currency" value="{{ $websetting->currency  ?? null }}" required>
                </div>
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="timezone" class="form-label">Timezone:</label>
                    <select class="form-control" id="timezone" name="timezone" placeholder="timezone" required>
                        @foreach(timezone_identifiers_list() as $timezone)
                            <option value="{{ $timezone }}" {{ $websetting->timezone == $timezone ? 'selected' : '' }}>{{ $timezone }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="footer_text" class="form-label">Footer Text:</label>
                    <textarea class="form-control" id="footer_text" name="footer_text" placeholder="Footer Text" rows="2" required>{{ $websetting->footer_text  ?? null }}</textarea>
                </div>
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="language" class="form-label">Language:</label>
                    <input type="text" class="form-control" placeholder="Language" id="language" name="language" value="{{ $websetting->language  ?? null }}" required>
                </div>
                <div class="col-12 mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
    @endsection