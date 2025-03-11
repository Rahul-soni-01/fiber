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
            /* line-height: 1.6; */
            line-height: 1.3;
            position: relative;
            /* border: 1px solid black; */
        }

        .summary {
            margin-top: 20px;
            border: 1px solid #ddd;
            padding: 10px;
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
            /* border: 1px solid #ddd; */
            padding: 8px;
            /* border: 1px solid; */
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

        .row {
            display: table;
            width: 100%;
            font-size: 10px;
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
        .margin-top-minus{
            margin-top: -20px;
            margin-bottom: 0px;
        }

        .margin-top-minus-2{
            margin-top: -7px;
        }

        .border{
            border: 1px solid #000;
        }

        .border-bootom{
            border-bottom: 1px solid #000;
        }

        .border-right{
            border-right: 1px solid #000;
        }
        .bottom{
            margin-top: 10px;
            bottom: 0px;
        }
        .margin-top{
            margin-top:8px;
        }
        .row-no-border{
            display: table;
            width: 100%;
            font-size: 10px;
            border: none;
        }
        .btn-danger{
            color: #ff0000;
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
            .container {
                page-break-before: always;
            }
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="row">
           <div class="column left">
            <h2 class="margin-top-minus-2">GST IN</h2>
           </div>
           <div class="column center">
            <p> <strong  class="border-bootom"> Bill OF SUPPLY</strong></p></br>
            <h2 class="margin-top-minus">FIBER MFG</h2>
           </div>
           <div class="column right">
            <p class="margin-top-minus-2">Original Copy</p>
           </div>
        </div>

        <div class="row">
            <div class="column border-right">
                <p>Bill No. : <strong>{{ $sale->sale_id }}</strong></p>
                <p>Dated : <strong> {{ $sale->sale_date }}</strong></p>
            </div>
            <div class="column">
                <p>GR/RR No : <strong>{{ $sale->customer_name }}</strong></p>
                <p> Transport: </p>
            </div>
        </div>

        <div class="row">
            <div class="column border-right">
                <p> <strong> Billed To. :</strong></br>
                    {{ $sale->customer->customer_name }},
                    {{ $sale->customer->address}}
                </p>
            </div>
            <div class="column">
                <p> <strong> Shipped To. :</strong></br>
                    {{ $sale->customer->customer_name }},
                    {{ $sale->customer->ship_address}}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="column border-right"><strong>S.N</strong></div>
            <div class="column border-right"><strong>Description Of Goods</strong></div>
            <div class="column border-right"><strong>HSN/SAC</strong></div>
            <div class="column border-right"><strong>Unit</strong></div>
            <div class="column border-right"><strong>Qty</strong></div>
            <div class="column border-right"><strong>Rate</strong></div>
            <div class="column border-right"><strong>Tax %</strong></div>
            <div class="column"><strong>Total</strong></div>
        </div>
        @php
            $total = 0;
            $qty = 0;
        @endphp
        @foreach ($sale['items'] as $item1)
        <div class="row center">
            <div class="column border-right">{{ $loop->iteration }}</div>
            <div class="column border-right">{{ $item1->category->name }} -> {{ $item1->subCategory->name }}</div>
            <div class="column border-right"></div>
            <div class="column border-right">{{ $item1['unit'] }}</div>
            <div class="column border-right">{{ $item1['qty'] }}</div>
            <div class="column border-right">{{ $item1['rate'] }}</div>
            <div class="column border-right">{{ $item1['p_tax'] ?? 0 }}</div>
            <div class="column">{{ $item1['total'] }}</div>
        </div>
        @php
            $total += $item1['total'];
            $qty += $item1['qty'];
        @endphp
        @endforeach
        <div class="row">
            {{-- <div class="border-bootom"></div> --}}
            <div class="margin-top"></div>
            <div class="margin-top"></div>
        </div>
        <div class="row">
            <div class="column left"></div>
            <div class="column center"></div>
            <div class="column right">
                <div class="row-no-border">
                    <div class="column"><strong>Total :- </strong> {{$total}}</div>
                </div>
                <div class="row-no-border margin-top-minus-2">
                    <div class="column "><strong>Shipping Total :- </strong> {{$sale['shipping_cost'] ?? 0 }}</div>
                </div>
                <div class="row-no-border margin-top-minus-2">
                    <div class="column btn-danger"><strong>Round Total :- </strong> {{$sale['round_total'] ?? 0 }}</div>
                </div>
                <div class="row-no-border margin-top-minus-2">
                    <div class="column border-bootom"><strong>Total Qty :- </strong> {{$qty}}</div>
                    <div class="column border-bootom"><strong>Total :- </strong> {{$sale['amount'] ?? 0 }}</div>
                </div>
            </div>
        </div>
       
        <div class="row border-bootom">
            <div class="column left">
                <div class="bottom">
                    <div class="margin-top"></div>
                    <div class="margin-top"></div>
                    Receiver's Signature
                </div>
            </div>
            <div class="column right">
                <div class="bottom">
                    <div class="margin-top"></div>
                    <div class="margin-top"></div>
                    Authorised Signatory
                </div>
            </div>
        </div> 
        <div class="margin-top"></div>
        <div class="row">
            <div class="column left">
             <h2 class="margin-top-minus-2">GST IN</h2>
            </div>
            <div class="column center">
             <p> <strong  class="border-bootom"> Bill OF SUPPLY</strong></p></br>
             <h2 class="margin-top-minus">FIBER MFG</h2>
            </div>
            <div class="column right">
             <p class="margin-top-minus-2">Duplicate Copy</p>
            </div>
         </div>
 
         <div class="row">
             <div class="column border-right">
                 <p>Bill No. : <strong>{{ $sale->sale_id }}</strong></p>
                 <p>Dated : <strong> {{ $sale->sale_date }}</strong></p>
             </div>
             <div class="column">
                 <p>GR/RR No : <strong>{{ $sale->customer_name }}</strong></p>
                 <p> Transport: </p>
             </div>
         </div>
 
         <div class="row">
             <div class="column border-right">
                 <p> <strong> Billed To. :</strong></br>
                     {{ $sale->customer->customer_name }},
                     {{ $sale->customer->address}}, {{ $sale->customer->city}}
                 </p>
             </div>
             <div class="column">
                 <p> <strong> Shipped To. :</strong></br>
                     {{ $sale->customer->customer_name }},
                     {{ $sale->customer->ship_address}} {{ $sale->customer->ship_city}}
                 </p>
             </div>
         </div>
         <div class="row">
             <div class="column border-right"><strong>S.N</strong></div>
             <div class="column border-right"><strong>Description Of Goods</strong></div>
             <div class="column border-right"><strong>HSN/SAC</strong></div>
             <div class="column border-right"><strong>Unit</strong></div>
             <div class="column border-right"><strong>Qty</strong></div>
             {{-- <div class="column border-right"><strong>Rate</strong></div> --}}
             {{-- <div class="column border-right"><strong>Tax</strong></div> --}}
             <div class="column"><strong>Total</strong></div>
         </div>
         @php
             $total = 0;
             $qty = 0;
         @endphp
         @foreach ($sale['items'] as $item1)
         
         <div class="row center">
             <div class="column border-right">{{ $loop->iteration }}</div>
             <div class="column border-right">{{ $item1->category->name }} -> {{ $item1->subCategory->name }}</div>
             <div class="column border-right"></div>
             <div class="column border-right">{{ $item1['unit'] }}</div>
             <div class="column border-right">{{ $item1['qty'] }}</div>
             {{-- <div class="column border-right">{{ $item1['rate'] }}</div> --}}
             {{-- <div class="column border-right">{{ $item1['p_tax'] ?? 0 }}</div> --}}
             <div class="column">{{ $item1['total'] }}</div>
         </div>
         @php
             $total += $item1['total'];
             $qty += $item1['qty'];
         @endphp
         @endforeach
         <div class="border-bootom"></div>
         <div class="margin-top"></div>
         <div class="row">
             <div class="column left"></div>
             <div class="column center"></div>
             <div class="column right">
                <div class="row-no-border">
                    <div class="column"><strong>Total :- </strong> {{$total}}</div>
                </div>
                <div class="row-no-border margin-top-minus-2">
                    <div class="column "><strong>Shipping Total :- </strong> {{$sale['shipping_cost'] ?? 0 }}</div>
                </div>
                <div class="row-no-border margin-top-minus-2">
                    <div class="column btn-danger"><strong>Round Total :- </strong> {{$sale['round_total'] ?? 0 }}</div>
                </div>
                <div class="row-no-border margin-top-minus-2">
                    <div class="column border-bootom"><strong>Total Qty :- </strong> {{$qty}}</div>
                    <div class="column border-bootom"><strong>Total :- </strong> {{$sale['amount'] ?? 0 }}</div>
                </div>
             </div>
         </div>
        
         <div class="row border-bootom">
             <div class="column left">
                 <div class="bottom">
                     <div class="margin-top"></div>
                     <div class="margin-top"></div>
                     Receiver's Signature
                 </div>
             </div>
             <div class="column right">
                 <div class="bottom">
                     <div class="margin-top"></div>
                     <div class="margin-top"></div>
                     Authorised Signatory
                 </div>
             </div>
         </div> 
        <p style="margin-bottom:0px; font-size:8px;">Time: {{ \Carbon\Carbon::now() }}</p>
    </div>
</body>

</html>