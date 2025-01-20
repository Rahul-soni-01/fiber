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
        Schema::table('tbl_reports', function (Blueprint $table) {
            $table->string('sale_status')->nullable()->after('final_amount');
            $table->string('stock_status')->nullable()->default('0')->after('final_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_reports', function (Blueprint $table) {
            $table->dropColumn('sale_status');
            $table->dropColumn('stock_status');
        });
    }
};
