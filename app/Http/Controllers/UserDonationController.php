<?php
namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class UserDonationController extends Controller
{
    public function index()
    {
        $userEmail = Auth::user()->email; // Mengambil email pengguna yang login
        $transactions = Transaction::with('product')
            ->where('email', $userEmail) // Filter berdasarkan email pengguna
            ->get();

        return view('user.donations.index', compact('transactions'));
    }
}
