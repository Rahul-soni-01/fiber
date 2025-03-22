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
        Schema::create('tbl_reports_items', function (Blueprint $table) {
            $table->id();
            $table->string('scid')->nullable();
            $table->string('unit')->nullable();
            $table->string('report_id')->nullable();
            $table->string('dead_status')->nullable();
            $table->string('tblstock_id')->nullable();
            $table->string('sr_no')->nullable();
            $table->string('used_qty')->nullable();
            $table->string('amp')->nullable();
            $table->string('volt')->nullable();
            $table->string('watt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_reports_items');
    }
};
