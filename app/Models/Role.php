<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    protected $table = 'userrole';

    protected $fillable = [
        'nama_role',
        'keterangan',
    ];

    /* Relasi ke tabel User  */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
