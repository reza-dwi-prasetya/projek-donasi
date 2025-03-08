<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CausesController;
use App\Http\Controllers\ContacController;
use App\Http\Controllers\C_Learn1;
use App\Http\Controllers\C_Learn2;
use App\Http\Controllers\C_Learn3;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LearnMoreController;
use App\Http\Controllers\KalkulatorZakatController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\StatisticsController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about', [AboutController::class, 'index'])->name('about');
Route::get('causes', [CausesController::class, 'index'])->name('causes');
Route::get('/causes/{id}', [CausesController::class, 'show'])->name('causes.show'); // Asumsikan Anda memiliki CauseController
Route::get('team', [OurTeamController::class, 'index'])->name('team');
Route::get('service', [ServiceController::class, 'index'])->name('service');
//contact
Route::get('contact', [ContacController::class, 'index'])->name('contact');
Route::post('/contact/send', [ContacController::class, 'sendMessage'])->name('contact.send');
Route::get('/contact/download/{id}', [ContacController::class, 'downloadMessage'])->name('contact.download');
//learn more
Route::get('/learn-more', [LearnMoreController::class, 'index'])->name('learn.more');
Route::get('/learn1', [C_Learn1::class, 'index'])->name('learn.1');
Route::get('/learn2', [C_Learn2::class, 'index'])->name('learn.2');
Route::get('/learn3', [C_Learn3::class, 'index'])->name('learn.3');
//another pages custom
Route::get('/kalkulator-zakat', [KalkulatorZakatController::class, 'create'])->name('kalkulator-zakat.create');
Route::post('/kalkulator-zakat', [KalkulatorZakatController::class, 'store'])->name('kalkulator-zakat.store');
Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics');
//pengeluaran
Route::get('/expenditures', [ExpenditureController::class, 'index'])->name('expenditures');
Route::get('/expenditures/{id}', [ExpenditureController::class, 'show'])->name('expenditures.show');
Route::post('/expenditures/download', [ExpenditureController::class, 'downloadPdf'])->name('expenditures.download');
Route::get('/expenditures/download', [ExpenditureController::class, 'downloadPdf'])->name('expenditures.download');
//donation
Route::get('donation', [DonateController::class, 'index'])->name('donate');
Route::post('donation/store', [DonateController::class, 'store'])->name('donate.store');
Route::post('/midtrans-checkout', [MidtransController::class, 'checkout'])->name('midtrans.checkout');
Route::post('/midtrans-webhook', [DonateController::class, 'handleWebhook']);
Route::post('midtrans-notification', [MidtransController::class, 'notification']);
Route::get('/payment-success', [DonateController::class, 'success'])->name('success');
//riwayt donasi
Route::middleware(['auth'])->group(function () {
    Route::get('/riwayat', [TransactionController::class, 'index'])->name('riwayat.index');
    Route::get('/riwayat/invoice/{kodeDonasi}', [TransactionController::class, 'show'])->name('riwayat.detail');
    Route::get('/riwayat/print/{kodeDonasi}', [TransactionController::class, 'print'])->name('riwayat.print');
});
//auth
Route::get('/login', [AuthController::class, 'loginForm'])->name('login-form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register-donatur', [AuthController::class, 'registerForm'])->name('register-form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
