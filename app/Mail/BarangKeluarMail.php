<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BarangKeluarMail extends Mailable
{
    use Queueable, SerializesModels;

    public $barangKeluar;
    /**
     * Create a new message instance.
     */
    public function __construct($barangKeluar)
    {
        $this->barangKeluar = $barangKeluar;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notifikasi Barang Keluar',
        );
    }

    public function build()
    {
        return $this->view('emails.barang_keluar') // 👈 ini nama view-nya
            ->with([
                'barang' => $this->barangKeluar
            ])
            ->subject('Notifikasi Barang Keluar');
    }


    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.barang_keluar',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
