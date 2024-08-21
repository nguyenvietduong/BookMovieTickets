<?php

namespace App\Models;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory, QueryScopes, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'origin_name',
        'content',
        'type',
        'status',
        'director',
        'poster_url',
        'thumb_url',
        'album_url',
        'is_copyright',
        'sub_docquyen',
        'chieurap',
        'trailer_url',
        'time',
        'episode_current',
        'episode_total',
        'quality',
        'lang',
        'year',
        'view',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'movie_category', 'movie_id', 'category_id')->withTrashed();
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class, 'movie_country', 'movie_id', 'country_id')->withTrashed();
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'movie_actor', 'movie_id', 'actor_id')->withTrashed();
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class, 'discount_movie');
    }

    protected $casts = [
        'album_url' => 'array',
    ];
}
