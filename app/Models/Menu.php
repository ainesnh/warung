<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_menu',
        'kategori',
        'harga',
        'deskripsi',
        'gambar',
        'status',
        'is_special',
    ];

    protected function casts(): array
    {
        return [
            'harga' => 'decimal:2',
        ];
    }

    public function scopeTersedia($query)
    {
        return $query->where('status', 1);
    }
}
