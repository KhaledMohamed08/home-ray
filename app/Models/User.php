<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        // 'mid_name',
        'last_name',
        'phone',
        'address',
        'email',
        'password',
        'gender',
        'age',
        'role',
        // 'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function scopePatient($query)
    {
        return $query->where('role', 'paitent');
    }

    public function scopeDoctor($query)
    {
        return $query->where('role', 'doctor');
    }

    public function reservations ()
    {
        return $this->hasMany(Reservation::class);
    }

    public function nursingServices()
    {
        $nursingServices = [];
        foreach ($this->reservations as $reservation) {
            foreach ($reservation->services as $service) {
                if ($service->category->name === 'nursing') {
                    array_push($nursingServices, $service);
                }
            }
        }

        return $nursingServices;
    }

    public function radiologyServices()
    {
        $nursingServices = [];
        foreach ($this->reservations as $reservation) {
            foreach ($reservation->services as $service) {
                if ($service->category->name === 'radiology') {
                    array_push($nursingServices, $service);
                }
            }
        }

        return $nursingServices;
    }

    public function analysisServices()
    {
        $nursingServices = [];
        foreach ($this->reservations as $reservation) {
            foreach ($reservation->services as $service) {
                if ($service->category->name === 'analysis') {
                    array_push($nursingServices, $service);
                }
            }
        }

        return $nursingServices;
    }
}
