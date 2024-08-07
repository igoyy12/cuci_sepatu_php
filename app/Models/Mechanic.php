<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mechanic extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'telp',
        'alamat'
    ];

    public function booking(): HasMany
    {
        return $this->hasMany(Booking::class, 'id_mechanic', 'id_mechanic');
    }
}
