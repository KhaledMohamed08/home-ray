<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'total_price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'reservation_service', 'reservation_id')
                    ->withPivot('name', 'address', 'age', 'gender', 'note')
                    ->withTimestamps();
    }

    public function totalPrice()
    {
        $services = $this->services;
        $totalPrice = 0;
        foreach ($services as $service) {
            $totalPrice += $service->price;
        }

        return $totalPrice;
    }
}
