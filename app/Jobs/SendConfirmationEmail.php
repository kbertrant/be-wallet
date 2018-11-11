<?php

namespace App\Jobs;

use App\Mail\RegistrationMail;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendConfirmationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var  User */
    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $registrationEmail = new RegistrationMail($this->user);

        Mail::to($this->user->email, $this->user->name)->send($registrationEmail);
    }

    /**
     * When the job failed.
     *
     * @return void
     */
    public function failed()
    {
        Log::alert('error in registration queue mail');
    }
}
