<?php

namespace App\Jobs;

use App\Mail\SendIntroductoryLetterMail;
use App\Models\InternshipApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendIntroductoryLetter implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

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
