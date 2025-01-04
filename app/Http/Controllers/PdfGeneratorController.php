<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;  // Make sure you have installed this package
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Models\TblCustomer;

class PdfGeneratorController extends Controller
{
    public function pdfGenerator(Request $request)
    {
        $bankId = $request->input('bank'); // Retrieve the bank parameter
        if($bankId) {
            $BankController =  new TblBankController();
            $bankData = $BankController->show($bankId);  
            $data = $bankData->getData();

            $html = view('banks.pdf', $data)->render(); // Create a dedicated view for PDF
            $dompdf = new \Dompdf\Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
        
            // Stream PDF
            return $dompdf->stream("bank-$bankId.pdf", ['Attachment' => true]);
        }
        $invoice_no = $request->input('invoice_no'); // Retrieve the invoice_no parameter
        if($invoice_no){
            $purchaseItemController =  new TblPurchaseItemController();
            $purchaseData = $purchaseItemController->show_item($invoice_no);  
            $data = $purchaseData->getData();
            // dd($data);
            $html = view('inward.pdf', $data)->render(); // Create a dedicated view for PDF
            $dompdf = new \Dompdf\Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
        
            // Stream PDF
            return $dompdf->stream("purchase-$invoice_no.pdf", ['Attachment' => true]);
        }
        $saleid = $request->input('sale'); // Retrieve the invoice_no parameter
        if($saleid){
            ini_set('memory_limit', '512M');
            $saleController =  new SaleController();
            $tblCustomer = new TblCustomer();
            $saleData = $saleController->show($tblCustomer, $saleid, $request);
            
            $data = $saleData->getData();
            // dd($data);
            if($request->input('gst')){
                $html = view('sale.gstpdf', $data)->render(); // Create a dedicated view for PDF
            }else{
                $html = view('sale.pdf', $data)->render(); // Create a dedicated view for PDF
            }
            
            // return response($html);
            $dompdf = new \Dompdf\Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
        
            // Stream PDF
            return $dompdf->stream("Sale-$saleid.pdf", ['Attachment' => true]);
        }

        $reportid = $request->input('report'); // Retrieve the invoice_no parameter
        if($reportid){
            ini_set('memory_limit', '512M');
            $Controller =  new ReportController();
            $Data = $Controller->show( $request, $reportid,);
            // dd($saleData);
           
            $data = $Data->getData();
            // dd($data);
            $html = view('report.pdf', $data)->render(); // Create a dedicated view for PDF
            // Display the HTML directly in the browser
            // return response($html);
            $dompdf = new \Dompdf\Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
        
            // Stream PDF
            return $dompdf->stream("Report-$reportid.pdf", ['Attachment' => true]);
        }
        
    }
}
