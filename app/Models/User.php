<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'google_id',
        'avatar',
        'phone',
        'address',
        'bio',
        'last_login_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
        'last_login_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return (isset($this->role) && $this->role === 'admin') || (isset($this->is_admin) && $this->is_admin);
    }

    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            return asset('storage/' . $this->avatar);
        }

        // Generate avatar using initials
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF&size=150';
    }

    public function getInitialsAttribute()
    {
        $names = explode(' ', $this->name);
        $initials = '';

        foreach ($names as $name) {
            $initials .= substr($name, 0, 1);
        }

        return strtoupper(substr($initials, 0, 2));
    }
}
