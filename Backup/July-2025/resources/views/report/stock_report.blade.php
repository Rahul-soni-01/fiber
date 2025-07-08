<!DOCTYPE html>
<html>
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
                    margin: 10px;
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

          .category-title {
               background: #333;
               color: #fff;
               padding: 5px;
               margin-top: 20px;
               align-items: center;
               display: flex;
          }
     </style>
</head>

<body>
     <h2>Stock Report</h2>

     @foreach ($groupedSubcategoryData as $cid => $subcategories)
     <div class="category-title">
          <strong>Category:</strong> {{ $cid ?? 'NA' }}
     </div>
     <div class="table-container">
          <div class="header-center" width="50%" align="center">
               <h3>Report Details</h3>
          </div>
          <table class="table" border="1">
               <thead>
                    <tr>
                         <th>Subcategory</th>
                         <th>Total Purchase Qty</th>
                         <th>Total Fresh Stock</th>
                         <th>Total Running Stock Qty</th>
                         <th>Not Used Qty</th>
                         {{-- <th>Used Qty</th> --}}
                         <th>Used Qty in Fiber</th>
                         <th>Dead Stock</th>
                         {{-- <th>Total Purchase </th> --}}
                    </tr>
               </thead>
               <tbody>
                    @foreach ($subcategories as $data)
                    @php
                    $freshStock = ($data['total_purchase_qty'] ?? 0) - ($data['total_stock_qty'] ?? 0);
                    @endphp
                    <tr>
                         <td>{{ $data['subcategory']['sub_category_name'] ?? 'N/A' }}</td>
                         <td>{{ number_format($data['total_purchase_qty'] ?? 0, 2) }}</td>
                         <td>{{ number_format($freshStock, 2) }}</td>
                         <td>{{ number_format($data['total_stock_qty'] ?? 0, 2) }}</td>
                         <td>{{ number_format($data['qty_status_0'] ?? 0, 2) }}</td>
                         {{-- <td>{{ number_format($data['qty_status_1'] ?? 0, 2) }}</td> --}}
                         <td>{{ number_format($data['subcategory']->sr_no == 1 ? $data['total_count'] ?? 0 :
                              $data['total_used_stock'] ?? 0, 2) }}</td>
                         <td>{{ number_format($data['dead_status_used_qty'] ?? 0, 2) }}</td>
                         {{-- <td>{{ number_format($data['total_purchase'] ?? 0, 2) }}</td> --}}
                    </tr>
                    @endforeach
               </tbody>
          </table>
     </div>
     @endforeach

     <strong>Note:</strong>
     <ul>
          <li><strong>Fresh Stock Qty</strong> = <code>Total Purchase Qty - Total Running in Stock Qty</code> = 150 - 50
               = <strong>100</strong></li>
          <li><strong>Used Qty</strong> = Items in stock with <code>status = 1</code> 20 (used) 
              <code>  for Ex...if we have a 500 LD purchase and we have 300 LD sr-no available.. </code></li>
          <li><strong>Used Qty in Fiber</strong> = <ul>
                    <li>If <code>sr_no == 1</code> <br> Used Qty - Used Qty in Fiber = 20 - 17: Count of Used in Fiber </li>
               </ul>
          </li>
          <li><strong>Not Used Qty</strong> = Items in Running stock with <code>status = 0</code> <br> Used Qty - Used Qty in Fiber 50-20(unused)</li>
          <li><strong>Dead Stock</strong> = Sum of <code>used_qty(20) </code> where <code> Fault/Burn.. = 3</code></li>
     </ul>
</body>

</html>