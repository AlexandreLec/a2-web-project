<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $items;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($item, $user)
    {
        $this->items = $item;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('shop.mail')
        ->with([
                'items' => $this->items,
                'user' => $this->user,
        ]);
    }
}
