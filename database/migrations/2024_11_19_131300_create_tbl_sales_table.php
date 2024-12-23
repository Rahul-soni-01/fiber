<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_sales', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('sale_id')->unique()->nullable(); 
            $table->date('sale_date')->nullable(); 
            $table->foreignId('customer_id')->nullable();
            $table->decimal('amount_r', 12, 2)->nullable(); 
            $table->decimal('shipping_cost', 12, 2)->nullable(); 
            $table->decimal('round_total', 12, 2)->nullable(); 
            $table->decimal('amount', 12, 2)->nullable(); 
            $table->text('notes')->nullable(); 
            $table->timestamps(); 
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_sales');
    }
};
