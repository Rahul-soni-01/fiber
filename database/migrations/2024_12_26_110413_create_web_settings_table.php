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
        Schema::create('web_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable(); // Path to the main logo
            $table->string('invoice_logo')->nullable(); // Path to the invoice logo
            $table->string('favicon')->nullable(); // Path to the favicon
            $table->string('currency')->default('INR'); // Default currency
            $table->string('timezone')->default('UTC'); // Default timezone
            $table->text('footer_text')->nullable(); // Footer text
            $table->string('language')->default('en'); // Default language
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_settings');
    }
};