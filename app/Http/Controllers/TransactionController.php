<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        // Mengambil transaksi berdasarkan email pengguna yang sedang login
        $invoices = Transaction::with('product')
            ->where('email', Auth::user()->email)
            ->get();

        return view('user.riwayat', compact('invoices'));
    }

    public function show($kodeDonasi)
    {
        // Mengambil transaksi berdasarkan ID dan menampilkan detailnya
        $invoice = Transaction::with('product')
            ->where('id', $kodeDonasi)
            ->firstOrFail();

        return view('user.detail', compact('invoice'));
    }

    public function print($kodeDonasi)
    {
        // Mengambil transaksi berdasarkan ID untuk keperluan cetak
        $data = Transaction::with('product')
            ->where('id', $kodeDonasi)
            ->firstOrFail(); // Menggunakan firstOrFail untuk memastikan data ada

        return view('user.print', compact('data'));
    }
}
