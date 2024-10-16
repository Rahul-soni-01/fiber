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
        Schema::create('tbl_purchases', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('invoice_no');
            $table->integer('pid');
            $table->integer('amount');
            $table->decimal('inr_rate',4,2);
            $table->string('inr_amount');
            $table->string('shipping_cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_purchases');
    }
};
