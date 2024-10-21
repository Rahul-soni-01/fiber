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
        Schema::create('tbl_leds', function (Blueprint $table) {
            $table->id(); 
            $table->string('scid'); 
            $table->string('report_id'); 
            $table->string('sr_led');
            $table->string('amp_led'); 
            $table->string('volt_led'); 
            $table->string('watt_led'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_leds');
    }
};
