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
            $table->foreignId('customer_id')->nullable();
            $table->decimal('total_amount', 12, 2)->nullable(); 
            $table->date('sale_date')->nullable(); 
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