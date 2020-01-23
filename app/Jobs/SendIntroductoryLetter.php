<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
use App\ApprovedApplication;
use App\SendIntroductoryLetterMail;
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
    public function __construct(ApprovedApplication $application)
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
        Mail::to($application->company->email)
            ->from(auth()->guard('main_cordinator')->user()->name)
            ->attach($application->approved_letter)
            ->queue(new SendIntroductoryLetterMail($application));
            
    }
}
