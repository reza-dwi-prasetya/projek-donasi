<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'activity_name',
        'amount',
        'description',
    ];

    /**
     * Scope untuk laporan pemasukan.
     */
    public function scopeIncomes($query)
    {
        return $query->where('amount', '>', 0);
    }

    /**
     * Scope untuk laporan pengeluaran.
     */
    public function scopeExpenses($query)
    {
        return $query->where('amount', '<', 0);
    }
}
