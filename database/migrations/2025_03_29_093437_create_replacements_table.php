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
        Schema::create('replacements', function (Blueprint $table) {
            $table->id();
            $table->string('sale_id');
            $table->string('old_item_id');
            $table->string('new_item_id');
            $table->date('date')->default(now()->toDateString());
            $table->string('old_sr_no');
            $table->string('new_sr_no');
            $table->text('note')->nullable();
            // $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replacements');
    }
};
