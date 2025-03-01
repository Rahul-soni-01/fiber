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
        Schema::create('tbl_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('part')->nullable(); 
            $table->integer('f_status')->nullable();        
            // $table->integer('warranty')->nullable(); 
            $table->string('worker_name')->nullable();
            $table->string('sr_no_fiber')->nullable();
            $table->string('m_j')->nullable();
            $table->string('type')->nullable();
            $table->string('sr_card')->nullable();
            // $table->string('sr_led')->nullable();
            $table->string('sr_isolator')->nullable();
            $table->string('sr_aom_qswitch')->nullable();
            $table->string('amp_aom_qswitch')->nullable();
            $table->string('volt_aom_qswitch')->nullable();
            $table->string('watt_aom_qswitch')->nullable();
            $table->string('sr_cavity_nani')->nullable();
            $table->string('sr_cavity_moti')->nullable();
            $table->string('sr_combiner_3_1')->nullable();
            $table->string('amp_combiner_3_1')->nullable();
            $table->string('volt_combiner_3_1')->nullable();
            $table->string('watt_combiner_3_1')->nullable();
            $table->string('sr_couplar_2_2')->nullable();
            $table->string('amp_couplar_2_2')->nullable();
            $table->string('volt_couplar_2_2')->nullable();
            $table->string('watt_couplar_2_2')->nullable();
            $table->string('sr_hr')->nullable();
            $table->string('sr_fiber_nano')->nullable();
            $table->string('sr_fiber_moto')->nullable();
            $table->string('output_amp')->nullable();
            $table->string('output_volt')->nullable();
            $table->string('output_watt')->nullable();
            $table->string('nani_cavity')->nullable();
            $table->string('final_cavity')->nullable();
            $table->text('note1')->nullable();        //Any note for fiber
            $table->text('note2')->nullable();        //Any note for fiber
            $table->text('remark')->nullable();        //Any remark for fiber at reject time
            $table->integer('status')->nullable();               
            $table->string('temp')->nullable();        
            $table->integer('r_status')->nullable();        
            $table->integer('party_name')->nullable();
            $table->string('sale_status')->nullable();
            $table->string('stock_status')->nullable()->default('0');
            $table->integer('final_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_reports');
    }
};
