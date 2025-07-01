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
        Schema::create('tbl_customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('HeadCode');
            $table->string('address');
            $table->string('pincode');
            $table->string('city');
            $table->string('state');
            $table->string('telephone_no');
            $table->string('receiver_name');
            $table->string('gst_no')->nullable();
            $table->string('ship_address')->nullable();
            $table->string('ship_pincode')->nullable();
            $table->string('ship_city')->nullable();
            $table->string('ship_state')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_customers');
    }
};
