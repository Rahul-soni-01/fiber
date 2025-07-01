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
        Schema::create('tbl_cards', function (Blueprint $table) {
            $table->id();
            $table->string('scid')->nullable();
            $table->string('report_id')->nullable();
            $table->string('sr_card')->nullable();
            $table->string('amp_card')->nullable();
            $table->string('volt_card')->nullable();
            $table->string('watt_card')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_cards');
    }
};
