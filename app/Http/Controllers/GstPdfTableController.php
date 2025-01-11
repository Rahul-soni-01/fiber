<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GstPdfTable;


class GstPdfTableController extends Controller
{
    public function index()
    {
        $gstPdfRecords = GstPdfTable::all();
        return view('gst_pdf.index', compact('gstPdfRecords')); // For Web View
    }
    public function create()
    {
        return view('gst_pdf.create'); // For Web View
    }
    
    public function store(Request $request)
    {
        $data = $request->all();

        $items = [];

        // Loop through the data and create an item for each row
        foreach ($data['sn'] as $index => $sn) {
            $items[] = [
                'sn' => $sn,
                'description' => $data['description'][$index],
                'hsn_code' => $data['hsn_code'][$index],
                'qty' => $data['qty'][$index],
                'unit' => $data['unit'][$index],
                'price' => $data['price'][$index],
                'total' => $data['total'][$index],
            ];
        }

        // Convert the items array into JSON format
        $itemsJson = json_encode($items);

        $invoice = new GstPdfTable();

        // Check if data exists before assigning
        $invoice->invoice_name = isset($data['invoice_name']) ? $data['invoice_name'] : null;
        $invoice->company_name = isset($data['company_name']) ? $data['company_name'] : null;
        $invoice->company_address = isset($data['company_address']) ? $data['company_address'] : null;
        $invoice->company_gstin = isset($data['company_gstin']) ? $data['company_gstin'] : null;
        $invoice->company_phno = isset($data['company_phno']) ? $data['company_phno'] : null;
        $invoice->company_email = isset($data['company_email']) ? $data['company_email'] : null;
        $invoice->company_lutno = isset($data['company_lutno']) ? $data['company_lutno'] : null;
        $invoice->sale_id = isset($data['sale_id']) ? $data['sale_id'] : null;
        $invoice->c_id = isset($data['c_id']) ? $data['c_id'] : null;
        $invoice->name = isset($data['name']) ? $data['name'] : null;
        $invoice->invoice_no = isset($data['invoice_no']) ? $data['invoice_no'] : null;
        $invoice->date = isset($data['date']) ? $data['date'] : null;
        $invoice->place_of_supply = isset($data['place_of_supply']) ? $data['place_of_supply'] : null;
        $invoice->reverse_charge = isset($data['reverse_charge']) ? $data['reverse_charge'] : null;
        $invoice->gr_rr_no = isset($data['gr_rr_no']) ? $data['gr_rr_no'] : null;
        $invoice->transport = isset($data['transport']) ? $data['transport'] : null;
        $invoice->vehicle_no = isset($data['vehicle_no']) ? $data['vehicle_no'] : null;
        $invoice->station = isset($data['station']) ? $data['station'] : null;
        $invoice->e_way_bill_no = isset($data['e_way_bill_no']) ? $data['e_way_bill_no'] : null;
        $invoice->billed_to = isset($data['billed_to']) ? $data['billed_to'] : null;
        $invoice->billed_city = isset($data['billed_city']) ? $data['billed_city'] : null;
        $invoice->billed_state = isset($data['billed_state']) ? $data['billed_state'] : null;
        $invoice->billed_gstin_uin = isset($data['billed_gstin_uin']) ? $data['billed_gstin_uin'] : null;
        $invoice->shipped_to = isset($data['shipped_to']) ? $data['shipped_to'] : null;
        $invoice->shipped_city = isset($data['shipped_city']) ? $data['shipped_city'] : null;
        $invoice->shipped_state = isset($data['shipped_state']) ? $data['shipped_state'] : null;
        $invoice->shipped_gstin_uin = isset($data['shipped_gstin_uin']) ? $data['shipped_gstin_uin'] : null;
        $invoice->irn = isset($data['irn']) ? $data['irn'] : null;
        $invoice->ack_no = isset($data['ack_no']) ? $data['ack_no'] : null;
        $invoice->ack_date = isset($data['ack_date']) ? $data['ack_date'] : null;
        // $invoice->grand_total_qty = isset($data['grand_total_qty']) ? $data['grand_total_qty'] : null;
        $invoice->grand_total_qty = count($items);
        $invoice->hsn_sac_desc = isset($data['hsn_sac_desc']) ? $data['hsn_sac_desc'] : null;
        $invoice->tax_rate_desc = isset($data['tax_rate_desc']) ? $data['tax_rate_desc'] : null;
        $invoice->taxable_amt_desc = isset($data['taxable_amt_desc']) ? $data['taxable_amt_desc'] : null;
        $invoice->cgst_amt_desc = isset($data['cgst_amt_desc']) ? $data['cgst_amt_desc'] : null;
        $invoice->sgst_amt_desc = isset($data['sgst_amt_desc']) ? $data['sgst_amt_desc'] : null;
        $invoice->rgst_amt_desc = isset($data['rgst_amt_desc']) ? $data['rgst_amt_desc'] : null;
        $invoice->total_tax_desc = isset($data['total_tax_desc']) ? $data['total_tax_desc'] : null;
        $invoice->msme_udyam_reg_number = isset($data['msme_udyam_reg_number']) ? $data['msme_udyam_reg_number'] : null;
        $invoice->bank_details = isset($data['bank_details']) ? $data['bank_details'] : null;
        $invoice->account_number = isset($data['account_number']) ? $data['account_number'] : null;
        $invoice->ifsc_code = isset($data['ifsc_code']) ? $data['ifsc_code'] : null;

        // Store the items as JSON
        $invoice->items = isset($items) ? $items : null;

        // Save the invoice to the database
        $invoice->save();
        return redirect()->route('gst-pdf.index')->with('success', 'Added SuccessFully');
    }

    public function edit($id)
    {
        $gstPdfRecord = GstPdfTable::findOrFail($id);
        return view('gst_pdf.edit',compact('gstPdfRecord')); // For Web View
    }

    public function update(Request $request, $id)
    {
        $gstPdfRecord = GstPdfTable::findOrFail($id);
        dd($gstPdfRecord);
    }
    public function destroy($id)
{
    $gstPdfRecord = GstPdfTable::findOrFail($id);
    $gstPdfRecord->delete();

    return redirect()->route('gst-pdf.index')->with('success', 'Record deleted successfully.');
}

}
