<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style class="shared-css" type="text/css">
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.5;
            position: relative;
            border: 1px solid black;
        }

        .t {
            transform-origin: bottom left;
            z-index: 2;
            position: absolute;
            white-space: pre;
            overflow: visible;
            line-height: 1.5;
        }

        .text-container {
            white-space: pre;
        }

        @supports (-webkit-touch-callout: none) {
            .text-container {
                white-space: normal;
            }
        }

        @page {
            margin-bottom: 10px;
        }

        @media screen {
            body {
                font-family: Arial, sans-serif;
                margin: 5px;
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
    <style type="text/css">
        /* Use percentages for positioning */
        #t1 {
            left: 44%;
        }

        #t2 {
            left: 85%;
        }

        #t3 {
            left: 43%;
        }

        #t4 {
            left: 20%;
        }

        #t5 {
            left: 30%;
        }

        #t6 {
            left: 43%;
        }

        #t7 {
            left: 38%;
        }

        #t8 {
            left: 30%;
        }

        #t9 {
            left: 48%;
        }

        #ta {
            left: 38%;
        }

        #tb {
            left: 5%;
        }

        #tc {
            left: 20%;
        }

        #td {
            left: 48%;
        }

        #te {
            left: 60%;
        }

        #tf {
            left: 5%;
        }

        #tg {
            left: 20%;
        }

        #th {
            left: 48%;
        }

        #ti {
            left: 60%;
        }

        #tj {
            left: 5%;
        }

        #tk {
            left: 20%;
        }

        #tl {
            left: 48%;
        }

        #tm {
            left: 60%;
        }

        #tn {
            left: 5%;
        }

        #to {
            left: 20%;
        }

        #tp {
            left: 48%;
        }

        #tq {
            left: 60%;
        }

        #tr {
            left: 5%;
        }

        #ts {
            left: 20%;
        }

        #tt {
            left: 5%;
        }

        #tu {
            left: 15%;
        }

        #tv {
            left: 48%;
        }

        #tw {
            left: 5%;
        }

        #tx {
            left: 48%;
        }

        #ty {
            left: 5%;
        }

        #tz {
            left: 48%;
        }

        #t10 {
            left: 5%;
        }

        #t11 {
            left: 48%;
        }

        #t12 {
            left: 5%;
        }

        #t13 {
            left: 48%;
        }

        #t14 {
            left: 5%;
        }

        #t15 {
            left: 20%;
        }

        #t16 {
            left: 48%;
        }

        #t17 {
            left: 60%;
        }

        #t18 {
            left: 5%;
        }

        #t19 {
            left: 10%;
        }

        #t1a {
            left: 55%;
        }

        #t1b {
            left: 60%;
        }

        #t1c {
            left: 75%;
        }

        #t1d {
            left: 85%;
        }

        #t1e {
            left: 5%;
        }

        #t1f {
            left: 8%;
        }

        #t1g {
            left: 10%;
        }

        #t1h {
            left: 43%;
        }

        #t1i {
            left: 55%;
        }

        #t1j {
            left: 75%;
        }

        #t1k {
            left: 85%;
        }

        #t1l {
            left: 90%;
        }

        #t1m {
            left: 5%;
        }

        #t1n {
            left: 10%;
        }

        #t1o {
            left: 43%;
        }

        #t1p {
            left: 55%;
        }

        #t1q {
            left: 70%;
        }

        #t1r {
            left: 80%;
        }

        #t1s {
            left: 30%;
        }

        #t1t {
            left: 35%;
        }

        #t1u {
            left: 62%;
        }

        #t1v {
            left: 70%;
        }

        #t1w {
            left: 83%;
        }

        #t1x {
            left: 30%;
        }

        #t1y {
            left: 35%;
        }

        #t1z {
            left: 62%;
        }

        #t20 {
            left: 70%;
        }

        #t21 {
            left: 83%;
        }

        #t22 {
            left: 40%;
        }

        #t23 {
            left: 55%;
        }

        #t24 {
            left: 80%;
        }

        #t25 {
            left: 5%;
        }

        #t26 {
            left: 12%;
        }

        #t27 {
            left: 20%;
        }

        #t28 {
            left: 28%;
        }

        #t29 {
            left: 35%;
        }

        #t2a {
            left: 40%;
        }

        #t2b {
            left: 5%;
        }

        #t2c {
            left: 20%;
        }

        #t2d {
            left: 25%;
        }

        #t2e {
            left: 30%;
        }

        #t2f {
            left: 35%;
        }

        #t2g {
            left: 5%;
        }

        #t2h {
            left: 30%;
        }

        #t2i {
            left: 40%;
        }

        #t2j {
            left: 5%;
        }

        #t2k {
            left: 15%;
        }

        #t2l {
            left: 20%;
        }

        #t2m {
            left: 5%;
        }

        #t2n {
            left: 30%;
        }

        #t2o {
            left: 50%;
        }

        #t2p {
            left: 60%;
        }

        #t2q {
            left: 5%;
        }

        #t2r {
            left: 5%;
        }

        #t2s {
            left: 5%;
        }

        #t2t {
            left: 80%;
        }

        #t2u {
            left: 5%;
        }

        #t2v {
            left: 5%;
        }

        #t2w {
            left: 5%;
        }

        #t2x {
            left: 5%;
        }

        #t2y {
            left: 5%;
        }

        #t2z {
            left: 5%;
        }

        #t30 {
            left: 70%;
        }

        .s0 {
            font-size: 17px;
            font-family: CIDFont-F1_9;
            color: #000;
        }

        .s1 {
            font-size: 16px;
            font-family: CIDFont-F2_h;
            color: #000;
        }

        .s2 {
            font-size: 27px;
            font-family: CIDFont-F1_9;
            color: #000;
        }

        .s3 {
            font-size: 15px;
            font-family: CIDFont-F2_h;
            color: #000;
        }

        .s4 {
            font-size: 15px;
            font-family: CIDFont-F1_9;
            color: #000;
        }

        .s5 {
            font-size: 13px;
            font-family: CIDFont-F1_9;
            color: #000;
        }

        .s6 {
            font-size: 16px;
            font-family: CIDFont-F1_9;
            color: #000;
        }

        .s7 {
            font-size: 12px;
            font-family: CIDFont-F1_9;
            color: #000;
        }

        .s8 {
            font-size: 12px;
            font-family: CIDFont-F2_h;
            color: #000;
        }

        .s9 {
            font-size: 14px;
            font-family: CIDFont-F1_9;
            color: #000;
        }

        .sa {
            font-size: 11px;
            font-family: CIDFont-F1_9;
            color: #000;
        }

        .t.m0 {
            transform: matrix(0.946, 0, -0.32, 0.95, 0, 0);
        }
    </style>
    <style id="fonts1" type="text/css">
        @font-face {
            font-family: CIDFont-F1_9;
            src: url("fonts/CIDFont-F1_9.woff") format("woff");
        }

        @font-face {
            font-family: CIDFont-F2_h;
            src: url("fonts/CIDFont-F2_h.woff") format("woff");
        }
    </style>
</head>

<body style="margin: 0;">
    <div id="p1" style="overflow: hidden; position: relative; background-color: white; width: 100%; height: 100%;">
        <div id="pg1Overlay"
            style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;">
        </div>
        <div id="pg1" style="-webkit-user-select: none;">
            <object width="100%" height="1210" data="1/1.svg" type="image/svg+xml" id="pdf1"
                style="width:100%; height:100%; z-index: 0;"></object>
        </div>
        <div class="text-container">
            <span id="t1" class="t s0">TAX INVOICE </span>
            <span id="t2" class="t m0 s1">Original Copy </span>
            <span id="t3" class="t s2">MAKTECH </span>
            <span id="t4" class="t s3">GROUND FLOOR ,541, VASTADEWADI ROAD OPP, JAIN MANDIR HIRABEN NI WADI </span>
            <span id="t5" class="t s3">DIGANBER JAIN MANDIR,KATARGAM, SURAT </span>
            <span id="t6" class="t s3">PAN : AAZFM7679J </span>
            <span id="t7" class="t s4">GSTIN : 24AAZFM7679J 1Z7 </span>
            <span id="t8" class="t m0 s5">Tel. : MO NO:-9727432806 </span>
            <span id="t9" class="t m0 s5">email : maktech41@gmail.com </span>
            <span id="ta" class="t s4">LUT NO:-AD240921009829V </span>
            <span id="tb" class="t s3">Invoice No. </span>
            <span id="tc" class="t s3">: 25 </span>
            <span id="td" class="t s3">Transport </span>
            <span id="te" class="t s3">: Self </span>
            <span id="tf" class="t s3">Dated </span>
            <span id="tg" class="t s3">: 07-12-2024 </span>
            <span id="th" class="t s3">Vehicle No. </span>
            <span id="ti" class="t s3">: GJ05LV7421 </span>
            <span id="tj" class="t s3">Place of Supply </span>
            <span id="tk" class="t s3">: Gujarat (24) </span>
            <span id="tl" class="t s3">Station </span>
            <span id="tm" class="t s3">: Surat </span>
            <span id="tn" class="t s3">Reverse Charge </span>
            <span id="to" class="t s3">: N </span>
            <span id="tp" class="t s3">E-Way Bill No. </span>
            <span id="tq" class="t s3">: 631823254062 </span>
            <span id="tr" class="t s3">GR/RR No. </span>
            <span id="ts" class="t s3">: </span>
            <span id="tt" class="t m0 s6">Billed to </span>
            <span id="tu" class="t m0 s6">: </span>
            <span id="tv" class="t m0 s6">Shipped to : </span>
            <span id="tw" class="t s3">VRUNDAVAN LASER </span>
            <span id="tx" class="t s3">VRUNDAVAN LASER </span>
            <span id="ty" class="t s3">69, 1ST FLOOR, Bajrang Nagar Society </span>
            <span id="tz" class="t s3">69, 1ST FLOOR, Bajrang Nagar Society </span>
            <span id="t10" class="t s3">Fulpada Road, Varachha, Surat, Surat </span>
            <span id="t11" class="t s3">Fulpada Road, Varachha, Surat, Surat </span>
            <span id="t12" class="t s3">Gujarat, 395006 </span>
            <span id="t13" class="t s3">Gujarat, 395006 </span>
            <span id="t14" class="t s3">GSTIN / UIN </span>
            <span id="t15" class="t s3">: 24AHAPD4641B1Z7 </span>
            <span id="t16" class="t s3">GSTIN / UIN </span>
            <span id="t17" class="t s3">: 24AHAPD4641B1Z7 </span>
            <span id="t18" class="t s7">IRN </span>
            <span id="t19" class="t s8">: 35c5e7f912c46848fe88b441e7d29ebea770c0ad75e2a40ed40d952d62d0ee5d </span>
            <span id="t1a" class="t s7">Ack.No. </span>
            <span id="t1b" class="t s8">: 162419114977820 </span>
            <span id="t1c" class="t s7">Ack. Date </span>
            <span id="t1d" class="t s8">: 07-12-2024 </span>
            <span id="t1e" class="t s9">S.N </span>
            <span id="t1f" class="t s4">. </span>
            <span id="t1g" class="t s4">Description of Goods </span>
            <span id="t1h" class="t s9">HSN/Code </span>
            <span id="t1i" class="t s4">Qty. Unit </span>
            <span id="t1j" class="t s4">Price </span>
            <span id="t1k" class="t s4">Amount( </span>
            <span id="t1l" class="t s4">) </span>
            <span id="t1m" class="t s3">1. </span>
            <span id="t1n" class="t s3">PULSED FIBER LASER </span>
            <span id="t1o" class="t s3">84569090 </span>
            <span id="t1p" class="t s3">2.00 Pcs. </span>
            <span id="t1q" class="t s3">45,000.00 </span>
            <span id="t1r" class="t s3">90,000.00 </span>
            <span id="t1s" class="t m0 s1">Add </span>
            <span id="t1t" class="t m0 s1">: CGST </span>
            <span id="t1u" class="t m0 s1">@ </span>
            <span id="t1v" class="t m0 s1">9.00 % </span>
            <span id="t1w" class="t s3">8,100.00 </span>
            <span id="t1x" class="t m0 s1">Add </span>
            <span id="t1y" class="t m0 s1">: SGST </span>
            <span id="t1z" class="t m0 s1">@ </span>
            <span id="t20" class="t m0 s1">9.00 % </span>
            <span id="t21" class="t s3">8,100.00 </span>
            <span id="t22" class="t s4">Grand Total </span>
            <span id="t23" class="t s4">2.00 Pcs. </span>
            <span id="t24" class="t s4">1,06,200.00 </span>
            <span id="t25" class="t s7">HSN/SAC </span>
            <span id="t26" class="t s7">Tax Rate </span>
            <span id="t27" class="t sa">Taxable Amt. </span>
            <span id="t28" class="t sa">CGST Amt. </span>
            <span id="t29" class="t sa">SGST Amt. </span>
            <span id="t2a" class="t s7">Total Tax </span>
            <span id="t2b" class="t s8">84569090 18% </span>
            <span id="t2c" class="t s8">90,000.00 </span>
            <span id="t2d" class="t s8">8,100.00 </span>
            <span id="t2e" class="t s8">8,100.00 </span>
            <span id="t2f" class="t s8">16,200.00 </span>
            <span id="t2g" class="t s4">Rupees One Lakh Six Thousand Two Hundred Only </span>
            <span id="t2h" class="t s9">MSME- UDYAM REGISTRATION NUMBER </span>
            <span id="t2i" class="t s7">UDYAM-GJ-22-0324303 </span>
            <span id="t2j" class="t s4">Bank Details </span>
            <span id="t2k" class="t s4">: </span>
            <span id="t2l" class="t s3">KOTAK MAHINDRA BANK,A/C NO :- 1011975493 ,IFSC :- KKBK0002849 </span>
            <span id="t2m" class="t sa">Terms &amp; Conditions </span>
            <span id="t2n" class="t ```html sa">E-Invoice QR Code </span>
            <span id="t2o" class="t sa">Receiver's Signature </span>
            <span id="t2p" class="t s7">: </span>
            <span id="t2q" class="t s8">1. Goods once sold will not be taken </span>
            <span id="t2r" class="t s8">back. </span>
            <span id="t2s" class="t s8">2. Interest @ 18% p.a. will be charged </span>
            <span id="t2t" class="t s4">For MAKTECH </span>
            <span id="t2u" class="t s8">if the payment </span>
            <span id="t2v" class="t s8">is not made within the stipulated time. </span>
            <span id="t2w" class="t s8">3. Subject to 'Surat' Jurisdiction only. </span>
            <span id="t2x" class="t s8">4. Supply meant for SEZ under LUT </span>
            <span id="t2y" class="t s8">without payment of </span>
            <span id="t2z" class="t s8">integrated tax </span>
            <span id="t30" class="t s4">Authorised Signatory </span>
        </div>
    </div>
</body>

</html>