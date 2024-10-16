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
        Schema::table('tbl_users', function (Blueprint $table) {
            $table->dropForeign(['d_id']);
    
            $table->foreignId('d_id')->default(1)->constrained('departments')->onDelete('cascade');
        });
    }
    
    public function down(): void
    {
        Schema::table('tbl_users', function (Blueprint $table) {
            $table->dropForeign(['d_id']);
            $table->dropColumn('d_id');
        });
    }
};
