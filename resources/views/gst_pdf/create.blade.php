<x-layout>
    <x-slot name="title">Create Gst Pdf</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            @php
            $websetting = DB::table('web_settings')->where('id', 1)->first();
            @endphp
            <form action="{{route('gst-pdf.store')}}" method="post">
                @csrf
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
                                placeholder="Enter Invoice Name(Sale/Tax)" class="form-control form-control-sm">
                        </h2>
                        <h1 class="h4 mt-n3">{{ $websetting->company_name}}</h1>
                        <p class="small mt-n1">
                            {{ $websetting->company_address}}<br>
                            PAN: {{ $websetting->PAN_no}}
                        </p>
                        <h3 class="h6 mt-n2">GSTIN: {{ $websetting->GSTIN_no}} </h3>
                        <p class="small mt-n3">Tel. Mo No: {{ $websetting->phno}}
                            &nbsp;&nbsp;&nbsp;
                            Email: {{ $websetting->email}}
                        </p>
                        <h3 class="h6 mt-n2">LUT No: {{ $websetting->lutno}} </h3>
                    </div>

                    <div class="col text-right">
                        <p> Original Copy </p>
                    </div>
                </div>


                <div class="border row mt-2">
                    <div class="col">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="invoice_no">Invoice :</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="invoice_no" name="invoice_no" placeholder="Enter Invoice No"
                                    class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="date">Dated :</label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" id="date" name="date" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="place_of_supply">Place of Supply :</label>
                            </div>
                            <div class="col-md-9">
                                <textarea id="place_of_supply" placeholder="Address" name="place_of_supply"
                                    class="form-control form-control-sm"></textarea>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="reverse_charge">Reverse Charge :</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="reverse_charge" name="reverse_charge"
                                    placeholder="Enter Reverse Charge" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="gr_rr_no">GR/RR No :</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="gr_rr_no" name="gr_rr_no" placeholder="Enter GR/RR No"
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
                                <input type="text" id="transport" name="transport" placeholder="Enter Transport"
                                    class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="vehicle_no">Vehicle No:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="vehicle_no" name="vehicle_no" placeholder="Enter Vehicle No"
                                    class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="station">Station:</label>
                            </div>
                            <div class="col-md-9" style="font-size: 8px;">
                                <input type="text" id="station" name="station" placeholder="Enter Station"
                                    class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="station">E Way Bill No:</label>
                            </div>
                            <div class="col-9">
                                <input type="text" id="e_way_bill_no" name="e_way_bill_no"
                                    placeholder="Enter E-Way Bill No" class="form-control form-control-sm">
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
                                <input type="text" id="billed_to" name="billed_to" placeholder="Enter Billed To"
                                    class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12" style="font-size: 8px;">
                                <input type="text" id="billed_city" name="billed_city" placeholder="Enter Billed City"
                                    class="form-control form-control-sm mb-2">
                                <input type="text" id="billed_state" name="billed_state"
                                    placeholder="Enter Billed State" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="billed_gstin_uin"><strong>GST / UIN:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="billed_gstin_uin" name="billed_gstin_uin"
                                    placeholder="Enter GST / UIN" class="form-control form-control-sm">
                            </div>
                        </div>


                    </div>
                    <div class="col">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="shipped_to"><strong>Shipped To:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="shipped_to" name="shipped_to" placeholder="Enter Shipped To"
                                    class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12" style="font-size: 8px;">
                                <input type="text" id="shipped_city" name="shipped_city"
                                    placeholder="Enter Shipped City" class="form-control form-control-sm mb-2">
                                <input type="text" id="shipped_state" name="shipped_state"
                                    placeholder="Enter Shipped State" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="shipped_gstin_uin"><strong>GST / UIN:</strong></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="shipped_gstin_uin" name="shipped_gstin_uin"
                                    placeholder="Enter GST / UIN" class="form-control form-control-sm">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="border row mt-2">
                    <div class="col-md-4">
                        IRN : <input type="text" name="irn" placeholder="Enter IRN"
                            class="form-control form-control-sm">
                    </div>
                    <div class="col-md-4">
                        Ack No : <input type="number" name="ack_no" placeholder="Enter Ack No"
                            class="form-control form-control-sm">
                    </div>
                    <div class="col-md-4">
                        Ack Date : <input type="date" name="ack_date" placeholder="Enter Ack Date"
                            class="form-control form-control-sm">
                    </div>
                </div>
                <div id="item-container">

                    <div class="border row mt-3">
                        <div class="col border-right"> <strong> S.N. </strong></div>
                        <div class="col border-right"> <strong> Description Of Goods </strong></div>
                        <div class="col border-right"> <strong> HSN/Code </strong></div>
                        <div class="col border-right"> <strong> Qty </strong></div>
                        <div class="col border-right"> <strong> Unit </strong></div>
                        <div class="col"> <strong> Price </strong></div>
                        <div class="col"> <strong> Total(T) </strong> <button type="button" onclick="items_add()"
                                class="btn btn-primary float-right"><i class="fa fa-plus"></i></button> </div>
                    </div>

                    <div class="row border input-row mt-2">
                        <div class="col border-right">
                            <input type="number" class="form-control w-75" placeholder="S.N." name="sn[]">
                        </div>
                        <div class="col border-right">
                            <input type="text" class="form-control w-75" placeholder="Description Of Goods"
                                name="description[]">
                        </div>
                        <div class="col border-right">
                            <input type="text" class="form-control w-75" placeholder="HSN/Code" name="hsn_code[]">
                        </div>
                        <div class="col border-right">
                            <input type="number" class="form-control qty w-75" placeholder="Qty" name="qty[]" onchange="calculateTotal(this)">
                        </div>
                        <div class="col border-right">
                            <input type="text" class="form-control w-75" placeholder="Unit" name="unit[]">
                        </div>
                        <div class="col border-right">
                            <input type="number" step="0.01" class="form-control price w-75" placeholder="Price" onchange="calculateTotal(this)" name="price[]">
                        </div>
                        <div class="col d-flex">
                            <input type="number" step="0.01" class="form-control w-75 total" placeholder="Total"
                                name="total[]">
                                <button type="button" class="btn btn-danger remove-btn"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col">Add</div>
                    <div class="col"> CGST</div>
                    <div class="col d-flex align-items-center">
                        @<input type="number" id="cgst" name="cgst_per" placeholder="Enter CGST"
                            class="form-control form-control-sm" onchange="calculateTotal()">%
                    </div>
                    <div class="col"> <input type="number" id="cgst_amt" name="cgst_amt"
                            placeholder="Enter CGST Amt." class="form-control form-control-sm">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col">Add</div>
                    <div class="col"> SGST</div>
                    <div class="col border-right d-flex align-items-center">@
                        <input type="number" id="sgst" name="sgst_per" onchange="calculateTotal()" placeholder="Enter CGST" class="form-control form-control-sm">%
                    </div>
                    <div class="col"> <input type="number" id="sgst_amt" name="sgst_amt" placeholder="Enter CGST Amt." class="form-control form-control-sm"></div>
                </div>

                <div class="row mt-2">
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col">Add</div>
                    <div class="col"> IGST</div>
                    <div class="col border-right d-flex align-items-center">@
                        <input type="number" id="igst_per" name="igst_per" onchange="calculateTotal()" placeholder="Enter IGST" class="form-control form-control-sm"> %
                    </div>
                    <div class="col">
                        <input type="number" id="igst_amt" name="igst_amt" placeholder="Enter IGST Amt." class="form-control form-control-sm">
                    </div>
                </div>

                <div class="row border mt-2">
                    <div class="col"> </div>
                    <div class="col"> </div>
                    <div class="col"> </div>
                    <div class="col"> <strong> Grand Total </strong></div>
                    <div class="col"> </div>
                    <div class="col border-right"> {{ $websetting->currency }} </div>
                    <div class="col margin-bottom">
                        <input type="number" id="grand_total_amt" name="grand_total_amt" placeholder="Enter Grand Total Amt."
                            class="form-control form-control-sm">
                    </div>
                </div>
                <div class="mt-2">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col"> HSN/SAC </div>
                                <div class="col"> Tax Rate </div>
                                <div class="col"> Taxable Amt </div>
                                <div class="col"> CGST Amt </div>
                                <div class="col"> SGST Amt </div>
                                <div class="col"> IGST Amt </div>
                                <div class="col"> Total Amt </div>
                            </div>
                        </div>
                        <div class="col-md-3"> </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col">
                                    <input type="text" id="hsn_sac_desc" name="hsn_sac_desc"
                                        placeholder="Enter HSN/SAC Description" class="form-control form-control-sm">
                                </div>
                                <div class="col">
                                    <input type="number" id="tax_rate_desc" name="tax_rate_desc"
                                        placeholder="Enter Tax Rate Description" class="form-control form-control-sm">
                                </div>
                                <div class="col">
                                    <input type="number" id="taxable_amt_desc" name="taxable_amt_desc"
                                        placeholder="Enter Taxable Amount Description"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col">
                                    <input type="number" id="cgst_amt_desc" name="cgst_amt_desc"
                                        placeholder="Enter CGST Amount Description"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col">
                                    <input type="number" id="sgst_amt_desc" name="sgst_amt_desc"
                                        placeholder="Enter SGST Amount Description"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col">
                                    <input type="number" id="igst_amt_desc" name="igst_amt_desc"
                                        placeholder="Enter IGST Amount Description"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col">
                                    <input type="number" id="total_tax_desc" name="total_tax_desc"
                                        placeholder="Enter Total Tax Description" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-md-3">

                            </div>
                        </div>
                    </div>
                </div>
                <p class="margin-bottom" id="capitalizedResult"></p>

                <div class="special_bottom border row">
                    <div class="col-md-6 offset-sm-3 text-center mb-3">
                        <label for="msme_udyam_reg_number"><strong>MSME- UDYAM REGISTRATION NUMBER:</strong></label>

                        <input type="text" id="msme_udyam_reg_number" name="msme_udyam_reg_number"
                            placeholder="Enter MSME Udyam Registration Number" class="form-control form-control-sm"
                            data-bs-toggle="popover" data-bs-trigger="focus"
                            data-bs-content="Please enter your MSME Udyam Registration Number.">
                    </div>
                </div>

                <div class="border row d-flex">
                    <div class="col-4">
                        <label for="bank_details"><strong>Bank Details:</strong></label>
                        <input type="text" id="bank_details" name="bank_details" placeholder="Enter Bank Details"
                            class="form-control form-control-sm">
                    </div>
                    <div class="col-4">
                        <label for="account_number"><strong>Account Number:</strong></label>
                        <input type="number" id="account_number" name="account_number" placeholder="Enter Account Number"
                            class="form-control form-control-sm">
                    </div>
                    <div class="col-4">
                        <label for="ifsc_code"><strong>IFSC Code:</strong></label>
                        <input type="text" id="ifsc_code" name="ifsc_code" placeholder="Enter IFSC Code"
                            class="form-control form-control-sm">
                    </div>
                </div>

                <div class="row border mt-2">
                    <div class="col padding_left border-right">
                        <strong> Terms & Conditions</strong>
                        <p>1. Goods once sold will not be taken back.</p>
                        <p>2. Interest @ 18% p.a. will be charged For MAKTECH </p>
                        <p>is not made within the stipulated time. </p>
                        <p>3. Subject to 'Surat' Jurisdiction only.</p>
                        <p>4. Supply meant for SEZ under LUT without payment of integrated tax</p>
                    </div>

                    <div class="col padding_left_1 border-right">
                        <center> <strong> E-Invoice QR Code</strong> </center>
                    </div>
                    <div class="col padding_left_1">

                        <div class="denis">
                            <strong> Receiver's Signature:</strong>
                        </div>
                    </div>
                </div>
                <p>Time: {{ \Carbon\Carbon::now() }}</p>

                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-success">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </x-slot>
</x-layout>