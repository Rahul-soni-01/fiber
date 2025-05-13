<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningBalance extends Model
{
    use HasFactory;

    protected $table = 'tbl_opening_balances';

    protected $fillable = [
        'balance_date',
        'cash_on_hand',
        'petty_cash',
        'bank',
        'investment_accounts',
        'trade_receivables',
        'loans_receivable',
        'allowance_doubtful',
        'raw_materials',
        'work_in_progress',
        'finished_goods',
        'trade_payables',
        'short_term_loans',
        'long_term_loans',
        'tax_payable',
        'share_capital',
        'retained_earnings',
        'current_profit',
        'capital', // or use sub-categories like owners_capital, partners_capital, etc.
    ];

    protected $casts = [
        'balance_date' => 'date',
        'cash_on_hand' => 'decimal:2',
        'petty_cash' => 'decimal:2',
        'bank' => 'decimal:2',
        'investment_accounts' => 'decimal:2',
        'trade_receivables' => 'decimal:2',
        'loans_receivable' => 'decimal:2',
        'allowance_doubtful' => 'decimal:2',
        'raw_materials' => 'decimal:2',
        'work_in_progress' => 'decimal:2',
        'finished_goods' => 'decimal:2',
        'trade_payables' => 'decimal:2',
        'short_term_loans' => 'decimal:2',
        'long_term_loans' => 'decimal:2',
        'tax_payable' => 'decimal:2',
        'share_capital' => 'decimal:2',
        'retained_earnings' => 'decimal:2',
        'current_profit' => 'decimal:2',
        'capital' => 'decimal:2',
    ];
}
