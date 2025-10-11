<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ListUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:list-users {--admin : Show only admin users}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all users with their admin status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $query = User::query();

        if ($this->option('admin')) {
            $query->where(function($q) {
                $q->where('role', 'admin')->orWhere('is_admin', true);
            });
        }

        $users = $query->orderBy('created_at', 'desc')->get();

        if ($users->isEmpty()) {
            $this->info('No users found.');
            return 0;
        }

        $headers = ['ID', 'Name', 'Email', 'Role', 'Is Admin (bool)', 'Is Admin (method)', 'Created At'];

        $data = $users->map(function ($user) {
            return [
                $user->id,
                $user->name,
                $user->email,
                $user->role ?? 'Not set',
                $user->is_admin ? 'Yes' : 'No',
                $user->isAdmin() ? 'Yes' : 'No',
                $user->created_at->format('Y-m-d H:i:s')
            ];
        })->toArray();

        $this->table($headers, $data);

        $adminCount = $users->filter(fn($user) => $user->isAdmin())->count();
        $totalCount = $users->count();

        $this->line('');
        $this->info("Total users: {$totalCount}");
        $this->info("Admin users: {$adminCount}");

        if ($adminCount === 0 && !$this->option('admin')) {
            $this->line('');
            $this->comment('No admin users found. To make a user admin, run:');
            $this->line('php artisan admin:make-user <email>');
        }

        return 0;
    }
}
