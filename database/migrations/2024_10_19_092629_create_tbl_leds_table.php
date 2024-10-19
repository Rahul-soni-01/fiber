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
            $table->id(); // Auto-incremented ID
            $table->string('name'); // LED name (could store 'led_45', 'led_15', 'led_30')
            $table->string('invoice_no'); // To link with report/invoice
            $table->string('sr_led'); // SR for the LED
            $table->string('amp_led'); // Amperage for the LED
            $table->string('volt_led'); // Voltage for the LED
            $table->string('watt_led'); // Wattage for the LED
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
