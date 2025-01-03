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
            border: none;
        }

        .table-container table,
        .table-container th,
        .table-container td {
            border: 1px solid #ddd;
            padding: 8px;
            border: none;
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
        <table class="header-content" border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td class="header-left" width="20%" align="left">
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('storage/logo/676d049101b61.jpg'))) }}" width="200" height="100">
                </td>
                <td class="header-center" width="45%" align="center">
                    <h1>Invoice</h1>
                </td>
                <td class="header-right" width="35%" align="right">
                    <p>Purchase Date:-  {{ date('d-m-Y', strtotime($inwards[0]['date'])) }}</p>
                    <h3>Invoice No - {{ $invoice_no}}</h3>
                    <p><strong>Customer</strong> {{ $inwards[0]->party->party_name }}</p>
                </td>
            </tr>
        </table>
    </div>

    <div class="container">
        @foreach ($inwards as $item)
        <div class="container">
            
            <div class="table-container">
                <div class="header-center" width="50%" align="center">
                    <h3>Product Details</h3>
                </div>
                <table class="table table-bordered">
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
                        @foreach ($inwardsItems as $item1)
                        <tr>
                            <td>{{ $item1->category->category_name }}</td>
                            <td>{{ $item1->subCategory->sub_category_name }}</td>
                            <td>{{ $item1['unit'] }}</td>
                            <td>{{ $item1['qty'] }}</td>
                            <td>{{ $item1['price'] }}</td>
                            <td>{{ $item1['total'] }}</td>
                            <td>{{ $item1['tax'] ?? 0 }}</td>
                            <td>{{ $item1['total'] + ($item1['total'] * $item1['tax'] / 100) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Financial Summary Table -->
            <div class="table-container">
                <table class="table table-bordered mt-3">
                    <tbody>
                        <tr>
                            <td width=60%></td>
                            <td>Amount ($/¥)</td>
                            <td>{{ $item['amount'] }}</td>
                        </tr>
                        <tr>
                            <td width=60%></td>
                            <td>Rate (INR)</td>
                            <td>{{ $item['inr_rate'] }}</td>
                        </tr>
                        <tr>
                            <td width=60%></td>
                            <td>Amount (INR)</td>
                            <td>{{ $item['inr_amount'] }}</td>
                        </tr>
                        <tr>
                            <td width=60%></td>
                            <td>Shipping Cost</td>
                            <td>{{ $item['shipping_cost'] }}</td>
                        </tr>
                        <tr>
                            <td width=60%></td>
                            <td>Total Amount</td>
                            <td>{{ $item['inr_amount'] + $item['shipping_cost'] }}</td>
                        </tr>
                        <tr>
                            <td width=60%></td>
                            <td>Round Amount</td>
                            <td>{{ $item['round_amount'] }}</td>
                        </tr>
                        <tr>
                            <td width=60%></td>
                            <td>Final Amount</td>
                            <td>{{ $item['inr_amount'] + $item['shipping_cost'] - $item['round_amount'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
        @endforeach
    </div>

    <div class="footer">
        <table class="footer-content" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="footer-left">
                    <span>hello@maktech.com</span><br>
                    <span>555 444 6666</span>
                </td>
                <td class="footer-center">
                    <span>Thank You</span>
                </td>
                <td class="footer-right">
                    <span>Authorized Signatory</span><br><br><br>
                    <span>_________________________</span>
                </td>
            </tr>
        </table>
    </div>

    <p style="margin-bottom:0px; font-size:8px;">Time: {{ \Carbon\Carbon::now() }}</p>

</body>

</html>