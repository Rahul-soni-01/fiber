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
        Schema::create('tbl_acc_vaucher', function (Blueprint $table) {
            $table->id();
            $table->string('fyear')->nullable();
            $table->string('VNo')->nullable();
            $table->string('Vtype')->nullable();
            $table->string('referenceNo')->nullable();
            $table->date('VDate')->nullable();
            $table->unsignedBigInteger('COAID')->nullable();
            $table->text('Narration')->nullable();
            $table->text('ledgerComment')->nullable();
            $table->decimal('Debit', 15, 2)->nullable();
            $table->decimal('Credit', 15, 2)->nullable();
            $table->string('RevCodde')->nullable();
            $table->boolean('isApproved')->nullable();
            $table->unsignedBigInteger('approvedBy')->nullable();
            $table->timestamp('approvedDate')->nullable();
            $table->boolean('isyearClosed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_acc_vaucher');
    }
};
