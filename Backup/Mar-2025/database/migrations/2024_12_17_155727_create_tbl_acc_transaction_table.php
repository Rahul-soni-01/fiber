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
        Schema::create('tbl_acc_transaction', function (Blueprint $table) {
            $table->id();
            $table->string('vid')->nullable();
            $table->string('fyear')->nullable();
            $table->string('VNo')->nullable();
            $table->string('Vtype')->nullable();
            $table->date('VDate')->nullable();
            $table->unsignedBigInteger('COAID')->nullable();
            $table->text('Narration')->nullable();
            $table->string('chequeNo')->nullable();
            $table->date('chequeDate')->nullable();
            $table->text('ledgerComment')->nullable();
            $table->decimal('Debit', 15, 2)->nullable();
            $table->decimal('Credit', 15, 2)->nullable();
            $table->boolean('IsAppove')->default(false);
            $table->string('RevCodde')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_acc_transaction');
    }
};
