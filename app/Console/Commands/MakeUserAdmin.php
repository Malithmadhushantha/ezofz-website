<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:make-user {email : The email address of the user to make admin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a user an administrator by email address';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("User with email '{$email}' not found.");
            return 1;
        }

        if ($user->isAdmin()) {
            $this->info("User '{$user->name}' ({$email}) is already an administrator.");
            return 0;
        }

        // Set both role and is_admin for maximum compatibility
        $user->role = 'admin';
        $user->is_admin = true;
        $user->save();

        $this->info("Successfully made '{$user->name}' ({$email}) an administrator.");
        $this->line("User can now access the admin panel at: " . route('admin.dashboard'));

        return 0;
    }
}
