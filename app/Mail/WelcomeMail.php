<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function envelope()
    {
       /* return new Envelope(
            from: new Address('alisamicse320@gmail.com', 'Laravel Projects'),
            subject: 'Order Shipped'
        );
        */
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.welcome');

    }
    public function attachments()
{
    return [
       // Attachment::fromPath(env('APP_URL').'/images/review-2.jpg'),
    ];
}
}