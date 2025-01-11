<x-layout>
    <x-slot name="title">Show Gst Pdf</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            @php
            $websetting = DB::table('web_settings')->where('id', 1)->first();
            @endphp
              <form action="{{ route('gst-pdf.update', $gstPdfRecord->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row border">
                    <div class="col">
                        @php
                        $websetting = DB::table('web_settings')->where('id', 1)->first();
                        $imagePath = public_path($websetting->invoice_logo); // Resolve full file path
                        $imageData = '';

                        if (file_exists($imagePath)) {
                            $imageData = base64_encode(file_get_contents($imagePath));
                        }
                        @endphp
                        @if(!empty($imageData))
                        <img src="data:image/jpeg;base64,{{ $imageData }}" width="250" height="170">
                        @else
                        <p>Invoice logo not available</p>
                        @endif
                    </div>

                    <div class="col text-center">
                        <h2 class="h6 mt-n1">
                            <input type="text" id="invoice_name" name="invoice_name"
                                value="{{ old('invoice_name', $gstPdfRecord->invoice_name) }}"
                                placeholder="Enter Invoice Name (Sale/Tax)" 
                                class="form-control form-control-sm">
                        </h2>
                        <h1 class="h4 mt-n3">{{ $websetting->company_name }}</h1>
                        <p class="small mt-n1">
                            {{ $websetting->company_address }}<br>
                            PAN: {{ $websetting->PAN_no }}
                        </p>
                        <h3 class="h6 mt-n2">GSTIN: {{ $websetting->GSTIN_no }} </h3>
                        <p class="small mt-n3">Tel. Mo No: {{ $websetting->phno }}
                            &nbsp;&nbsp;&nbsp;
                            Email: {{ $websetting->email }}
                        </p>
                        <h3 class="h6 mt-n2">LUT No: {{ $websetting->lutno }} </h3>
                    </div>

                    <div class="col text-right">
                        <p>Original Copy</p>
                    </div>
                </div>
                <div class="border row mt-2">
                    <div class="col">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="invoice_no">Invoice:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="invoice_no" name="invoice_no" 
                                    value="{{ old('invoice_no', $gstPdfRecord->invoice_no) }}" 
                                    placeholder="Enter Invoice No" 
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="date">Dated:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" id="date" name="date" 
                                    value="{{ old('date', $gstPdfRecord->date) }}" 
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="place_of_supply">Place of Supply:</label>
                            </div>
                            <div class="col-md-9">
                                <textarea id="place_of_supply" name="place_of_supply" 
                                    placeholder="Address" 
                                    class="form-control form-control-sm">{{ old('place_of_supply', $gstPdfRecord->place_of_supply) }}</textarea>
                            </div>
                        </div>
                
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="reverse_charge">Reverse Charge:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="reverse_charge" name="reverse_charge" 
                                    value="{{ old('reverse_charge', $gstPdfRecord->reverse_charge) }}" 
                                    placeholder="Enter Reverse Charge" 
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="gr_rr_no">GR/RR No:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="gr_rr_no" name="gr_rr_no" 
                                    value="{{ old('gr_rr_no', $gstPdfRecord->gr_rr_no) }}" 
                                    placeholder="Enter GR/RR No" 
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="transport">Transport:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="transport" name="transport" 
                                    value="{{ old('transport', $gstPdfRecord->transport) }}" 
                                    placeholder="Enter Transport" 
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="vehicle_no">Vehicle No:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="vehicle_no" name="vehicle_no" 
                                    value="{{ old('vehicle_no', $gstPdfRecord->vehicle_no) }}" 
                                    placeholder="Enter Vehicle No" 
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="station">Station:</label>
                            </div>
                            <div class="col-md-9" style="font-size: 8px;">
                                <input type="text" id="station" name="station" 
                                    value="{{ old('station', $gstPdfRecord->station) }}" 
                                    placeholder="Enter Station" 
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="e_way_bill_no">E Way Bill No:</label>
                            </div>
                            <div class="col-9">
                                <input type="text" id="e_way_bill_no" name="e_way_bill_no" 
                                    value="{{ old('e_way_bill_no', $gstPdfRecord->e_way_bill_no) }}" 
                                    placeholder="Enter E-Way Bill No" 
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border row mt-2">
                    <div class="col">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="billed_to"><strong>Billed To:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="billed_to" name="billed_to" 
                                    value="{{ old('billed_to', $gstPdfRecord->billed_to) }}" 
                                    placeholder="Enter Billed To" 
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                
                        <div class="row mb-2">
                            <div class="col-12" style="font-size: 8px;">
                                <input type="text" id="billed_city" name="billed_city" 
                                    value="{{ old('billed_city', $gstPdfRecord->billed_city) }}" 
                                    placeholder="Enter Billed City" 
                                    class="form-control form-control-sm mb-2">
                                <input type="text" id="billed_state" name="billed_state" 
                                    value="{{ old('billed_state', $gstPdfRecord->billed_state) }}" 
                                    placeholder="Enter Billed State" 
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="billed_gstin_uin"><strong>GST / UIN:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="billed_gstin_uin" name="billed_gstin_uin" 
                                    value="{{ old('billed_gstin_uin', $gstPdfRecord->billed_gstin_uin) }}" 
                                    placeholder="Enter GST / UIN" 
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                
                    <div class="col">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="shipped_to"><strong>Shipped To:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="shipped_to" name="shipped_to" 
                                    value="{{ old('shipped_to', $gstPdfRecord->shipped_to) }}" 
                                    placeholder="Enter Shipped To" 
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                
                        <div class="row mb-2">
                            <div class="col-12" style="font-size: 8px;">
                                <input type="text" id="shipped_city" name="shipped_city" 
                                    value="{{ old('shipped_city', $gstPdfRecord->shipped_city) }}" 
                                    placeholder="Enter Shipped City" 
                                    class="form-control form-control-sm mb-2">
                                <input type="text" id="shipped_state" name="shipped_state" 
                                    value="{{ old('shipped_state', $gstPdfRecord->shipped_state) }}" 
                                    placeholder="Enter Shipped State" 
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="shipped_gstin_uin"><strong>GST / UIN:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="shipped_gstin_uin" name="shipped_gstin_uin" 
                                    value="{{ old('shipped_gstin_uin', $gstPdfRecord->shipped_gstin_uin) }}" 
                                    placeholder="Enter GST / UIN" 
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border row mt-2">
                    <div class="col-md-4">
                        IRN : 
                        <input type="text" name="irn" 
                            value="{{ old('irn', $gstPdfRecord->irn) }}" 
                            placeholder="Enter IRN" 
                            class="form-control form-control-sm">
                    </div>
                    <div class="col-md-4">
                        Ack No : 
                        <input type="text" name="ack_no" 
                            value="{{ old('ack_no', $gstPdfRecord->ack_no) }}" 
                            placeholder="Enter Ack No" 
                            class="form-control form-control-sm">
                    </div>
                    <div class="col-md-4">
                        Ack Date : 
                        <input type="text" name="ack_date" 
                            value="{{ old('ack_date', $gstPdfRecord->ack_date) }}" 
                            placeholder="Enter Ack Date" 
                            class="form-control form-control-sm">
                    </div>
                </div>
                                                                                                    
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('gst-pdf.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
                
              </form>
        </div>
    </x-slot>
</x-layout>