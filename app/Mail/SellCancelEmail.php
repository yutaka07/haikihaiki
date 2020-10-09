<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SellCancelEmail extends Mailable
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
        return $this->text('emails.sellcancel')
                    ->subject('商品の購入がキャンセルされました')
                    ->with(['user' => $this->user,
                        'admin' => $this->admin,
                        'product' => $this->product]);
    }
}
