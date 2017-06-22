<?php

namespace App\Mail;

use App\PurchaseItem;
use App\Product;
use App\ProductPurchaseItem;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShippedNoUser extends Mailable
{
    use Queueable, SerializesModels;

    protected $product_num;
    public $name;
    public $last_name;
    public $email;
    public $telefon;
    public $adresa;
    public $grad;
    public $napomena;
 

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct(PurchaseItem $product_num, $name, $last_name, $email, $telefon, $adresa, $grad, $napomena)
    {
        $this->product_num = $product_num;
        $this->name = $name;
        $this->last_name =$last_name;
        $this->email = $email;
        $this->telefon = $telefon;
        $this->adresa = $adresa;
        $this->grad = $grad;
        $this->napomena = $napomena;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('noUserMail')
        ->with([
                        'proizvod' => $this->product_num->product()->get(),
                        'broj' => $this->product_num->id
                        ])
        ->subject("Uspešna porudžbina");
    }
}
