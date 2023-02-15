<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class TicketMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        //
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $path = Storage::get('public/qrcodes/QR-'.$this->details['body'].'.png');    
        return $this->subject('Order Ticket Confirmation')
                    ->view('email.ticket')
                    // ->attach(public_path('qrcodes/29.png'), [
                    //      'as' => $this->details['body'],
                    //      'mime' => 'image/png',
                    // ]);
                    ->attach(public_path($this->details['path']), [
                         'as' => $this->details['body'],
                         'mime' => 'image/png',
                    ]);
    }
}
