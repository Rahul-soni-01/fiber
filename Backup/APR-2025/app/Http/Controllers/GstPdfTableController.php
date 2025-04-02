<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GstPdfTable;
use Illuminate\Support\Facades\DB;

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
        $websetting = DB::table('web_settings')->where('id', 1)->first();

        
        $items = [];
        $grand_total_qty = 0;
        // Loop through the data and create an item for each row
        foreach ($data['sn'] as $index => $sn) {
            $grand_total_qty += $data['qty'][$index];

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
        $invoice->company_name = isset($data['company_name']) ? $data['company_name'] : $websetting->company_name;
        $invoice->company_address = isset($data['company_address']) ? $data['company_address'] : $websetting->company_address;
        $invoice->company_gstin = isset($data['company_gstin']) ? $data['company_gstin'] : $websetting->GSTIN_no;
        $invoice->company_phno = isset($data['company_phno']) ? $data['company_phno'] : $websetting->phno;
        $invoice->company_email = isset($data['company_email']) ? $data['company_email'] : $websetting->email;
        $invoice->company_lutno = isset($data['company_lutno']) ? $data['company_lutno'] : $websetting->lutno;
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
        $invoice->cgst_per = isset($data['cgst_per']) ? $data['cgst_per'] : null;
        $invoice->sgst_per = isset($data['sgst_per']) ? $data['sgst_per'] : null;
        $invoice->igst_per = isset($data['igst_per']) ? $data['igst_per'] : null;
        $invoice->cgst_amt = isset($data['cgst_amt']) ? $data['cgst_amt'] : null;
        $invoice->sgst_amt = isset($data['sgst_amt']) ? $data['sgst_amt'] : null;
        $invoice->igst_amt = isset($data['igst_amt']) ? $data['igst_amt'] : null;
        $invoice->grand_total_qty = $grand_total_qty;
        $invoice->grand_total_amt = isset($data['grand_total_amt']) ? $data['grand_total_amt'] : null;
        $invoice->hsn_sac_desc = isset($data['hsn_sac_desc']) ? $data['hsn_sac_desc'] : null;
        $invoice->tax_rate_desc = isset($data['tax_rate_desc']) ? $data['tax_rate_desc'] : null;
        $invoice->taxable_amt_desc = isset($data['taxable_amt_desc']) ? $data['taxable_amt_desc'] : null;
        $invoice->cgst_amt_desc = isset($data['cgst_amt_desc']) ? $data['cgst_amt_desc'] : null;
        $invoice->sgst_amt_desc = isset($data['sgst_amt_desc']) ? $data['sgst_amt_desc'] : null;
        $invoice->igst_amt_desc = isset($data['igst_amt_desc']) ? $data['igst_amt_desc'] : null;
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
        return view('gst_pdf.edit', compact('gstPdfRecord')); // For Web View
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();
        $websetting = DB::table('web_settings')->where('id', 1)->first();

        
        $items = [];
        $grand_total_qty = 0;
        // Loop through the data and create an item for each row
        foreach ($data['sn'] as $index => $sn) {
            $grand_total_qty += $data['qty'][$index];

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
        $invoice = GstPdfTable::find($id);
        $invoice->invoice_name = isset($data['invoice_name']) ? $data['invoice_name'] : null;
        $invoice->company_name = isset($data['company_name']) ? $data['company_name'] : $websetting->company_name;
        $invoice->company_address = isset($data['company_address']) ? $data['company_address'] : $websetting->company_address;
        $invoice->company_gstin = isset($data['company_gstin']) ? $data['company_gstin'] : $websetting->GSTIN_no;
        $invoice->company_phno = isset($data['company_phno']) ? $data['company_phno'] : $websetting->phno;
        $invoice->company_email = isset($data['company_email']) ? $data['company_email'] : $websetting->email;
        $invoice->company_lutno = isset($data['company_lutno']) ? $data['company_lutno'] : $websetting->lutno;
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
        $invoice->cgst_per = isset($data['cgst_per']) ? $data['cgst_per'] : null;
        $invoice->sgst_per = isset($data['sgst_per']) ? $data['sgst_per'] : null;
        $invoice->igst_per = isset($data['igst_per']) ? $data['igst_per'] : null;
        $invoice->cgst_amt = isset($data['cgst_amt']) ? $data['cgst_amt'] : null;
        $invoice->sgst_amt = isset($data['sgst_amt']) ? $data['sgst_amt'] : null;
        $invoice->igst_amt = isset($data['igst_amt']) ? $data['igst_amt'] : null;
        $invoice->grand_total_qty = $grand_total_qty;
        $invoice->grand_total_amt = isset($data['grand_total_amt']) ? $data['grand_total_amt'] : null;
        $invoice->hsn_sac_desc = isset($data['hsn_sac_desc']) ? $data['hsn_sac_desc'] : null;
        $invoice->tax_rate_desc = isset($data['tax_rate_desc']) ? $data['tax_rate_desc'] : null;
        $invoice->taxable_amt_desc = isset($data['taxable_amt_desc']) ? $data['taxable_amt_desc'] : null;
        $invoice->cgst_amt_desc = isset($data['cgst_amt_desc']) ? $data['cgst_amt_desc'] : null;
        $invoice->sgst_amt_desc = isset($data['sgst_amt_desc']) ? $data['sgst_amt_desc'] : null;
        $invoice->igst_amt_desc = isset($data['igst_amt_desc']) ? $data['igst_amt_desc'] : null;
        $invoice->total_tax_desc = isset($data['total_tax_desc']) ? $data['total_tax_desc'] : null;
        $invoice->msme_udyam_reg_number = isset($data['msme_udyam_reg_number']) ? $data['msme_udyam_reg_number'] : null;
        $invoice->bank_details = isset($data['bank_details']) ? $data['bank_details'] : null;
        $invoice->account_number = isset($data['account_number']) ? $data['account_number'] : null;
        $invoice->ifsc_code = isset($data['ifsc_code']) ? $data['ifsc_code'] : null;

        // Store the items as JSON
        $invoice->items = isset($items) ? $items : null;

        $invoice->save();
        return redirect()->route('gst-pdf.index')->with('success', 'Updated SuccessFully');
    }
    public function destroy($id)
    {
        $gstPdfRecord = GstPdfTable::findOrFail($id);

        $gstPdfRecord->delete();

        return redirect()->route('gst-pdf.index')->with('success', 'Record deleted successfully.');
    }

    public function show($id)
    {
        $gstPdfRecord = GstPdfTable::findOrFail($id);
        // {{ dd($gstPdfRecord);}}
        return view('gst_pdf.show', compact('gstPdfRecord', 'id'));
    }

}
