<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BarangMasukMail extends Mailable
{
    use Queueable, SerializesModels;

    public $barangMasuk;
    /**
     * Create a new message instance.
     */
    public function __construct($barangMasuk)
    {
        $this->barangMasuk = $barangMasuk;
    }

    /**
     * Get the message envelope.
     */

    public function build()
    {
        return $this->view('emails.barang_masuk') // 👈 ini nama view-nya
            ->with([
                'barang' => $this->barangMasuk
            ])
            ->subject('Notifikasi Barang Masuk');
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notifikasi Barang Masuk',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.barang_masuk',
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
