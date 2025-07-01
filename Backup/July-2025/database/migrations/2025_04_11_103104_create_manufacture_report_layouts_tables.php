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
        Schema::create('manufacture_report_layouts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('created_by'); // assuming users/admins table
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });

        // Layout fields table
        Schema::create('manufacture_report_layout_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('layout_id');
            $table->string('field_key');     // e.g., product_name
            $table->string('label');         // e.g., Product Name
            $table->boolean('visible')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('layout_id')->references('id')->on('manufacture_report_layouts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manufacture_report_layout_fields');
        Schema::dropIfExists('manufacture_report_layouts');
    }
};
