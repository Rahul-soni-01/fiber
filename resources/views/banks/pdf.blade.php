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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        .tabletd {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            background-color: #cae2fa;
            border:none;
        }

        th {
            background-color: #7aa8d7;
            font-weight: bold;
            color: white;
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
            table-layout: fixed;
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
        .text-success{
            color: #fff;
            font-size: 18px;
        }
        .text-danger{
            color: red;
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
                <!-- Logo Section -->
                <td class="header-left" width="20%" align="left">
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('storage/logo/676d049101b61.jpg'))) }}" width="200" height="100">
                </td>
                <!-- Title Section -->
                <td class="header-center" width="50%" align="center">
                    <h1>Bank Report</h1>
                </td>
                <!-- Additional Details Section -->
                <td class="header-right" width="30%" align="right">
                    <p>{{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
                    <h3>{{ $bank->bank_name }}</h3>
                    <p><strong>Opening Balance:</strong> {{ number_format($bank->opening_balance, 2) }}</p>
                </td>
            </tr>
        </table>
    </div>



    <div class="container">
        <table class="table table-bordered datatable-remove">
            <thead class="table-bordered">
                <tr>
                    <th width="30%" bgcolor="#E7E0EE" align="center">Particulars
                    </th>
                    <th width="10%" bgcolor="#E7E0EE" align="center"> Date</th>
                    <th width="20%" bgcolor="#E7E0EE" align="center" class="text-center">Debit</th>
                    <th width="20%" bgcolor="#E7E0EE" align="center" class="text-center">Credit</th>
                    <th width="20%" bgcolor="#E7E0EE" align="center" class="text-center">Balance</th>
                </tr>
            </thead>
            @php
            $balance = 0;
            @endphp
            <tbody>
                <tr>
                    <td class="tabletd">
                        Opening Balance
                    </td>
                    <td class="tabletd"></td>
                    <td class="tabletd"></td>
                    <td class="tabletd"></td>
                    <td class="tabletd" align="center"> {{ number_format($balance = $bank->opening_balance ?? 0,2) }} </td>
                </tr>
                @foreach($all_payments as $all_payment)
                <tr>
                    <td class="tabletd">
                        @if(isset($all_payment->supplier_id))
                        {{ $all_payment->supplier->party_name ?? 'N/A' }}
                        @elseif(isset($all_payment->customer_id))
                        {{ $all_payment->customer->customer_name ?? 'N/A' }}
                        @else
                        {{ $all_payment->name ?? 'N/A' }}
                        @endif

                    </td>
                    <td align="center" class="tabletd">
                        {{ ($all_payment->payment_date)}}
                    </td>
                    <td align="center" class="tabletd">
                        @if(isset($all_payment->supplier_id))
                        {{ number_format($all_payment->amount_paid, 2) }}
                        @php $balance -= $all_payment->amount_paid; @endphp

                        @else
                        -
                        @endif
                    </td>
                    <td align="center" class="tabletd">
                        @if(isset($all_payment->customer_id))
                        {{ number_format($all_payment->amount_paid, 2) }}
                        @php $balance += $all_payment->amount_paid; @endphp
                        @else
                        -
                        @endif
                    </td>
                    <td align="center" class="tabletd">
                        {{ number_format($balance, 2) }} {{-- Updated balance --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td class="tabletd" colspan="4" align="right"><strong>Final Balance:</strong></td>
                    <td style="background-color: cadetblue; text-align:center;" class="text-center fw-bold {{ $balance >= 0 ? 'text-success' : 'text-danger' }}">
                        {{ number_format($balance, 2) }}
                    </td>
                </tr>
            </tfoot>
        </table>

        <div class="summary">
            <h3>Summary</h3>
            <p><strong>Total Customer Payments:</strong> {{ number_format($total_customer_payment, 2) }}</p>
            <p><strong>Total Supplier Payments:</strong> {{ number_format($total_supplier_payment, 2) }}</p>
        </div>
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