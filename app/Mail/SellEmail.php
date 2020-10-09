<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SellEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $admin, $product)
    {
        $this->user = $user;
        $this->admin = $admin;
        $this->product = $product;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->text('emails.sell')
                    ->subject('商品が購入されました')
                    ->with(['user' => $this->user,
                        'admin' => $this->admin,
                        'product' => $this->product]);
    }
}
