<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gst_pdf_table', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_gstin')->nullable();
            $table->string('company_phno')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_lutno')->nullable();
            $table->unsignedBigInteger('sale_id')->nullable();
            $table->unsignedBigInteger('c_id')->nullable();
            $table->string('name')->nullable();
            $table->string('invoice_no')->unique()->nullable();
            $table->date('date')->nullable();
            $table->string('place_of_supply')->nullable();
            $table->string('reverse_charge')->nullable();
            $table->string('gr_rr_no')->nullable();
            $table->string('transport')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->string('station')->nullable();
            $table->string('e_way_bill_no')->nullable();
            $table->string('billed_to')->nullable();
            $table->string('billed_city')->nullable();
            $table->string('billed_state')->nullable();
            $table->string('billed_gstin_uin')->nullable();
            $table->string('shipped_to')->nullable();
            $table->string('shipped_city')->nullable();
            $table->string('shipped_state')->nullable();
            $table->string('shipped_gstin_uin')->nullable();
            $table->string('irn')->nullable();
            $table->string('ack_no')->nullable();
            $table->string('ack_date')->nullable();
            $table->json('items')->nullable(); // JSON column for storing items as an array
            $table->string('cgst_per')->nullable();
            $table->string('sgst_per')->nullable();
            $table->string('igst_per')->nullable();
            $table->string('cgst_amt')->nullable();
            $table->string('sgst_amt')->nullable();
            $table->string('igst_amt')->nullable();
            $table->string('grand_total_qty')->nullable();
            $table->string('grand_total_amt')->nullable();
            $table->string('hsn_sac_desc')->nullable();
            $table->string('tax_rate_desc')->nullable();
            $table->string('taxable_amt_desc')->nullable();
            $table->string('cgst_amt_desc')->nullable();
            $table->string('sgst_amt_desc')->nullable();
            $table->string('igst_amt_desc')->nullable();
            $table->string('total_tax_desc')->nullable();
            $table->string('msme_udyam_reg_number')->nullable();
            $table->string('bank_details')->nullable();
            $table->string('account_number')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gst_pdf_table');
    }
};
