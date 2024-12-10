<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'borrower_id',
        'loan_id',
        'file_name',
        'file_path',
        'file_type'
    ];

    public function borrower()
    {
        return $this->belongsTo(Borrower::class);
    }
    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
