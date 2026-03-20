<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderUpdateStatus extends Mailable
{
    use Queueable, SerializesModels;


    public $orders;
    public $user;
    public $messageText;
    /**
     * Create a new message instance.
     */
    public function __construct($orders, $message = "")
    {
        $this->orders = $orders;
        $this->user = $orders[0]->user ?? Auth::user();
        $this->messageText = $message; 
    }
    

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Update Status',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.orders-status',
            with:[
                'data'=>$this->orders,
                'user'=>$this->user,
                'customMessage'=>$this->messageText,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
