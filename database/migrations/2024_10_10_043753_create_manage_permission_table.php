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
        Schema::create('manage_permission', function (Blueprint $table) {
            $table->id();
            $table->foreignId('uid')->constrained('tbl_users')->onDelete('cascade');
            $table->json('d_id');
            $table->json('p_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manage_permission');
    }
};
