<?php

namespace App\Mail;

use App\InternshipApplication;
use App\ApprovedApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendIntroductoryLetterMail extends Mailable 
{
    use Queueable, SerializesModels;

    public $application;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(InternshipApplication $application)
    {
        $this->application = $application;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $approvedApp = ApprovedApplication::find($this->application->company->id);

        return $this->markdown('mail.SendIntroductoryLetter')
            ->attach("{$approvedApp->approved_letter}", [
                'as' => 'Introductory Letter.pdf',
                'mime' => 'application/pdf',
            ]);
        
    }
}

