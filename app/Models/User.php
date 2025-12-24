<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// ✅ TAMBAHKAN INI
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'avatar',
        'role',
        'is_active',
    ];

    protected $hidden = [
        'password',
        // 'remember_token', ❌ BOLEH DIHAPUS kalau memang tidak ada di table
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // ✅ INI WAJIB UNTUK FILAMENT
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->role === 'admin';
    }
}
