<?php

namespace App\Mail;

use App\Models\ConfirmedApplicationCode;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

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
                if($application->resume)
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

                if($this->ConfirmedToken->application->resume)
                {
                    $mail->attach("{$this->ConfirmedToken->application->resume}");
                }
    
        }
       

        return $mail;
    }
}
