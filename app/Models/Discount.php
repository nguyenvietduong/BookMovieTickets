<?php

namespace App\Models;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory, QueryScopes, SoftDeletes;

    protected $fillable = [
        'id',
        'code',
        'amount',
        'valid_from',
        'valid_to',
        'max_uses',
        'used_count',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'discount_movie');
    }
}
