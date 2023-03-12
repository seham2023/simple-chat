<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Mail\DemoMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailToUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:mails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $users = User::select('name', 'email')->get();

        foreach ($users as $user) {
            $mailData = [
                'title' => 'Hello, ' . $user->name,
            ];

            Mail::to($user->email)->send(new DemoMail($mailData));
        }

        $this->info('Email sent to all users.');
    }
}
