@extends('demo')
@section('title', 'GST PDF')

@section('content')
<h1>GST PDF</h1>
<div class="main" id="main">
    <a href="{{ route('generate-pdf', ['gst-pdf' => $id]) }}" class="btn btn-primary mb-4"
        id="download-btn1212">Download PDF</a>
    @php

    $websetting = DB::table('web_settings')->where('id', 1)->first();
    @endphp
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
                {{ $gstPdfRecord->invoice_name ?? 'N/A' }}
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
                    {{ $gstPdfRecord->invoice_no ?? 'N/A' }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                    <label for="date">Dated:</label>
                </div>
                <div class="col-md-9">
                    <div id="date">
                        {{ $gstPdfRecord->date ?? 'N/A' }}
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                    <label for="place_of_supply">Place of Supply:</label>
                </div>
                <div class="col-md-9">
                    <div id="place_of_supply">
                        {{ $gstPdfRecord->place_of_supply ?? 'N/A' }}
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                    <label for="reverse_charge">Reverse Charge:</label>
                </div>
                <div class="col-md-9">
                    <div id="reverse_charge">
                        {{ $gstPdfRecord->reverse_charge ?? 'N/A' }}
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                    <label for="gr_rr_no">GR/RR No:</label>
                </div>
                <div class="col-md-9">
                    <div id="gr_rr_no">
                        {{ $gstPdfRecord->gr_rr_no ?? 'N/A' }}
                    </div>
                </div>
            </div>

        </div>
        <div class="col">

            <div class="row mb-2">
                <div class="col-md-3">
                    <label for="transport">Transport:</label>
                </div>
                <div class="col-md-9">
                    <div id="transport">
                        {{ $gstPdfRecord->transport ?? 'N/A' }}
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                    <label for="vehicle_no">Vehicle No:</label>
                </div>
                <div class="col-md-9">
                    <div id="vehicle_no">
                        {{ $gstPdfRecord->vehicle_no ?? 'N/A' }}
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                    <label for="station">Station:</label>
                </div>
                <div class="col-md-9">
                    <div id="station">
                        {{ $gstPdfRecord->station ?? 'N/A' }}
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                    <label for="e_way_bill_no">E Way Bill No:</label>
                </div>
                <div class="col-md-9">
                    <div id="e_way_bill_no">
                        {{ $gstPdfRecord->e_way_bill_no ?? 'N/A' }}
                    </div>
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
                    <div id="billed_to">
                        {{ $gstPdfRecord->billed_to ?? 'N/A' }}
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-12">
                    <div id="billed_city" class="mb-2">
                        {{ $gstPdfRecord->billed_city ?? 'N/A' }}
                    </div>
                    <div id="billed_state">
                        {{ $gstPdfRecord->billed_state ?? 'N/A' }}
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                    <label for="billed_gstin_uin"><strong>GST / UIN:</strong></label>
                </div>
                <div class="col-md-9">
                    <div id="billed_gstin_uin">
                        {{ $gstPdfRecord->billed_gstin_uin ?? 'N/A' }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="row mb-2">
                <div class="col-md-3">
                    <label for="shipped_to"><strong>Shipped To:</strong></label>
                </div>
                <div class="col-md-9">
                    <div id="shipped_to">
                        {{ $gstPdfRecord->shipped_to ?? 'N/A' }}
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-12">
                    <div id="shipped_city" class="mb-2">
                        {{ $gstPdfRecord->shipped_city ?? 'N/A' }}
                    </div>
                    <div id="shipped_state">
                        {{ $gstPdfRecord->shipped_state ?? 'N/A' }}
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                    <label for="shipped_gstin_uin"><strong>GST / UIN:</strong></label>
                </div>
                <div class="col-md-9">
                    <div id="shipped_gstin_uin">
                        {{ $gstPdfRecord->shipped_gstin_uin ?? 'N/A' }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="border row mt-2">
        <div class="col-md-4">
            IRN:
            <span>
                {{ $gstPdfRecord->irn ?? 'N/A' }}
            </span>
        </div>
        <div class="col-md-4">
            Ack No:
            <span>
                {{ $gstPdfRecord->ack_no ?? 'N/A' }}
            </span>
        </div>
        <div class="col-md-4">
            Ack Date:
            <span>
                {{ $gstPdfRecord->ack_date ?? 'N/A' }}
            </span>
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
            <div class="col"> <strong> Total(T) </strong> </div>
        </div>
        @php
        $qty = 0;
        @endphp
        @foreach($gstPdfRecord->items as $item)
        @php
        $qty +=$item['qty'];
        @endphp
        <div class="row input-row mt-2">
            <div class="col border-right">
                <span>{{ $item['sn'] }}</span>
            </div>
            <div class="col border-right">
                <span>{{ $item['description'] }}</span>
            </div>
            <div class="col border-right">
                <span>{{ $item['hsn_code'] }}</span>
            </div>
            <div class="col border-right">
                <span>{{ $item['qty'] }}</span>
            </div>
            <div class="col border-right">
                <span>{{ $item['unit'] }}</span>
            </div>
            <div class="col border-right">
                <span>{{ $item['price'] }}</span>
            </div>
            <div class="col d-flex">
                <span>{{ $item['total'] }}</span>
            </div>
        </div>
        @endforeach


    </div>

    <div class="row mt-2">
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col text-right">Add:</div>
        <div class="col">CGST</div>
        <div class="col d-flex align-items-center">
            @
            <span id="cgst">
                {{ $gstPdfRecord->cgst_per ?? 'N/A' }}
            </span>
            %
        </div>
        <div class="col">
            <span id="cgst_amt_desc">
                {{ $gstPdfRecord->cgst_amt ?? 'N/A' }}
            </span>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col text-right">Add:</div>
        <div class="col">SGST</div>
        <div class="col border-right d-flex align-items-center">
            @
            <span id="sgst">

                {{ $gstPdfRecord->sgst_per ?? 'N/A' }}
            </span>
            %
        </div>
        <div class="col">
            <span id="sgst_amt_desc">
                {{ $gstPdfRecord->sgst_amt ?? 'N/A' }}
            </span>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col text-right">Add:</div>
        <div class="col">IGST</div>
        <div class="col border-right d-flex align-items-center">
            @<span id="rgst">
                {{ $gstPdfRecord->igst_per ?? 'N/A' }}
            </span>
            %
        </div>
        <div class="col">
            <span id="rgst_amt_desc">
                {{ $gstPdfRecord->igst_amt ?? 'N/A' }}
            </span>
        </div>
    </div>


    <div class="row border mt-2">
        <div class="col"> </div>
        <div class="col"> </div>
        <div class="col"> <strong> Grand Total </strong></div>
        <div class="col"> {{$qty}} Pcs.</div>
        <div class="col"> </div>
        <div class="col border-right"> {{ $websetting->currency }} </div>
        <div class="col margin-bottom">
            <span>
                {{ $gstPdfRecord->grand_total_amt ?? 'N/A' }}
            </span>
        </div>
    </div>
    <div class="mt-2">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col"> <strong> HSN/SAC </strong> </div>
                    <div class="col"> <strong> Tax Rate </strong> </div>
                    <div class="col"> <strong> Taxable Amt </strong> </div>
                    <div class="col"> <strong> CGST Amt </strong> </div>
                    <div class="col"> <strong> SGST Amt </strong> </div>
                    <div class="col"> <strong> IGST Amt </strong> </div>
                    <div class="col"> <strong> Total Amt </strong> </div>
                </div>
            </div>
            <div class="col-md-3"> </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col">
                        <span>
                            {{ $gstPdfRecord->hsn_sac_desc ?? 'N/A' }}
                        </span>
                    </div>
                    <div class="col">
                        <span>
                            {{ $gstPdfRecord->tax_rate_desc ?? 'N/A' }} %
                        </span>
                    </div>
                    <div class="col">
                        <span>
                            {{ $gstPdfRecord->taxable_amt_desc ?? 'N/A' }}
                        </span>
                    </div>
                    <div class="col">
                        <span>
                            {{ $gstPdfRecord->cgst_amt_desc ?? 'N/A' }}
                        </span>
                    </div>
                    <div class="col">
                        <span>
                            {{ $gstPdfRecord->sgst_amt_desc ?? 'N/A' }}
                        </span>
                    </div>
                    <div class="col">
                        <span>
                            {{ $gstPdfRecord->rgst_amt_desc ?? 'N/A' }}
                        </span>
                    </div>
                    <div class="col">
                        <span>
                            {{ $gstPdfRecord->total_tax_desc ?? 'N/A' }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>

    </div>

    @php
    $word = $gstPdfRecord->grand_total_amt;
    // $word = 19999; // Replace with your dynamic variable if needed
    $dictionary = [
    0 => 'Zero',
    1 => 'One',
    2 => 'Two',
    3 => 'Three',
    4 => 'Four',
    5 => 'Five',
    6 => 'Six',
    7 => 'Seven',
    8 => 'Eight',
    9 => 'Nine',
    10 => 'Ten',
    11 => 'Eleven',
    12 => 'Twelve',
    13 => 'Thirteen',
    14 => 'Fourteen',
    15 => 'Fifteen',
    16 => 'Sixteen',
    17 => 'Seventeen',
    18 => 'Eighteen',
    19 => 'Nineteen',
    20 => 'Twenty',
    30 => 'Thirty',
    40 => 'Forty',
    50 => 'Fifty',
    60 => 'Sixty',
    70 => 'Seventy',
    80 => 'Eighty',
    90 => 'Ninety',
    100 => 'Hundred',
    1000 => 'Thousand',
    ];

    function convertToWords($number, $dictionary) {
    if ($number == 0) {
    return $dictionary[0];
    }

    $result = '';

    if ($number >= 1000) {
    $thousands = intval($number / 1000);
    $remainder = $number % 1000;
    $result .= convertToWords($thousands, $dictionary) . ' ' . $dictionary[1000];
    if ($remainder > 0) {
    $result .= ' ' . convertToWords($remainder, $dictionary);
    }
    } elseif ($number >= 100) {
    $hundreds = intval($number / 100);
    $remainder = $number % 100;
    $result .= $dictionary[$hundreds] . ' ' . $dictionary[100];
    if ($remainder > 0) {
    $result .= ' and ' . convertToWords($remainder, $dictionary);
    }
    } elseif ($number >= 20) {
    $tens = intval($number / 10) * 10;
    $units = $number % 10;
    $result .= $dictionary[$tens];
    if ($units > 0) {
    $result .= '-' . $dictionary[$units];
    }
    } else {
    $result .= $dictionary[$number];
    }

    return $result;
    }

    $result = convertToWords($word, $dictionary);
    $result = ucfirst($result); // Capitalize the first letter
    @endphp

    <p class="margin-bottom"><b><i>{{ $result }}</i></b></p>

    <div class="special_bottom border row">
        <div class="col-md-6 offset-sm-3 text-center mb-3">
            <label for="msme_udyam_reg_number"><strong>MSME- UDYAM REGISTRATION NUMBER:</strong></label>
            </br>
            <span>
                {{ $gstPdfRecord->msme_udyam_reg_number ?? 'N/A' }}
            </span>
        </div>
    </div>

    <div class="border row d-flex">
        <div class="col-4">
            <label for="bank_details"><strong>Bank Details:</strong></label>
            <span>
                {{ $gstPdfRecord->bank_details ?? 'N/A' }}
            </span>
        </div>
        <div class="col-4">
            <label for="account_number"><strong>Account Number:</strong></label>
            <span>
                {{ $gstPdfRecord->account_number ?? 'N/A' }}
            </span>
        </div>
        <div class="col-4">
            <label for="ifsc_code"><strong>IFSC Code:</strong></label>
            <span>
                {{ $gstPdfRecord->ifsc_code ?? 'N/A' }}
            </span>
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

</div>
@endsection