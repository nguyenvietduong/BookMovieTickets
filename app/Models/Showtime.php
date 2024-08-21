<?php

namespace App\Models;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Showtime extends Model
{
    use HasFactory, QueryScopes, SoftDeletes;

    protected $fillable = [
        'id',
        'movie_id',
        'screen_id',
        'start_timestamp',
        'end_time',
        'price',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function screen()
    {
        return $this->belongsTo(Screen::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
