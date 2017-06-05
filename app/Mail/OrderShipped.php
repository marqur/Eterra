<?php

namespace App\Mail;

use App\PurchaseItem;
use App\Product;
use App\ProductPurchaseItem;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $user_id;
 

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct(PurchaseItem $user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail')
        ->with([
                        'proizvod' => $this->user_id->product()->get(),
                        'user' => $this->user_id->userId(),
                        'broj' => $this->user_id->id
                        ]);
    }
}
