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
        Schema::create('tbl_sales_items', function (Blueprint $table) {
            $table->id(); 
            $table->string('sid')->nullable();
            $table->string('sale_id')->nullable(); 
            $table->string('report_id')->nullable(); 
            $table->string('cname')->nullable();
            $table->string('scname')->nullable();
            $table->string('unit')->nullable();
            $table->string('sr_no')->nullable();
            $table->string('qty')->nullable();
            $table->string('rate')->nullable();
            $table->string('p_tax')->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_sales_items');
    }
};
