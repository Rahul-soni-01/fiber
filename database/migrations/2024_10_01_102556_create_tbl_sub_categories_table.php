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
        Schema::create('tbl_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('cid');
            $table->string('sub_category_name');
            $table->string('unit');
            $table->boolean('sr_no')->default(1);
            $table->boolean('is_sellable')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_sub_categories');
    }
};
