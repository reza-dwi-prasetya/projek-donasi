<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'products_id',
        'activity_name',
        'amount',
        'photo_proof',
        'description',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }
        public function scopeExpenses($query)
    {
        return $query->where('amount', '>', 0); // Sesuaikan dengan kolom pengeluaran
    }
}
