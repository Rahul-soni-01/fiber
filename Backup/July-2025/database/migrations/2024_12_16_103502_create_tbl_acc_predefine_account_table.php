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
        Schema::create('tbl_acc_predefine_account', function (Blueprint $table) {
            $table->id();
            $table->integer('cashCode')->nullable();
            $table->integer('bankCode')->nullable();
            $table->integer('advance')->nullable();
            $table->integer('fixedAsset')->nullable();
            $table->integer('purchaseCode')->nullable();
            $table->integer('salesCode')->nullable();
            $table->integer('serviceCode')->nullable();
            $table->integer('customerCode')->nullable();
            $table->integer('supplierCode')->nullable();
            $table->integer('costs_of_good_solds')->nullable();
            $table->integer('vat')->nullable();
            $table->integer('tax')->nullable();
            $table->integer('inventoryCode')->nullable();
            $table->integer('CPLCode')->nullable();
            $table->integer('LPLCode')->nullable();
            $table->integer('salary_code')->nullable();
            $table->integer('emp_npf_contribution')->nullable();
            $table->integer('empr_npf_contribution')->nullable();
            $table->integer('emp_icf_contribution')->nullable();
            $table->integer('empr_icf_contribution')->nullable();
            $table->integer('prov_state_tax')->nullable();
            $table->integer('state_tax')->nullable();
            $table->integer('prov_npfcode')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_acc_predefine_account');
    }
};
