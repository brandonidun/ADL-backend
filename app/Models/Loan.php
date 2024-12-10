<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Loan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'borrower_id',
        'approval_date',
        'repayment_date',
        'loan_amount',
        'interest_rate',
        'repayment_amount',
        'status'
    ];

    public function borrower()
    {
        return $this->belongsTo(Borrower::class);
    }
    public function repayment()
    {
        return $this->hasMany(Repayment::class);
    }
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
