<!DOCTYPE html>
<html>

<head>
    <title>Bank Report</title>

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
            background-color: #F9F9F9;
            border: 1px solid #111;
        }

        .container {
            display: flex;
            width: 100%;
            margin: 0 auto;
            padding-bottom: 10px;
            border-bottom: 1px solid #000000;
        }

        .row {
            display: table;
            width: 100%;
            font-size: 10px;
            /* border-bottom: 1px solid #000000; */
            /* border: 1px solid; */
            /* border-right: 1px solid;
            border-left: 1px solid;
            border-top: 1px solid; */
        }
        .border-top{
            border-top: 1px solid #111;
        }
        .border-right{
            border-right: 1px solid #111;
        }
        .column {
            display: table-cell;
            width: 50%;
            vertical-align: top;
            padding: 6px;
        }

        .header {
            width: 100%;
            font-family: Arial, sans-serif;
            font-size: 12px;
            text-align: center;
            border-bottom: 1px solid #000000;
            background-color: #F9F9F9;
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
            background-color: #F9F9F9;
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

        .margin-top-minus {
            margin-top: -20px;
            margin-bottom: 0px;
        }

        .right {
            float: right;
            justify-content: right;
            align-items: right;
            text-align: right;
        }
        .center{
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .border-bottom {
            border-bottom: 1px solid #111;
        }
        @page {
            margin-bottom: 10px;
        }

        @media print {
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
    <div class="header">
        @php
        $websetting = DB::table('web_settings')->where('id', 1)->first();
        @endphp
        <div class="row">
            <div class="column header-left">
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
            </div>
            <div class="column header-center">
                <h1> Purchase Order</h1>
            </div>
            <div class="column header-right border-right">
                <p>Purchase Date:- {{ date('d-m-Y', strtotime($inwards[0]['date'])) }}</p>
                <h3>Invoice No - {{ $invoice_no}}</h3>
                <p><strong>Supplier</strong> {{ $inwards[0]->party->party_name }}</p>
            </div>
        </div>
    </div>
    <div class="row center" width="45%" align="center">
        <h3>Product Details</h3>
    </div>
    <div class="container">
        @foreach ($inwards as $item)
        <div class="row border-bottom border-top">
            <div class="column"><strong>Category Name</strong></div>
            <div class="column"><strong>Sub Category Name</strong></div>
            <div class="column"><strong>Unit</strong></div>
            <div class="column"><strong>Qty</strong></div>
            <div class="column"><strong>Rate</strong></div>
            <div class="column"><strong>Total</strong></div>
            <div class="column"><strong>Tax(%)</strong></div>
            <div class="column"><strong>Total(T)</strong></div>
        </div>
        @foreach ($inwardsItems as $item1)
        <div class="row">
            <div class="column">{{ $item1->category->category_name ?? 'N/A' }}</div>
            <div class="column">{{ $item1->subCategory->sub_category_name ?? 'N/A' }}</div>
            <div class="column">{{ $item1['unit'] ?? 'N/A' }}</div>
            <div class="column">{{ $item1['qty'] ?? 0 }}</div>
            <div class="column">{{ $item1['price'] ?? 0 }}</div>
            <div class="column">{{ $item1['total'] ?? 0 }}</div>
            <div class="column">{{ $item1['tax'] ?? 0 }}</div>
            <div class="column">{{ ($item1['total'] ?? 0) + (($item1['total'] ?? 0) * ($item1['tax'] ?? 0) / 100) }}
            </div>
        </div>
        @endforeach
        <div class="row border-top">
            <div class="column"></div>
            <div class="column"></div>
            <div class="column"></div>
            <div class="column right"><strong>Amount ($/¥)</strong></div>
            <div class="column center">{{ $item['amount'] }}</div>
        </div>
        <div class="row">
            <div class="column"></div>
            <div class="column"></div>
            <div class="column"></div>
            <div class="column right"><strong>Rate (INR)</strong></div>
            <div class="column center">{{ $item['inr_rate'] }}</div>
        </div>
        <div class="row">
            <div class="column"></div>
            <div class="column"></div>
            <div class="column"></div>
            <div class="column right"><strong>Amount (INR)</strong></div>
            <div class="column center">{{ $item['inr_amount'] }}</div>
        </div>
        <div class="row">
            <div class="column"></div>
            <div class="column"></div>
            <div class="column"></div>
            <div class="column right"><strong>Shipping Cost</strong></div>
            <div class="column center">{{ $item['shipping_cost'] ?? 0 }}</div>
        </div>
        <div class="row">
            <div class="column"></div>
            <div class="column"></div>
            <div class="column"></div>
            <div class="column right"><strong>Total Amount</strong></div>
            <div class="column center">{{ $item['inr_amount'] + $item['shipping_cost'] }}</div>
        </div>
        <div class="row">
            <div class="column"></div>
            <div class="column"></div>
            <div class="column"></div>
            <div class="column right"><strong>Round Amount</strong></div>
            <div class="column center">{{ $item['round_amount'] ?? 0 }}</div>
        </div>
        <div class="row">
            <div class="column"></div>
            <div class="column"></div>
            <div class="column"></div>
            <div class="column right"><strong>Final Amount</strong></div>
            <div class="column center">
                <h3>{{ $item['inr_amount'] + $item['shipping_cost'] - $item['round_amount'] }}</h3>
            </div>
        </div>
    </div>
    @endforeach

    <div class="footer row border-bottom border-right">
        <div class="column left">
            <span>hello@maktech.com</span><br>
            <span>555 444 6666</span>
        </div>
        <div class="column center">
            <span>Thank You</span>
        </div>
        <div class="column right">
            <span>Authorized Signatory</span><br><br><br>
            <span>_________________________</span>
        </div>
    </div>

    <p style="margin-bottom:0px; font-size:8px;">Time: {{ \Carbon\Carbon::now() }}</p>

</body>

</html>