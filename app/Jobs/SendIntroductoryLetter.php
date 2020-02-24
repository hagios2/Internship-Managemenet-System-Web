<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
use App\InternshipApplication;
use App\User;
use App\Mail\SendIntroductoryLetterMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendIntroductoryLetter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $application;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(InternshipApplication $application)
    {
        $this->application = $application;

        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->application->student)->queue(new SendIntroductoryLetterMail($this->application));
            
    }
}
