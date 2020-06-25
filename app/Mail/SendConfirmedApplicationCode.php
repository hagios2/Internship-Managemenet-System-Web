<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\ConfirmedApplicationCode;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendConfirmedApplicationCode extends Mailable
{
    use Queueable, SerializesModels;

    public $ConfirmedToken;

    public $code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ConfirmedApplicationCode $ConfirmedToken, $code)
    {
        $this->ConfirmedToken = $ConfirmedToken;

        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if($this->ConfirmedToken->company)
        {
            $mail = $this->markdown('mail.SendConfirmedApplicationCode')
                ->from(auth()->guard('main_cordinator')->user()->email)
                ->attach("{$this->ConfirmedToken->company->approved_application->approved_letter}",[
                
                    'as' => 'Introductory Letter.pdf',
                    'mime' => 'application/pdf',
                ]
            );

            foreach($this->ConfirmedToken->company->application as $application)
            {
                if($application->resume->isNotEmpty())
                {
                    $mail->attach("{$application->resume}");
                }
            }

        } else if($this->ConfirmedToken->application){

                $mail = $this->markdown('mail.SendConfirmedApplicationCode')
                ->from(auth()->guard('main_cordinator')->user()->email)
                ->attach("{$this->ConfirmedToken->application->approvedProposedApplicaton->letter}",[
                    
                        'as' => 'Introductory Letter.pdf',
                        'mime' => 'application/pdf',
                    ]
                );

                if($this->ConfirmedToken->application->resume->isNotEmpty())
                {
                    $mail->attach("{$this->ConfirmedToken->application->resume}");
                }
    
        }
       

        return $mail;
    }
}
