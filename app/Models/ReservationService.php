<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationService extends Model
{
    use HasFactory;

    protected $table = 'reservation_service';
    
    protected $fillable = [
        'reservation_id',
        'service_id',
        'name',
        'address',
        'age',
        'gender',
        'note',
    ];
}
