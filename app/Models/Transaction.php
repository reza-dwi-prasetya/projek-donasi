<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'products_id',
        'users_id',
        'username',
        'email',
        'description',
        'donate_price',
        'snap_token',
        'metode_pembayaran',
        'status', // Tambahkan kolom baru
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($transaction) {
            // Ambil produk berdasarkan `products_id`
            $product = Product::find($transaction->products_id);
            if ($product) {
                $product->current_price += $transaction->donate_price;
                $product->save();
            }

            // Panggil fungsi untuk membuat transaksi Midtrans
            $transaction->createMidtransTransaction();
        });

        static::deleted(function ($transaction) {
            // Kurangi current_price saat transaksi dihapus
            $product = Product::find($transaction->products_id);
            if ($product) {
                $product->current_price -= $transaction->donate_price;
                $product->save();
            }
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function expenditures()
    {
        return $this->hasMany(Expenditure::class, 'transaction_id');
    }

    public function scopeIncomes($query)
    {
        return $query->where('donate_price', '>', 0);
    }

    public function createMidtransTransaction()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $this->id . '-' . time(),
                'gross_amount' => $this->donate_price,
            ],
            'customer_details' => [
                'first_name' => $this->username,
                'email' => $this->email,
            ],
            'item_details' => [
                [
                    'id' => $this->products_id,
                    'price' => $this->donate_price,
                    'quantity' => 1,
                    'name' => optional($this->product)->name,
                ],
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            $this->update(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            // Log atau tangani error
        }
    }
    public function getMetodePembayaranLabelAttribute()
    {
        $paymentMethods = [
            'bank_transfer' => 'Bank Transfer',
            'credit_card' => 'Kartu Kredit',
            'paypal' => 'PayPal',
            'e_wallet' => 'Dompet Elektronik',
        ];

        return $paymentMethods[$this->metode_pembayaran] ?? strtoupper($this->metode_pembayaran);
    }

}
