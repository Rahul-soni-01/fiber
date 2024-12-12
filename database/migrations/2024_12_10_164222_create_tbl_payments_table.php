<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->string('purchase_id')->nullable();
            // $table->unsignedBigInteger('sell_id')->nullable();
            $table->decimal('amount_paid', 10, 2)->nullable();
            $table->decimal('remaining_amount', 10, 2)->nullable();
            $table->date('payment_date')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('bank_name')->nullable(); // New field for Bank Name
            $table->string('account_holder_name')->nullable(); // New field for Account Holder Name
            $table->string('branch_name')->nullable(); // New field for Branch Name
            $table->string('account_number')->nullable(); // New field for Account Number
            $table->enum('account_type', ['HSS', 'CD', 'CC', 'OD'])->nullable(); // New field for Account Type
            $table->string('ifsc_code')->nullable(); // New field for IFSC Code
            $table->text('notes')->nullable();
            $table->timestamps();
        
            $table->foreign('purchase_id')->references('id')->on('tbl_purchases')->onDelete('cascade');
            // $table->foreign('sell_id')->references('id')->on('tbl_sales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_payments');
    }
};
