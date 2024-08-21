<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_amount',
        'booking_date',
        'payment_status',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Showtime()
    {
        return $this->belongsTo(Showtime::class);
    }

    public function Payments()
    {
        return $this->hasMany(Payment::class);
    }
}
