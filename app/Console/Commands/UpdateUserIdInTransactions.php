<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transaction;
use App\Models\User;

class UpdateUserIdInTransactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:users_id_transactions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update users_id in transactions table based on email or username';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Updating users_id in transactions table...');

        // Ambil semua transaksi tanpa user_id
        $transactions = Transaction::whereNull('users_id')->get();

        foreach ($transactions as $transaction) {
            // Cari user berdasarkan email
            $user = User::where('email', $transaction->email)->first();

            if ($user) {
                // Update kolom user_id
                $transaction->update(['users_id' => $user->id]);
                $this->info("Transaction ID {$transaction->id} updated with user_id {$user->id}");
            } else {
                $this->warn("No user found for transaction ID {$transaction->id} with email {$transaction->email}");
            }
        }

        $this->info('Update completed!');
    }
}
