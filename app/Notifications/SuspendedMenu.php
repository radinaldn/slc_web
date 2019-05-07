<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SuspendedMenu extends Notification
{
    use Queueable;
    protected $nama_menu, $nama_restoran, $email_address;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($nama_menu, $nama_restoran)
    {
        $this->nama_menu = $nama_menu;
        $this->nama_restoran = $nama_restoran;
        // $this->email_address = $email;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    // public function routeNotificationForMail($notification)
    // {
    //     return $this->email_address;
    // }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        return (new MailMessage)
          ->line('Anda Menerima Email Ini Karena Banyaknya Pengaduan tentang tidak Tepatnya Informasi, yang diberikan pada salah satu Menu Anda,')
          ->line('Nama Menu: '.$this->nama_menu)
          ->line('Nama Restoran: '.$this->nama_restoran)
          ->line('Dengan Ini Kami Menyatakan akan Menangguhkan Menu tersebut sehingga menu anda tidak akan Muncul di daftar Rekomendasi')
          ->line('Silahkan Perbaharui Data Menu Anda Dengan Benar, dan Balas Email Ini Untuk Konfirmasi Kepada Kami')
          ->line('Silahkan Balas Email Ini Jika Terdapat Hal Yang Membingungkan, Terimakasih');

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
