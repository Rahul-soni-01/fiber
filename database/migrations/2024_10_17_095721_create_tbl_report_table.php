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
        Schema::create('tbl_report', function (Blueprint $table) {
            $table->id(); // Auto-incremented ID
            $table->date('date'); // DATE field
            $table->integer('sr_no'); // SR NO field
            $table->string('item'); // ITEM field
            $table->string('card'); // CARD field
            $table->string('led_45'); // LED-45 field
            $table->string('led_15'); // LED-15 field
            $table->string('led_30'); // LED-30 field
            $table->string('isolator'); // ISOLATOR field
            $table->string('aom_qswitch'); // AOM(QSWITCH) field
            $table->string('cavity_nani'); // CAVITY NANI field
            $table->string('cavity_moti'); // CAVITY MOTI field
            $table->string('combiner_3x1'); // COBINER (3*1) field
            $table->string('couplar_2x2'); // COUPLAR(2*2) field
            $table->string('hr'); // HR field
            $table->string('fiber_nano'); // FIBER NANO field
            $table->string('fiber_moto'); // FIBER MOTO field
            $table->string('test'); // TEST field
            $table->string('nani_cavity'); // NANI CAVITY field
            $table->string('final_cavity'); // FINAL CAVITY field
            $table->timestamps(); // Created at and updated at fields
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
