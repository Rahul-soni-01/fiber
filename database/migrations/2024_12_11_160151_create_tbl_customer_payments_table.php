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
        Schema::create('tbl_customer_payments', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('purchase_id')->nullable();
            $table->unsignedBigInteger('sell_id')->nullable();
            $table->decimal('amount_paid', 10, 2)->nullable();
            $table->decimal('remaining_amount', 10, 2)->nullable();
            $table->date('payment_date')->nullable();
            $table->string('payment_method')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        
            // $table->foreign('purchase_id')->references('id')->on('tbl_purchases')->onDelete('cascade');
            $table->foreign('sell_id')->references('id')->on('tbl_sales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_customer_payments');
    }
};
