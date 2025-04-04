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
        Schema::create('tbl_expensive', function (Blueprint $table) {
            $table->id(); // Primary key, auto-increment
            $table->string('date')->nullable(); // Name of the expense
            $table->string('name')->nullable(); // Name of the expense
            $table->decimal('amount', 10, 2)->nullable(); // Expense amount
            $table->enum('payment_type', ['Cash', 'Bank'])->nullable(); // Payment type
            $table->string('transaction_type')->nullable();// Transaction type
            $table->string('bank_id')->nullable(); // Foreign key or reference to bank
            $table->string('cheque_no')->nullable(); // Cheque number
            $table->text('notes')->nullable(); // Notes about the expense
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_expensive');
    }
};
