<?php
namespace App\Http\Controllers;

use App\Models\Expenditure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use App\Notifications\ExpenditureReportNotification;
use App\Models\Transaction;

class ExpenditureController extends Controller
{
    /**
     * Display a listing of the user's expenditures.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index(Request $request)
    {
        $userEmail = $request->user()->email; // Ambil email user yang login

        // Ambil data transactions berdasarkan email
        $transactions = Transaction::with('product')
            ->where('email', $userEmail)
            ->get();

        // Ambil expenditures berdasarkan products_id dari transactions user
        $productIds = $transactions->pluck('products_id'); // Ambil daftar products_id
        $expenditures = Expenditure::with('product')
            ->whereIn('products_id', $productIds) // Filter berdasarkan products_id
            ->get();
        $relatedTransactions = Transaction::with('user', 'product')
            ->whereIn('products_id', $productIds)
            ->get();

        return view('expenditures.index', compact('expenditures', 'relatedTransactions', 'transactions'));
    }
    public function show($id)
    {
        $expenditure = Expenditure::findOrFail($id);
        return view('expenditures.detail', compact('expenditure'));
    }

    /**
     * Generate and download a PDF of the user's expenditures.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function downloadPdf()
    {
        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Pastikan pengguna sudah login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil pengeluaran berdasarkan produk yang terkait dengan transaksi donatur yang terdaftar
        $expenditures = Expenditure::with('transaction', 'product')
            ->whereHas('transaction', function ($query) use ($user) {
                // Mengambil pengeluaran berdasarkan transaksi yang terkait dengan produk
                $query->where('users_id', $user->id);
            })
            ->select('id', 'transaction_id', 'products_id', 'activity_name', 'amount', 'photo_proof', 'description', 'created_at', 'updated_at')
            ->get();

        // Generate PDF menggunakan Dompdf
        $dompdf = new Dompdf();
        $html = view('pdf.expenditures', compact('expenditures'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Unduh PDF
        return $dompdf->stream('expenditures.pdf');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'products_id' => 'required|exists:products,id',
            'activity_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'photo_proof' => 'nullable|image',
            'description' => 'nullable|string',
        ]);

        // Simpan laporan pengeluaran
        $expenditure = Expenditure::create($validated);

        // Ambil semua transaksi yang terkait dengan produk yang dipilih
        $donors = Transaction::where('products_id', $validated['products_id'])
            ->whereNotNull('users_id') // Pastikan ada user_id terkait
            ->with('users') // Ambil relasi user untuk mendapatkan email dan informasi lainnya
            ->get();

        // Kirim laporan pengeluaran kepada semua donatur terkait
        foreach ($donors as $donor) {
            // Kirim notifikasi ke user terkait
            $donor->users->notify(new ExpenditureReportNotification($expenditure));
        }

        return redirect()->route('expenditures.index')
            ->with('success', 'Laporan pengeluaran berhasil dibuat dan dikirim ke donatur.');
    }
}
