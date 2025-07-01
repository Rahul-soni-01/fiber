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
        Schema::create('tbl_acc_coa', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('HeadCode')->nullable();
            $table->string('HeadName')->nullable();
            $table->string('PHeadName')->nullable();
            $table->string('PHeadCode')->nullable();
            $table->integer('HeadLevel')->nullable();
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_acc_coa');
    }
};
