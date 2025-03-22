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
        Schema::create('tbl_sale_product_category', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Category name
            $table->string('is_type')->nullable(); // Nullable column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_sale_product_category');
    }
};
