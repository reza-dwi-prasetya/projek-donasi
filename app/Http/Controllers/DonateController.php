<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use Illuminate\Support\Facades\Log;

class DonateController extends Controller
{
    public function index()
    {
        $product = Product::all();

        return view('pages.donate', [
            'product' => $product
        ]);
    }

    public function store(TransactionRequest $request)
    {
        // Ambil data dari request
        $data = $request->validated();

        // Temukan produk berdasarkan ID
        $product = Product::findOrFail($data['products_id']);

        // Perbarui harga produk
        $product->current_price = ($product->current_price ?? 0) + $data['donate_price'];
        $product->save();

        // Simpan transaksi ke database
        $transaction = Transaction::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'description' => $data['description'],
            'donate_price' => $data['donate_price'],
            'products_id' => $data['products_id'],
            'metode_pembayaran' => $data['metode_pembayaran'], // Simpan metode pembayaran
            'status' => 'pending', // Status default adalah pending
        ]);

        // Konfigurasi Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Parameter untuk Midtrans
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
            // Dapatkan Snap Token dari Midtrans
            $snapToken = Snap::getSnapToken($params);

            // Simpan Snap Token ke dalam transaksi
            $transaction->snap_token = $snapToken;
            $transaction->save(); // Pastikan untuk menyimpan perubahan

            return response()->json([
                'snapToken' => $snapToken,
                'transaction_id' => $transaction->id,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'error',
            ]);
        }
    }

    public function handleWebhook(Request $request)
    {
        // Log seluruh data request dari Midtrans
        Log::info('Webhook received:', $request->all());

        $notification = new Notification();

        Log::info('Parsed Notification:', [
            'transaction_status' => $notification->transaction_status,
            'fraud_status' => $notification->fraud_status,
            'payment_type' => $notification->payment_type,
            'order_id' => $notification->order_id,
        ]);

        // Ambil data notifikasi
        $transactionStatus = $notification->transaction_status;
        $fraudStatus = $notification->fraud_status;
        $paymentType = $notification->payment_type;

        // Temukan transaksi berdasarkan order_id
        $transaction = Transaction::find($notification->order_id);

        if (!$transaction) {
            Log::error('Transaction not found for order_id:', ['order_id' => $notification->order_id]);
            return response()->json(['status' => 'Transaction not found'], 404);
        }

        // Perbarui transaksi
        $transaction->metode_pembayaran = $paymentType;
        $transaction->status = match ($transactionStatus) {
            'capture' => $fraudStatus === 'accept' ? 'success' : 'pending',
            'settlement' => 'success',
            'pending' => 'pending',
            default => 'failed',
        };
        $transaction->save();

        Log::info('Transaction updated successfully', ['transaction_id' => $transaction->id]);

        return response()->json(['status' => 'success']);
    }

    public function success(Request $request)
    {
        // Ambil semua data dari response
        $response = $request->all();

        // Periksa apakah 'transaction_status' ada dalam response
        if (isset($response['transaction_status']) &&
            ($response['transaction_status'] == 'capture' || $response['transaction_status'] == 'settlement')) {

            try {
                // Temukan transaksi berdasarkan ID
                $transaction = Transaction::findOrFail($response['order_id']);

                // Perbarui data transaksi
                $transaction->update([
                    'metode_pembayaran' => $response['payment_type'] ?? 'unknown', // Simpan metode pembayaran
                    'status' => 'success', // Perbarui status transaksi
                ]);

                // Simpan data transaksi ke database
                Transaction::create([
                    'username' => $response['customer_details']['first_name'] ?? 'Unknown',
                    'email' => $response['customer_details']['email'] ?? 'Unknown',
                    'donate_price' => $response['gross_amount'] ?? 0,
                    'products_id' => $response['order_id'] ?? null,
                    'metode_pembayaran' => $response['payment_type'] ?? 'unknown', // Simpan metode pembayaran
                    'status' => 'success', // Status transaksi sukses
                ]);
            } catch (\Exception $e) {
                // Log kesalahan jika terjadi
                Log::error('Error saving transaction:', [
                    'error' => $e->getMessage(),
                    'response' => $response,
                ]);
                return response()->json([
                    'message' => 'Failed to save transaction',
                    'error' => $e->getMessage(),
                ], 500);
            }
        } else {
            // Log jika transaksi tidak berhasil
            Log::warning('Transaction status is not successful', [
                'response' => $response,
            ]);
        }

        // Tampilkan halaman sukses
        return view('pages.success');
    }
}
