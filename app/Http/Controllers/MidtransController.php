<?php
namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class MidtransController extends Controller
{
    public function checkout(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'description' => 'required|string',
            'donate_price' => 'required|numeric|min:1',
            'products_id' => 'required|exists:products,id',
        ]);

        // Konfigurasi Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Simpan transaksi ke database
        $transaction = Transaction::create([
            'username' => $request->username,
            'email' => $request->email,
            'description' => $request->description,
            'donate_price' => $request->donate_price,
            'products_id' => $request->products_id,
            'metode_pembayaran' => $request->metode_pembayaran, // Simpan metode pembayaran
            'status' => 'pending',
        ]);

        // Parameter transaksi untuk Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $transaction->id,
                'gross_amount' => $transaction->donate_price,
            ],
            'customer_details' => [
                'first_name' => $transaction->username,
                'email' => $transaction->email,
            ],
        ];

        try {
            // Buat Snap Token
            $snapToken = Snap::getSnapToken($params);

            // Simpan Snap Token ke dalam transaksi
            $transaction->update(['snap_token' => $snapToken]);

            return redirect()->back()->with('snapToken', $snapToken);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
