<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ExpenditureReportNotification extends Notification
{
    use Queueable;

    protected $expenditure;

    public function __construct($expenditure)
    {
        $this->expenditure = $expenditure;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Laporan Pengeluaran Baru')
            ->line('Ada laporan pengeluaran baru untuk kategori yang Anda donasikan.')
            ->line('Nama Aktivitas: ' . $this->expenditure->activity_name)
            ->line('Jumlah: Rp ' . number_format($this->expenditure->amount, 0, ',', '.'))
            ->action('Lihat Detail', url('/expenditures/' . $this->expenditure->id))
            ->line('Terima kasih atas dukungan Anda!');
    }

    public function toArray($notifiable)
    {
        return [
            'activity_name' => $this->expenditure->activity_name,
            'amount' => $this->expenditure->amount,
            'category' => $this->expenditure->product->name,
        ];
    }
}
