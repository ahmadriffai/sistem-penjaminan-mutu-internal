<?php

namespace App\Jobs;

use App\Mail\UserCridentialMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailjob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private User $user;
    private string $password;

    /**
     * @param User $user
     */
    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $details = [
            'name' => $this->user->name,
            'password' => $this->password,
        ];

        $email = new UserCridentialMail($details);
        Mail::to($this->user->email)->send($email);
    }
}
