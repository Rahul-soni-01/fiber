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
            font-size: 10px;
            border-bottom: 1px solid;
        }

        .row_without_bottom {
            display: table;
            width: 100%;
            font-size: 10px;
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
            font-size: 8px;
            text-align: center;
            border-bottom: 1px solid;
        }

        .header-content {
            border-collapse: collapse;
            table-layout: fixed;
            margin: 0 auto;
            border: none;
            font-size: 12px;
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
                    <td> {{ $sale->sale_id }}</td>
                </tr>
                <tr>
                    <td>Dated :</td>
                    <td> {{ $sale->sale_date }}</td>
                </tr>
                <tr>
                    <td>Place of Supply : </td>
                    <td style="font-size: 8px;">{{ $sale->customer->state}}</td>
                </tr>
                <tr>
                    <td>Reverse Charge :</td>
                    <td> N/A </td>
                </tr>
                <tr>
                    <td>GR/RR No :</td>
                    <td> </td>
                </tr>
            </table>
        </div>
        <div class="column subheader-content-2" style="border-left: 1px solid;">
            <table>
                <tr>
                    <td>Transport:</td>
                    <td> Self </td>
                </tr>
                <tr>
                    <td>Vehicle No:</td>
                    <td> N/A </td>
                </tr>
                <tr>
                    <td>Station :</td>
                    <td style="font-size: 8px;"> {{ $sale->customer->address}}</td>
                </tr>
                <tr>
                    <td colspan="2">E-Way Bill no :</td>
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
                    <td colspan="2" style="font-size: 8px;"> {{ $sale->customer->address}}</td>
                </tr>
                <tr>
                    <td> <strong>GST / UIN : </strong></td>
                    <td> {{ $sale->customer->gst_no}}</td>
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
                    <td colspan="2" style="font-size: 8px;"> {{ $sale->customer->ship_address}} {{
                        $sale->customer->city}}</td>
                </tr>
                <tr>
                    <td> <strong>GST / UIN : </strong></td>
                    <td> {{ $sale->customer->gst_no}}</td>
                </tr>
            </table>
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
        @foreach ($sale['items'] as $index => $item1)
        @php
        $qty += $item1['qty'];
        @endphp
        <div class="row_without_bottom">
            <div class="column border-right">{{ $index+1}}</div>
            <div class="column border-right">{{ $item1->category->name }}->{{ $item1->subCategory->name }}</div>
            <div class="column border-right"></div>
            <div class="column border-right">{{ $item1['qty'] }}</div>
            <div class="column border-right">{{ $item1['unit'] }}</div>
            <div class="column border-right">{{ $item1['rate'] }}</div>
            <div class="column"> {{ $item1['qty'] * $item1['rate'] }}</div>
        </div>
        @endforeach
    </div>
    @php
    $final = $sale['amount_r'] + $sale['shipping_cost'] - $sale['round_total'];
    $cgst = $final * $websetting->cgst/100;
    $sgst = $final * $websetting->sgst/100;
    @endphp
    <div class="row_without_bottom">
        <div class="column"></div>
        <div class="column"></div>
        <div class="column"></div>
        <div class="column">Add</div>
        <div class="column"> CGST</div>
        <div class="column border-right">@ {{ $websetting->cgst}} %</div>
        <div class="column"> {{ $cgst}}</div>
    </div>
    <div class="row_without_bottom margin-bottom">
        <div class="column"></div>
        <div class="column"></div>
        <div class="column"></div>
        <div class="column">Add</div>
        <div class="column"> SGST</div>
        <div class="column border-right"> @ {{ $websetting->sgst}} %</div>
        <div class="column"> {{ $sgst}}</div>
    </div>

    <div class="row_without_bottom">
        <div class="column"> </div>
        <div class="column"> </div>
        <div class="column"> </div>
        <div class="column"> <strong> Grand Total </strong></div>
        <div class="column"> </div>
        <div class="column border-right"> {{ $websetting->currency }} </div>
        <div class="column margin-bottom"> <strong>{{ $word = $final+ $cgst + $sgst }} </strong></div>
    </div>
    <div class="row_without_bottom">
        <div class="column">
            <div class="row_without_bottom">
                <div class="column margin-bottom"> HSN/SAC </div>
                <div class="column margin-bottom"> Tax Rate </div>
                <div class="column margin-bottom"> Taxable Amt </div>
                <div class="column margin-bottom"> CGST Amt </div>
                <div class="column margin-bottom"> SGST Amt </div>
                <div class="column margin-bottom"> Total Amt </div>
            </div>
        </div>
        <div class="column"> </div>
        <div class="column"> </div>
    </div>
    <div class="row_without_bottom">
        <div class="column">
            <div class="row_without_bottom">
                <div class="column"> </div>
                <div class="column"> {{ $websetting->cgst + $websetting->sgst }} %</div>
                <div class="column"> {{ $cgst + $sgst}}</div>
                <div class="column"> {{ $cgst }} </div>
                <div class="column"> {{ $sgst }} </div>
                <div class="column"> {{ $word }} </div>
            </div>
        </div>
        <div class="column"> </div>
        <div class="column"> </div>
    </div>
    @php
    $word = $final + $cgst + $sgst;

    $dictionary = [
    0 => 'zero',
    1 => 'one',
    2 => 'two',
    3 => 'three',
    4 => 'four',
    5 => 'five',
    6 => 'six',
    7 => 'seven',
    8 => 'eight',
    9 => 'nine',
    10 => 'ten',
    11 => 'eleven',
    12 => 'twelve',
    13 => 'thirteen',
    14 => 'fourteen',
    15 => 'fifteen',
    16 => 'sixteen',
    17 => 'seventeen',
    18 => 'eighteen',
    19 => 'nineteen',
    20 => 'twenty',
    30 => 'thirty',
    40 => 'forty',
    50 => 'fifty',
    60 => 'sixty',
    70 => 'seventy',
    80 => 'eighty',
    90 => 'ninety',
    100 => 'hundred',
    1000 => 'thousand',
    ];

    $result = '';
    if ($word < 21) { $result=$dictionary[$word]; } elseif ($word < 100) { $tens=intval($word / 10) * 10; $units=$word %
        10; $result=$dictionary[$tens] . ($units ? '-' . $dictionary[$units] : '' ); } elseif ($word < 1000) {
        $hundreds=intval($word / 100); $remainder=$word % 100; $result=$dictionary[$hundreds] . ' ' . $dictionary[100] .
        ($remainder ? ' and ' . ($remainder < 21 ? $dictionary[$remainder] : $dictionary[intval($remainder / 10) * 10] .
        ($remainder % 10 ? '-' . $dictionary[$remainder % 10] : '' )) : '' ); } elseif ($word>= 1000) {
        $thousands = intval($word / 1000);
        $remainder = $word % 1000;
        $result = $dictionary[$thousands] . ' ' . $dictionary[1000] . ($remainder ? ' ' . (intval($remainder / 100)
        ? $dictionary[intval($remainder / 100)] . ' ' . $dictionary[100] : '') . ($remainder % 100 ? ' and ' .
        ($remainder % 100 < 21 ? $dictionary[$remainder % 100] : $dictionary[intval(($remainder % 100) / 10) * 10] .
            ($remainder % 10 ? '-' . $dictionary[$remainder % 10] : '' )) : '' ) : '' ); }
            $capitalizedResult=ucwords($result); @endphp <p class="margin-bottom">{{ $capitalizedResult }}</p>


            <div class="special_bottom row">
                <center class="msme"> MSME- UDYAM REGISTRATION NUMBER </center>
                <center>
                    <p class="margin_top">UDYAM-GJ-22-0324303</p>
                </center>
            </div>
            <div class="special_bottom row">
                <div class="msme column_1"><strong>Bank Details :</strong>KOTAK MAHINDRA BANK, A/C No:- 1011975493, IFSC
                    :- KKBK0002849 </div>

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