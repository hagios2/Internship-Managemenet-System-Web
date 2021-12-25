<?php

namespace App\Mail;

use App\Models\Cordinator;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CoordinatorRegistratioinMail extends Mailable
{
    use Queueable, SerializesModels;

    private Cordinator $coordinator;
    private string $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Cordinator $coordinator, string $password)
    {
        $this->coordinator = $coordinator;

        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): CoordinatorRegistratioinMail
    {
        return $this->view('mail.CoordinatorRegistrationMail')
            ->subject('Staff Registration Mail');
    }
}
