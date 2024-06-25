<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'brand_id',
        'overview',
        'perDay',
        'fuel',
        'modelyear',
        'seatingCapacity',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'AirConditioner',
        'PowerDoorLocks',
        'AntiLockBrakingSystem',
        'BrakeAssist',
        'PowerSteering',
        'DriverAirbag',
        'PassengerAirbag',
        'PowerWindows',
        'CDPlayer',
        'CentralLocking',
        'CrashSensor',
        'LeatherSeats',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

}
