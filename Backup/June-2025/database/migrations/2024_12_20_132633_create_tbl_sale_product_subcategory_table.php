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
        Schema::create('tbl_sale_product_subcategory', function (Blueprint $table) {
            $table->id();
            $table->integer('spcid')->nullable();
            $table->string('name');
            $table->string('unit')->nullable();
            $table->boolean('sr_no')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_sale_product_subcategory');
    }
};
