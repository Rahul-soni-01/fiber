<!DOCTYPE html>
<html>

<head>
    <title>Report Details</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="public/js/script.js"></script>
    <script src="/public/js/jquery-3.7.1.min.js"></script>
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
            /* width: 210mm;
        height: 297mm; */
        }

        .main {
            /* margin: 20mm; */
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
            border-bottom: 1px solid #ddd;
            border: none;
            background-color: #2C3E50;
            color: #ddd;
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
            margin: 5px 0;
            text-align: right;
        }

        .summary {
            margin-top: 20px;
            border: 1px solid #ddd;
            padding: 10px;
        }

        .footer {
            padding: 10px 0;
            border-top: 1px solid #ddd;
            background-color: #2C3E50;
            color: white;
            width: 100%;
            margin-top: 20px;
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .footer-content {
            width: 100%;
            border-collapse: collapse;
            /* table-layout: fixed; */
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
            border: 1px solid black;
            text-align: center;
        }

        .table-container td {
            /* border: 1px solid #ddd; */
            padding: 8px;
            border: 1px solid black;
            /* border: 1px solid; */
        }

        .table-container th {
            background-color: #f8f9fa;
            font-weight: bold;
            text-align: center;
            border: 1px solid black;
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

        .badge-success {
            background-color: #5cb85c;
        }

        .badge-danger {
            background-color: #d9534f;
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
    <div class="main">
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
                    <td class="header-center" width="65%" align="center">
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
                    <td class="header-right" width="5%" align="right">
                        {{-- <p>Sale Date:- {{ date('d-m-Y', strtotime($sale['sale_date'])) }}</p>
                        <h3>Invoice No - {{ $sale['sale_id']}}</h3>
                        <p><strong>Customer</strong> {{ $sale->customer->customer_name }}</p>--}}
                    </td>
                </tr>
            </table>
            <table class="subheader-content">
            </table>
        </div>
        <div class="container">
            <div class="container">
                <div class="table-container">
                    <div class="header-center" width="50%" align="center">
                        <h3>Report Details</h3>
                    </div>
                    <table class="table" border="1">
                        <tr>
                            <th>Part</th>
                            <td>
                                @if($report->part == 0) New
                                @else Reparing
                                @endif
                            </td>
                            <th>Temp no.</th>
                            <th>WORKER NAME</th>
                            <td colspan="2">{{ $report->worker_name}}</td>
                        </tr>
                        <tr>
                            <th>SR(FIBER) </th>
                            <td>{{ $report->sr_no_fiber}}</td>
                            <td>{{ $report->temp}}</td>
                            <th>M.J</th>
                            <td colspan="2">{{ $report->m_j ?? 'N/A'}}</td>
                        </tr>
                        <tr>
                            <th>Warranty</th>
                            <td>
                                @if($report->r_status == 0)
                                No warranty
                                @elseif($report->r_status == 1)
                                In Warranty
                                @else
                                Unknown
                                @endif
                            </td>
                            <th></th>
                            <th>Type </th>
                            <th colspan="2">{{ $report->tbl_type->name ?? 'N/A'}}</th>
                        </tr>
                        <tr style="margin-top: 5px;">
                            <th>ITEM</th>
                            <th>SR</th>
                            <th>AMP</th>
                            <th>VOLT</th>
                            <th>WATT</th>
                            <th>Dead</th>
                        </tr>
                        <tbody>
                            @foreach ($reportitems as $index => $item)
                            <tr>
                                <td><span> {{ $item->tbl_sub_category->sub_category_name }} ( @if ($item['unit'] == 'Pic') Pcs @else {{ $item['unit'] }}  @endif) </span></td>
                                <td>{{ $item->sr_no }}</td>
                                <td>{{ $item->amp }} </td>
                                <td>{{ $item->volt }} </td>
                                <td>{{ $item->watt }}</td>
                                <td>
                                    @if($item->dead_status == 0)
                                    <span class="badge-success">Active</span>
                                    @elseif($item->dead_status == 1)
                                    <span class="badge-danger">Dead</span>
                                    @else
                                    Unknown
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <th rowspan="2">NOTE</th>
                                <td colspan="4">
                                    <span>{{ $report->note1 }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <span>{{ $report->note2 }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="3">Final Amount (Manufacturing Cost)</th>
                                <td colspan="3"> {{$report->final_amount}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
        <p style="margin-bottom:0px; font-size:8px;">Time: {{ \Carbon\Carbon::now() }} by {{ auth()->user()->email}}</p>
    </div>
</body>

</html>