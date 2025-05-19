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
       Schema::create('tbl_report_permission', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('user_type'); // e.g., "electric"
            $table->json('field_name'); // JSON data like {"part", "temp", "worker_name"}
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_report_permission');
    }
};
