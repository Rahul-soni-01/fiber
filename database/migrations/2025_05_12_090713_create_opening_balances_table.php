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
        Schema::create('tbl_opening_balances', function (Blueprint $table) {
            $table->id();
            $table->date('balance_date')->unique(); // Only one opening balance per date

            // Cash
            $table->decimal('cash_on_hand', 15, 2)->default(0);
            $table->decimal('petty_cash', 15, 2)->default(0);

            // Bank Accounts (consolidated)
            $table->decimal('bank', 15, 2)->default(0);
            $table->decimal('investment_accounts', 15, 2)->default(0);

            // Receivables
            $table->decimal('trade_receivables', 15, 2)->default(0);
            $table->decimal('loans_receivable', 15, 2)->default(0);
            $table->decimal('allowance_doubtful', 15, 2)->default(0);

            // Inventory
            $table->decimal('raw_materials', 15, 2)->default(0);
            $table->decimal('work_in_progress', 15, 2)->default(0);
            $table->decimal('finished_goods', 15, 2)->default(0);
          
            // Liabilities
            $table->decimal('trade_payables', 15, 2)->default(0);
            $table->decimal('short_term_loans', 15, 2)->default(0);
            $table->decimal('long_term_loans', 15, 2)->default(0);
            $table->decimal('tax_payable', 15, 2)->default(0);

            // Capital Breakdown
            $table->decimal('owners_capital', 15, 2)->default(0);
            $table->decimal('partners_capital', 15, 2)->default(0);
            $table->decimal('current_profit', 15, 2)->default(0);         

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opening_balances');
    }
};
