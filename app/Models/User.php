<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// TAMBAHKAN BARIS INI:
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active',
    ];

    /* Atribut yang disembunyikan  */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'integer',
        ];
    }

    /* Relasi ke tabel userrole */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    
    /* Helper untuk cek apakah user adalah admin */
    public function isAdmin(): bool
    {
        return $this->role && $this->role->nama_role === 'admin';
    }
}