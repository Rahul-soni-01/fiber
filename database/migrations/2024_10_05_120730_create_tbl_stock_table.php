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
        Schema::create('tbl_stock', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('invoice_no');
            $table->unsignedBigInteger('cid');
            $table->unsignedBigInteger('scid');
            $table->string('serial_no')->nullable();
            $table->integer('qty');
            $table->decimal('price', 10, 2);
            $table->decimal('priceofUnit', 10, 2);
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('cid')->references('id')->on('tbl_categories')->onDelete('cascade');
            $table->foreign('scid')->references('id')->on('tbl_sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.  
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_stock');
    }
};
