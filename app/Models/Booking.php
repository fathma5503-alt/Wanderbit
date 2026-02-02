<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'user_id',
        'package_id',
        'guests',
        'total_price',
        'status',
        'payment_status',
        'check_in_date',
        'check_out_date',
        'special_requests',
    ];

    protected $casts = [
        'check_in_date' => 'datetime',
        'check_out_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public static function generateBookingId()
    {
        do {
            $bookingId = 'BK' . strtoupper(substr(uniqid(), -8));
        } while (self::where('booking_id', $bookingId)->exists());

        return $bookingId;
    }
}