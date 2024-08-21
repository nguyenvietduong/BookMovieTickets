<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, QueryScopes, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'phone',
        'address',
        'birthday',
        'image',
        'email_verification_token',
        'email_verified_at',
    ];

    const TYPE_ADMIN    = "admin";
    const TYPE_MEMBER   = "member";
    public function isAdmin()
    {
        return $this->type === self::TYPE_ADMIN; // Thay 'role' bằng trường thích hợp trong bảng users của bạn
    }

    public function isMember()
    {
        return $this->type === self::TYPE_MEMBER; // Thay 'role' bằng trường thích hợp trong bảng users của bạn
    }

    public function Bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function Reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];
}
