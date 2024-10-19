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
            $table->string('worker_name');
            $table->string('sr_no_fiber');
            $table->string('m_j');
            $table->string('type');
            $table->string('sr_card');
            $table->string('sr_led');
            $table->string('sr_isolator');
            $table->string('sr_aom_qswitch');
            $table->string('amp_aom_qswitch');
            $table->string('volt_aom_qswitch');
            $table->string('watt_aom_qswitch');
            $table->string('sr_cavity_nani');
            $table->string('sr_cavity_moti');
            $table->string('sr_combiner_3_1');
            $table->string('amp_combiner_3_1');
            $table->string('volt_combiner_3_1');
            $table->string('watt_combiner_3_1');
            $table->string('sr_couplar_2_2');
            $table->string('amp_couplar_2_2');
            $table->string('volt_couplar_2_2');
            $table->string('watt_couplar_2_2');
            $table->string('sr_hr');
            $table->string('sr_fiber_nano');
            $table->string('sr_fiber_moto');
            $table->string('output_volt');
            $table->string('output_watt');
            $table->string('nani_cavity');
            $table->string('final_cavity');
            $table->text('note1');        //Any note for fiber
            $table->text('note2');        //Any note for fiber
            $table->text('remark');        //Any remark for fiber at reject time
            $table->integer('status');        //
            $table->integer('part');        //
            $table->integer('temp');        //
            $table->integer('r_status');        //
            $table->integer('f_status');        //
            $table->integer('party_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_report');
    }
};
