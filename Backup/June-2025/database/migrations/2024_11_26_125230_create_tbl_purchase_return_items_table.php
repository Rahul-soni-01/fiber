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
        Schema::create('tbl_purchase_return_items', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->string('invoice_no')->nullable();
            $table->unsignedBigInteger('cid')->nullable();
            $table->unsignedBigInteger('scid')->nullable();
            $table->integer('qty')->nullable();
            $table->string('unit')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_purchase_return_items');
    }
};
