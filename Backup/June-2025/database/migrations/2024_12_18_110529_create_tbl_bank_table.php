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
        Schema::create('tbl_bank', function (Blueprint $table) {
            $table->id(); 
            $table->string('bank_name');
            $table->string('branch')->nullable();
            $table->enum('account_type', ['HSS', 'CD', 'CC', 'OD'])->nullable(); // New field for Account Type
            $table->string('account_number')->unique();
            $table->string('ifsc_code')->nullable(); 
            $table->string('account_holder_name')->nullable(); 
            $table->string('opening_balance')->nullable(); 
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_bank');
    }
};
