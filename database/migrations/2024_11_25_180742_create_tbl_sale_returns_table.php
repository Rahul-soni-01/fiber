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
        Schema::create('tbl_sale_returns', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable(); // Nullable date field
            $table->string('sr_no')->nullable(); // Nullable serial number
            $table->unsignedBigInteger('c_id')->nullable(); // Nullable foreign key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_sale_returns');
    }
};
