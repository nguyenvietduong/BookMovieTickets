<?php

namespace App\Models;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seat extends Model
{
    use HasFactory, QueryScopes, SoftDeletes;

    protected $fillable = [
        'seat_number',
        'seat_type',
        'screen_id'
    ];

    public function screen()
    {
        return $this->belongsTo(Screen::class);
    }
}
