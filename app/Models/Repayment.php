<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Repayment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['loan_id', 'repayment_date', 'repayment_amount'];

    public function loan()
    {
        $this->belongsTo(Loan::class);
    }
}
