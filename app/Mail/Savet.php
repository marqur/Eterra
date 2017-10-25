<?php

namespace App\Mail;

use App\Advice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Savet extends Mailable
{
    use Queueable, SerializesModels;

    protected $savet;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Advice $savet)
    {
        $this->savet = $savet;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('savet')
        ->with([
                        'name' => $this->savet->name,
                        'email' => $this->savet->email,
                        'poruka' => $this->savet->poruka
                        ])
        ->subject("Nova poruka");
    }
}
