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
            $table->string('customer_id')->nullable(); // Nullable foreign 
            $table->string('sale_id')->nullable();
            $table->string('sr_no')->nullable(); // Nullable serial number
            $table->string('cid')->nullable();
            $table->string('scid')->nullable();
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
        Schema::dropIfExists('tbl_sale_returns');
    }
};
