<?php

namespace App\Mail;

use App\Models\Cordinator;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CoordinatorRegistrationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public Cordinator $cordinator;

    public string $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Cordinator $cordinator, string $password)
    {
        $this->cordinator = $cordinator;

        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): CoordinatorRegistrationMail
    {
        return $this->markdown('mail.CoordinatorRegistrationMail')
            ->subject('Staff Registration Mail');
    }
}
