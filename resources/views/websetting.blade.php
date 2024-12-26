<x-layout>
    <x-slot name="title">Web Setting Page</x-slot>
    <x-slot name="main">
        
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('websetting.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="logo" class="form-label">Logo:</label>
                    <input type="file" class="form-control" id="logo" name="logo">
                    {{-- {{dd(asset($websetting->logo));}} --}}
                    @if($websetting->logo)
                        <img src="{{ asset($websetting->logo) }}" alt="Logo" width="100" class="mt-2">
                    @endif
                </div>
    
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="invoice_logo" class="form-label">Invoice Logo:</label>
                    <input type="file" class="form-control" id="invoice_logo" name="invoice_logo">
                    @if($websetting->invoice_logo)
                        <img src="{{ asset($websetting->invoice_logo) }}" width="100" alt="Invoice Logo" class="mt-2">
                    @endif
                </div>
    
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="favicon" class="form-label">Favicon:</label>
                    <input type="file" class="form-control" id="favicon" name="favicon">
                    @if($websetting->favicon)
                        <img src="{{ asset($websetting->favicon) }}" alt="Favicon" width="100" class="mt-2">
                    @endif
                </div>
    
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="currency" class="form-label">Currency:</label>
                    <input type="text" class="form-control" id="currency" name="currency" value="{{ $websetting->currency }}" required>
                </div>
    
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="timezone" class="form-label">Timezone:</label>
                    <select class="form-control" id="timezone" name="timezone" required>
                        @foreach(timezone_identifiers_list() as $timezone)
                            <option value="{{ $timezone }}" {{ $websetting->timezone == $timezone ? 'selected' : '' }}>{{ $timezone }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="footer_text" class="form-label">Footer Text:</label>
                    <textarea class="form-control" id="footer_text" name="footer_text" rows="2" required>{{ $websetting->footer_text }}</textarea>
                </div>
    
                <div class="col-md-4 col-sm-3 mb-3">
                    <label for="language" class="form-label">Language:</label>
                    <input type="text" class="form-control" id="language" name="language" value="{{ $websetting->language }}" required>
                </div>
    
                <div class="col-12 mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
    
    </x-slot>
</x-layout>