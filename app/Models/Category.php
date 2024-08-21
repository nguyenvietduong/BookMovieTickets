<?php

namespace App\Models;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, QueryScopes, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'slug',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
