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
            background-color: #F9F9F9;
            /* line-height: 1.6; */
            line-height: 1.4;
            position: relative;
            font-size: 14px;
            /* border: 1px solid black; */
        }
        .row {
            display: table;
            width: 100%;
            /* border: 1px solid; */
            border-right: 1px solid;
            border-left: 1px solid;
            border-top: 1px solid; 
        }
        .column {
            display: table-cell;
            width: 50%;
            vertical-align: top;
            padding: 6px;
        }
        .left{
            float: left;
            justify-content: left;
        }
        .center{
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .right{
            float: right;
            justify-content: right;
            align-items: right;
            text-align: right;
        }

        .table-container {
            text-align: right;
            border-right: 1px solid;
            border-left: 1px solid;
            border-top: 1px solid; 
        }

        .border-bottom {
            border-bottom: 1px solid black;
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
            /* border: 1px solid #ddd; */
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
        .margin-top-minus{
            margin-top: -10px;
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
                <img src="data:image/jpeg;base64,{{ $imageData }}" width="150" height="100">
                @else
                <p>Invoice logo not available</p>
                @endif
            </div>
            <div class="column header-center">
                <h1> Return Order</h1>
            </div>
            <div class="column header-right">
                <p> <strong>Date:- </strong> {{ date('d-m-Y', strtotime($salereturns['0']->date)) }}</p>
                <h3 class="margin-top-minus" >Invoice No - {{ $salereturns['0']->sale_id}}</h3>
                <p class="margin-top-minus"><strong>Customer :-</strong> {{ $salereturns['0']->customer->customer_name }}</p>
            </div>
        </div>
    </div>
    <div class="row margin-top-minus">
        <div class="column left"><h3>Invoice No.</h3> <p class="margin-top-minus"> {{$salereturns['0']->sale_id}}</p></div>
        <div class="column center"><h3> Name</h3> <p class="margin-top-minus"> {{ $salereturns['0']->customer->customer_name }}</p></div>
        <div class="column right"><h3>Date</h3> <p class="margin-top-minus"> {{$salereturns['0']->date}}</p></div>
    </div>
    <div class="table-container">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Unit</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Reason</th>
                    <th>Return date</th>
                </tr>
            </thead>
        
            <tbody>
                @if($salereturns && $salereturns->isNotEmpty())
                    @foreach($salereturns as $salereturn)
                        <tr>
                            <td class="center">{{ $salereturn->category->name ?? 'N/A' }}</td>
                            <td class="center">{{ $salereturn->subCategory->name ?? 'N/A' }}</td>
                            <td class="center">{{ $salereturn->unit ?? 'N/A' }}</td>
                            <td class="center">{{ $salereturn->qty ?? 'N/A' }}</td>
                            <td class="center">{{ $salereturn->price ?? 'N/A' }}</td>
                            <td class="center">{{ $salereturn->reason ?? 'N/A' }}</td>
                            <td class="center">{{ date_format($salereturn->created_at ?? 'N/A','d-m-Y') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">No details found.</td>
                    </tr>
                @endif
            </tbody>
            
        </table>
    </div>
    <div class="footer row border-bottom">
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