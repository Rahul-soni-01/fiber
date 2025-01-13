<!DOCTYPE html>
<html>

<head>
    <title>Sale Invoice</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            position: relative;
            border: 1px solid black;
            /* //  width: 210mm;
            //  height: 297mm;  */
        }

        .row {
            display: table;
            width: 100%;
            font-size: 12px;
            border-bottom: 1px solid;
        }

        .row_without_bottom {
            display: table;
            width: 100%;
            font-size: 12px;
            text-align: center;
        }

        .column {
            display: table-cell;
            width: 50%;
            vertical-align: top;
            /* border-bottom: 1px solid black; */
            /* border-left: 1px solid black; */
            /* padding: 10px; */
            /* border: 1px solid black; */
        }

        .column_1 {
            padding-left: 2%;
        }

        .subheader-content-2 {
            /* border-right: 1px solid black; */
        }

        .float-right {
            transform-origin: bottom left;
        }

        .bottom {
            padding-bottom: 10px;
            padding-right: 10px;
        }

        .header {
            width: 100%;
            font-family: Arial, sans-serif;
            font-size: 10px;
            text-align: center;
            border-bottom: 1px solid;
        }

        .header-content {
            border-collapse: collapse;
            table-layout: fixed;
            margin: 0 auto;
            border: none;
            font-size: 14px;
        }

        .header-content td {
            vertical-align: top;
            padding: 3px;
            border: none;
        }

        .header-left img {
            display: block;
            margin: 0 auto;
        }

        .header-center h1 {
            margin: 0;
            font-size: 16px;
            text-align: center;
        }

        .header-right p,
        .header-right h3 {
            margin-top: 0px;
            text-align: right;
            font-size: 6px;
        }

        .summary {
            margin-top: 20px;
            border: 1px solid #ddd;
            padding: 10px;
        }

        .footer {
            padding: 10px 0;
            border-top: 1px solid #000000;
            width: 100%;
            margin-top: 20px;
            font-family: Arial, sans-serif;
            font-size: 8px;
        }

        .footer-content {
            width: 100%;
            border-collapse: collapse;
            border: none;
        }

        .footer-content td {
            padding: 10px;
            vertical-align: top;
            border: none;
        }

        .footer-left {
            text-align: left;
        }

        .footer-center {
            text-align: center;
        }

        .footer-right {
            text-align: right;
        }

        .container {
            display: flex;
            width: 100%;
            font-size: 10px;
            margin: 0 auto;
            padding-bottom: 10px;
        }

        .table-container {
            text-align: right;
            width: 100%;
        }

        .table-container table {
            width: 100%;
            margin-left: auto;
            margin-right: 0;
        }

        .table-container th {
            background-color: #f8f9fa;
            text-align: right;
        }

        .margin-bottom {
            border-bottom: 1px solid black;
        }

        .margin-bottom_2 {
            border-bottom: 1px solid black;
        }

        .special_bottom {}

        .padding_left {
            padding-left: 2%;
        }

        .padding_left_1 {
            padding-left: 10px;
        }

        .margin_top {
            margin-top: -2px;
            font-size: 10px;
        }

        .msme {
            font-size: 12px;
            bottom: 0;
        }

        .border-right {
            border-right: 1px solid black;
        }

        .denis {
            height: 70px;
            width: 150px;
            float: right;
            margin-right: 1px;
        }

        .margin-top-minus-2 {
            margin-top: -7px;
        }

        @page {
            margin-bottom: 10px;
        }

        @media screen {
            body {
                font-family: Arial, sans-serif;
                margin: 2px;
                background-color: #f9f9f9;
            }
        }

        @media print {
            body {
                font-family: 'Times New Roman', serif;
                margin: 0;
                width: 210mm;
                height: 297mm;
                background-color: #fff;
            }

            .footer {
                position: absolute;
                bottom: 0;
            }
        }

        @media print {
            .container {
                page-break-before: always;
            }
        }
    </style>
</head>

<body>
    @php
    $websetting = DB::table('web_settings')->where('id', 1)->first();
    @endphp
    <div class="header">
        <table class="header-content" border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td class="header-left" width="30%" align="left">
                    @php
                    $websetting = DB::table('web_settings')->where('id', 1)->first();
                    $imagePath = public_path($websetting->invoice_logo); // Resolve full file path
                    $imageData = '';

                    if (file_exists($imagePath)) {
                    $imageData = base64_encode(file_get_contents($imagePath));
                    }
                    @endphp
                    @if(!empty($imageData))
                    <img src="data:image/jpeg;base64,{{ $imageData }}" width="150" height="70">
                    @else
                    <p>Invoice logo not available</p>
                    @endif
                </td>
                <td class="header-center" width="60%" align="center">
                    <h2 style="font-size:8px; margin-top:-5px;">TAX INVOICE</h2>
                    <h1 style="font-size:14px; margin-top:-12px;">{{ $websetting->company_name}}</h1>
                    <p style="font-size:6px; margin-top:-2px;"> {{ $websetting->company_address}}</br>
                        PAN: {{ $websetting->PAN_no}}
                    </p>
                    <h3 style="font-size:10px; margin-top:-8px;">GSTIN: {{ $websetting->GSTIN_no}} </h3>
                    <p style="font-size:8px;margin-top:-12px;">Tel. Mo No :{{ $websetting->phno}}
                        &nbsp;&nbsp;&nbsp;
                        Email:{{ $websetting->email}} </p>
                    <h3 style="font-size:10px; margin-top:-8px;">LUT No:{{ $websetting->lutno}} </h3>
                </td>
                <td class="header-right" width="10%" align="right">
                    <p> Original Copy </p>
                </td>
            </tr>
        </table>
    </div>

    <div class="subheader row">
        <div class="column subheader-content-1">
            <table>
                <tr>
                    <td>Invoice :</td>
                    <td> {{ $gstPdfRecord->invoice_no }}</td>
                </tr>
                <tr>
                    <td>Dated :</td>
                    <td> {{ $gstPdfRecord->date }}</td>
                </tr>
                <tr>
                    <td>Place of Supply : </td>
                    <td style="font-size: 12px;">{{ $gstPdfRecord->place_of_supply}}</td>
                </tr>
                <tr>
                    <td>Reverse Charge :</td>
                    <td> {{ $gstPdfRecord->reverse_charge}} </td>
                </tr>
                <tr>
                    <td>GR/RR No :</td>
                    <td> {{ $gstPdfRecord->gr_rr_no}} </td>
                </tr>
            </table>
        </div>
        <div class="column subheader-content-2" style="border-left: 1px solid;">
            <table>
                <tr>
                    <td>Transport:</td>
                    <td> {{ $gstPdfRecord->transport}} </td>
                </tr>
                <tr>
                    <td>Vehicle No:</td>
                    <<td> {{ $gstPdfRecord->vehicle_no}} </td>
                </tr>
                <tr>
                    <td>Station :</td>
                    <td style="font-size: 12px;"> {{ $gstPdfRecord->station}}</td>
                </tr>
                <tr>
                    <td>E-Way Bill no :</td>
                    <td> {{ $gstPdfRecord->e_way_bill_no}} </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="subheader row">
        <div class="column">
            <table>
                <tr>
                    <td><strong> Billed To : </strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2" style="font-size: 12px;"> {{ $gstPdfRecord->billed_to ?? 'N/A' }},
                        {{ $gstPdfRecord->billed_city ?? 'N/A' }}, {{ $gstPdfRecord->billed_state ?? 'N/A' }}
                    </td>
                </tr>
                <tr>
                    <td> <strong>GST / UIN : </strong></td>
                    <td> {{ $gstPdfRecord->billed_gstin_uin ?? 'N/A' }}</td>
                </tr>
            </table>
        </div>
        <div class="column" style="border-left: 1px solid;">
            <table>
                <tr>
                    <td> <strong> Shipped to :</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2" style="font-size: 12px;"> {{ $gstPdfRecord->shipped_to ?? 'N/A' }} {{
                        $gstPdfRecord->shipped_city ?? 'N/A' }}, {{ $gstPdfRecord->shipped_state ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td> <strong>GST / UIN : </strong></td>
                    <td> {{ $gstPdfRecord->shipped_gstin_uin ?? 'N/A' }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="border row mt-2">
        <div class="column">
            IRN:
            <span>
                {{ $gstPdfRecord->irn ?? 'N/A' }}
            </span>
        </div>
        <div class="column">
            Ack No:
            <span>
                {{ $gstPdfRecord->ack_no ?? 'N/A' }}
            </span>
        </div>
        <div class="column">
            Ack Date:
            <span>
                {{ $gstPdfRecord->ack_date ?? 'N/A' }}
            </span>
        </div>
    </div>
    <div class="margin-bottom">
        <div class="row_without_bottom">
            <div class="column border-right"> <strong> S.N. </strong></div>
            <div class="column border-right"> <strong> Description Of Goods </strong></div>
            <div class="column border-right"> <strong> HSN/Code </strong></div>
            <div class="column border-right"> <strong> Qty </strong></div>
            <div class="column border-right"> <strong> Unit </strong></div>
            <div class="column border-right"> <strong> Price </strong></div>
            <div class="column"> <strong> Total(T) </strong></div>
        </div>
    </div>
    <div class="margin-bottom">
        @php $qty = 0; @endphp
        @foreach ($gstPdfRecord['items'] as $index => $item1)

        @php
        $qty += $item1['qty'];
        @endphp
        <div class="row_without_bottom">
            <div class="column border-right">{{ $item1['sn']}}</div>
            <div class="column border-right">{{ $item1['description']}}</div>
            <div class="column border-right">{{ $item1['hsn_code']}}</div>
            <div class="column border-right">{{ $item1['qty'] }}</div>
            <div class="column border-right">{{ $item1['unit'] }}</div>
            <div class="column border-right">{{ $item1['price'] }}</div>
            <div class="column"> {{ $item1['total'] }}</div>
        </div>
        @endforeach
    </div>

    <div class="row_without_bottom">
        <div class="column"></div>
        <div class="column"></div>
        <div class="column"></div>
        <div class="column">Add</div>
        <div class="column"> CGST</div>
        <div class="column border-right">@ {{ $gstPdfRecord->igst_per ?? 'N/A' }} %</div>
        <div class="column"> {{ $gstPdfRecord->cgst_amt}}</div>
    </div>
    <div class="row_without_bottom ">
        <div class="column"></div>
        <div class="column"></div>
        <div class="column"></div>
        <div class="column">Add</div>
        <div class="column"> SGST</div>
        <div class="column border-right"> @  {{ $gstPdfRecord->igst_per ?? 'N/A' }}%</div>
        <div class="column"> {{ $gstPdfRecord->sgst_amt}}</div>
    </div>
    <div class="row_without_bottom margin-bottom">
        <div class="column"></div>
        <div class="column"></div>
        <div class="column"></div>
        <div class="column">Add</div>
        <div class="column"> IGST</div>
        <div class="column border-right"> @  {{ $gstPdfRecord->igst_per ?? 'N/A' }} %</div>
        <div class="column"> {{ $gstPdfRecord->igst_amt}}</div>
    </div>

    <div class="row_without_bottom">
        <div class="column"> </div>
        <div class="column"> <strong> Grand Total </strong></div>
        <div class="column"> {{ $qty }} Pcs.</div>
        <div class="column"> </div>
        <div class="column"> </div>
        <div class="column border-right"> {{ $websetting->currency }} </div>
        <div class="column margin-bottom"> <strong>{{ $gstPdfRecord->total_tax_desc }} </strong></div>
    </div>
    <div class="row_without_bottom">
        <div class="column">
            <div class="row_without_bottom">
                <div class="column margin-bottom"> HSN/SAC </div>
                <div class="column margin-bottom"> Tax Rate </div>
                <div class="column margin-bottom"> Taxable Amt </div>
                <div class="column margin-bottom"> CGST Amt </div>
                <div class="column margin-bottom"> SGST Amt </div>
                <div class="column margin-bottom"> IGST Amt </div>
                <div class="column margin-bottom"> Total Amt </div>
            </div>
        </div>
        <div class="column"> </div>
    </div>
    <div class="row_without_bottom">
        <div class="column">
            <div class="row_without_bottom">
                <div class="column"> {{ $gstPdfRecord->hsn_sac_desc }} </div>
                <div class="column"> {{ $gstPdfRecord->tax_rate_desc}} %</div>
                <div class="column"> {{ $gstPdfRecord->taxable_amt_desc}}</div>
                <div class="column"> {{ $gstPdfRecord->cgst_amt_desc }} </div>
                <div class="column"> {{ $gstPdfRecord->sgst_amt_desc }} </div>
                <div class="column"> {{ $gstPdfRecord->rgst_amt_desc }} </div>
                <div class="column"> {{ $gstPdfRecord->total_tax_desc }} </div>
            </div>
        </div>
        <div class="column"> </div>
    </div>

    @php
     $word = $gstPdfRecord->grand_total_amt;
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
    <p class="margin-bottom">{{ $result }}</p>

    <div class="special_bottom row">
        <center class="msme"> MSME- UDYAM REGISTRATION NUMBER </center>
        <center>
            <p class="margin_top"> {{ $gstPdfRecord->msme_udyam_reg_number ?? 'N/A' }}</p>
        </center>
    </div>
    <div class="special_bottom row">
        <div class="msme column_1"><strong>Bank Details :</strong>{{ $gstPdfRecord->bank_details ?? 'N/A' }}, A/C No:-
            {{ $gstPdfRecord->account_number ?? 'N/A' }}, IFSC
            :- {{ $gstPdfRecord->ifsc_code ?? 'N/A' }} </div>
    </div>

    <div class="row ">
        <div class="column padding_left border-right">
            <strong> Terms & Conditions</strong>
            <p>1. Goods once sold will not be taken back.</p>
            <p>2. Interest @ 18% p.a. will be charged For MAKTECH </p>
            <p>is not made within the stipulated time. </p>
            <p>3. Subject to 'Surat' Jurisdiction only.</p>
            <p>4. Supply meant for SEZ under LUT without payment of integrated tax</p>
        </div>

        <div class="column padding_left_1 border-right">
            <center> <strong> E-Invoice QR Code</strong> </center>
        </div>
        <div class="column padding_left_1">

            <div class="denis">
                <strong> Receiver's Signature:</strong>
            </div>
        </div>
    </div>


    <p style="margin-bottom:0px; font-size:4px;">Time: {{ \Carbon\Carbon::now() }}</p>
</body>

</html>