<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'server_name',
        'name',
        'slug',
        'filename',        
        'link_embed',
        'link_m3u8',
    ];

    public function movies()
    {
        return $this->belongsTo(Movie::class);
    }
}
