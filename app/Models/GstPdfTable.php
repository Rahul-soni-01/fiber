<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GstPdfTable extends Model
{
    use HasFactory;

    protected $table = 'gst_pdf_table';
    protected $fillable = [
        'invoice_name',
        'company_name',
        'company_address',
        'company_gstin',
        'company_phno',
        'company_email',
        'company_lutno',
        'sale_id',
        'c_id',
        'name',
        'invoice_no',
        'date',
        'place_of_supply',
        'reverse_charge',
        'gr_rr_no',
        'transport',
        'vehicle_no',
        'station',
        'e_way_bill_no',
        'billed_to',
        'billed_city',
        'billed_state',
        'billed_gstin_uin',
        'shipped_to',
        'shipped_city',
        'shipped_state',
        'shipped_gstin_uin',
        'irn',
        'ack_no',
        'ack_date',
        'items', // JSON column
        'grand_total_qty',
        'hsn_sac_desc',
        'tax_rate_desc',
        'taxable_amt_desc',
        'cgst_amt_desc',
        'sgst_amt_desc',
        'rgst_amt_desc',
        'total_tax_desc',
        'msme_udyam_reg_number',
        'bank_details',
        'account_number',
        'ifsc_code',
    ];

    // Specify the attributes that should be cast to native types
    protected $casts = [
        'date' => 'date',
        'ack_date' => 'date',
        'items' => 'array', // Cast JSON column as an array
    ];
}
