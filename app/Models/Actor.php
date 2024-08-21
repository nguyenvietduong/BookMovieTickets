<?php

namespace App\Models;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actor extends Model
{
    use HasFactory, QueryScopes, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'image',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_actor');
    }
}
