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
        /* //  width: 210mm;
        //  height: 297mm;  */
        }

        .row {
            display: table;
            width: 100%;
            font-size: 14px;
        }
        .column {
            display: table-cell;
            width: 50%;
            vertical-align: top;
            border-bottom: 1px solid black;
            border-left: 1px solid black;
            padding: 10px;
            /* border: 1px solid black; */
        }
        
        .subheader-content-2 {
            border-right: 1px solid black;
        }
        
        .container {
            display: flex;
            width: 100%;
            margin: 0 auto;
            padding-bottom: 10px;
        }

        .header {
            width: 100%;
            font-family: Arial, sans-serif;
            font-size: 12px;
            text-align: center;
        /* //  border-bottom: 1px solid #ddd;  */
            border: 1px solid black;
        }
        
        .header-content {
            border-collapse: collapse;
            table-layout: fixed;
            margin: 0 auto;
            border: none;
            font-size: 16px;
        }

        .header-content td {
            vertical-align: top;
            padding: 10px;
            border: none;
        }

        .header-left img {
            display: block;
            margin: 0 auto;
        }

        .header-center h1 {
            margin: 0;
            font-size: 24px;
            text-align: center;
        }

        .header-right p,
        .header-right h3 {
            margin-top: 0px;
            text-align: right;
            font-size: 8px;
        }

        .summary {
            margin-top: 20px;
            border: 1px solid #ddd;
            padding: 10px;
        }

        .footer {
            padding: 10px 0;
            border-top: 1px solid #ddd;
            width: 100%;
            margin-top: 20px;
            font-family: Arial, sans-serif;
            font-size: 12px;
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

        .text-success {
            color: #fff;
            font-size: 18px;
        }

        .text-danger {
            color: red;
        }

        .table-container {
            text-align: right;
            width: 100%;
        }

        .table-container table {
            width: 100%;
            margin-left: auto;
            margin-right: 0;
            border: 1px solid;
            border: 1px solid #ddd;
        }

        .table-container table,
        .table-container th,
        .table-container td {
            padding: 8px;
        }

        .table-container th {
            background-color: #f8f9fa;
            font-weight: bold;
            text-align: right;
        }

        .table-container tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .table-container tr:nth-child(even) {
            background-color: #fff;
        }

        .denis {
            height: 70px;
            width: 150px;
            background-color: #fff;
            float: right;
        }

        @page {
            margin-bottom: 10px;
        }

        @media screen {
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
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
                    <img src="data:image/jpeg;base64,{{ $imageData }}" width="150" height="100">
                    @else
                    <p>Invoice logo not available</p>
                    @endif
                </td>
                <td class="header-center" width="60%" align="center">
                    <h2 style="font-size:12px; margin-top:-5px;">TAX INVOICE</h2>
                    <h1 style="font-size:18px; margin-top:-12px;">{{ $websetting->company_name}}</h1>
                    <p style="font-size:10px; margin-top:5px;"> {{ $websetting->company_address}}</br>
                        PAN: {{ $websetting->PAN_no}}
                    </p>
                    <h3 style="font-size:14px; margin-top:-15px;">GSTIN: {{ $websetting->GSTIN_no}} </h3>
                    <p style="font-size:10px;margin-top:-15px;">Tel. Mo No :{{ $websetting->phno}}
                        &nbsp;&nbsp;&nbsp;
                        Email:{{ $websetting->email}} </p>
                    <h3 style="font-size:14px; margin-top:-15px;">LUT No:{{ $websetting->lutno}} </h3>
                </td>
                <td class="header-right" width="10%" align="right">
                    <p> Original Copy </p>
                </td>
            </tr>
        </table>
    </div> 

    <div class="subheader row">
        <div class="column subheader-content-1">
            <table class="">
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
                    <td style="font-size: 12px;"> {{ $websetting->company_address}}</td>
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
        <div class="column subheader-content-2">
            <table class="">
                <tr>
                    <td>Transport:</td>
                    <td> Self </td>
                </tr>
                <tr>
                    <td>Vehicle No:</td>
                    <td> </td>
                </tr>
                <tr>
                    <td>Station :</td>
                    <td style="font-size: 12px;"> {{ $sale->customer->address}}</td>
                </tr>
                <tr>
                    <td>E-Way Bill NO. :</td>
                    <td>  </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="subheader row">
        <div class="column ">
            <table class="">
                <tr>
                    <th>Billed To</th>
                    <td style="font-size: 12px;"> {{ $sale->customer->address}}</td>
                </tr>
                <tr>
                    <th>GST / UIN :</th>
                    <td> {{ $sale->customer->gst_no}}</td>
                </tr>
            </table>
        </div>
        <div class="column ">
            <table class="">
                <tr>
                    <th>Shipped to</th>
                    <td style="font-size: 12px;"> {{ $sale->customer->address}}</td>
                </tr>
                <tr>
                    <th>GST / UIN :</th>
                    <td> {{ $sale->customer->gst_no}}</td>
                </tr>
            </table>
        </div>
    </div>

     <div class="container">

        <div class="table-container">
            <div class="header-center" width="50%" align="center">
                <h3>Product Details</h3>
            </div>
            <table class="table table-striped" border="1">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Sub Category Name</th>
                        <th>Unit</th>
                        <th>Qty</th>
                        <th>Rate</th>
                        <th>Total</th>
                        <th>Tax(%)</th>
                        <th>Total(T)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sale['items'] as $item1)
                    <tr>
                        <td>{{ $item1->category->name }}</td>
                        <td>{{ $item1->subCategory->name }}</td>
                        <td>{{ $item1['unit'] }}</td>
                        <td>{{ $item1['qty'] }}</td>
                        <td>{{ $item1['rate'] }}</td>
                        <td>{{ $item1['qty']*$item1['rate']}}</td>
                        <td>{{ $item1['p_tax'] ?? 0 }}</td>
                        <td>{{ $item1['total'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-container">
            <table class="table table-striped mt-3 ">
                <tbody>

                    <tr>
                        <td width=60%></td>
                        <td>Amount (INR)</td>
                        <td>{{ $sale['amount_r'] }}</td>
                    </tr>
                    <tr>
                        <td width=60%></td>
                        <td>Shipping Cost</td>
                        <td>{{ $sale['shipping_cost'] }}</td>
                    </tr>
                    <tr>
                        <td width=60%></td>
                        <td>Total Amount</td>
                        <td>{{ $sale['inr_amount'] + $sale['shipping_cost'] }}</td>
                    </tr>
                    <tr>
                        <td width=60%></td>
                        <td>Round Amount</td>
                        <td>{{ $sale['round_total'] }}</td>
                    </tr>
                    <tr>
                        <td width=60%></td>
                        <td>Final Amount</td>
                        <td>{{ $sale['amount_r'] + $sale['shipping_cost'] - $sale['round_total'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> 


    <div class="footer">
        <table class="footer-content" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="footer-left">
                    <br><br><br><br>
                    <span>hello@maktech.com</span><br>
                    <span>555 444 6666</span>
                </td>
                <td class="footer-center">
                    <br><br><br><br>
                    <span>!! Thank You !!</span>
                </td>
                <td class="footer-right">
                    <span>Authorized Signatory</span><br>
                    <br>
                    <div class="denis"> </div> <br>
                    <span>&nbsp;</span>
                </td>
            </tr>
        </table>
    </div>

    <p style="margin-bottom:0px; font-size:8px;">Time: {{ \Carbon\Carbon::now() }}</p>

</body>

</html>