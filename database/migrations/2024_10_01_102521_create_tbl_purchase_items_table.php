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
        Schema::create('tbl_purchase_items', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_no');
            $table->string('cid');
            $table->string('scid');
            $table->integer('qty');
            $table->string('unit');
            $table->decimal('price',7,2);
            $table->decimal('total',10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_purchase_items');
    }
};
