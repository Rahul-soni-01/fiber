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
        Schema::create('estimates', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->date('in_date')->nullable(); // Entry date
            $table->string('sr_no')->nullable(); // Serial number
            $table->decimal('price', 10, 2)->nullable(); // Price with 2 decimal places
            $table->string('cid')->nullable(); // 'c' column (please rename if needed)
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimates');
    }
};
