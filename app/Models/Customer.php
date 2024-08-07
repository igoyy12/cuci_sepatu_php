<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'telp',
    ];

    public function vehicle(): HasMany
    {
        return $this->hasMany(Vehicle::class, 'user_id', 'id_cust');
    }
}
