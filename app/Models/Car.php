<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;

    protected $fillable = [
        'model',
        'make',
        'price_per_day',
        'transmission',
        'seats',
        'fuel', // 'petrol', 'diesel'
        'is_featured',
        'status', // 'available', 'rented', 'maintenance'
    ];

    public function images()
    {
        return $this->hasMany(CarImage::class);
    }

    public function primaryImage()
    {
        return $this->hasOne(CarImage::class)->where('is_primary', true);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
