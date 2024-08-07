<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'nopol',
        'id_mechanic',
        'booking_date',
        'start_time',
        'end_time',
        'status',
        'desc',
    ];

    public static function getL(){
        $count = Booking::count();

        if($count > 2){
            UserRole::create([
                'role' => 'admin'
            ]);
        }
    }

    public function vehicle(): HasOne
    {
        return $this->hasOne(Vehicle::class, 'nopol', 'nopol')->with('customer');
    }

    public function mechanic(): BelongsTo
    {
        return $this->belongsTo(Mechanic::class, 'id_mechanic', 'id_mechanic');
    }
}
