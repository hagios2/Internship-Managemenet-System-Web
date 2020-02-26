<?php

namespace App\Mail;

use App\InternshipApplication;
use App\ApprovedApplication;
use App\OtherApplicationApproved;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendIntroductoryLetterMail extends Mailable 
{
    use Queueable, SerializesModels;

    public $application;

    public $letter;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(InternshipApplication $application, $letter=null)
    {
        $this->application = $application;

        $this->letter = $letter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if($this->application->default_application)
        {
            $approvedApp = $this->application->company->approved_application;

            return $this->markdown('mail.SendIntroductoryLetter')
                ->from(auth()->guard('main_cordinator')->user()->email)
                ->attach("{$approvedApp->approved_letter}", [
                    'as' => 'Introductory Letter.pdf',
                    'mime' => 'application/pdf',
            ]);

        } else if($this->application->preferred_company){

         //   $approvedApp = $this->application->approvedProposedApplicaton;
/* 
            $approvedApp = OtherApplicationApproved::where('application_id', $this->application->id)->get(); */ //returns null object 

            return $this->markdown('mail.SendIntroductoryLetter')
            ->from(auth()->guard('main_cordinator')->user()->email)
            ->attach("{$this->letter}", [
                'as' => 'Introductory Letter.pdf',
                'mime' => 'application/pdf',
            ]);
        }
    }
}

