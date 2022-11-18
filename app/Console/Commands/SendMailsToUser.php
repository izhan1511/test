<?php

namespace App\Console\Commands;

use App\Mail\PostMail;
use App\Models\User;
use Illuminate\Console\Command;
use Mail;

class SendMailsToUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will send mail to all users in the database.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::all();
        foreach ($user as $value) {
            Mail::to($value->email)->send(new PostMail());
        }
    }
}
