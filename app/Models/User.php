<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cover_file_name',
        'original_cover_file_name'
    ];

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
    ];

    public function follows()
    {
        return $this->belongsToMany('App\Models\user','follows','follower_id','following_id');
    }
    public function follow_me()
    {
        return $this->belongsToMany('App\Models\user','follows','following_id','follower_id');
    }

    public function req()
    {
        return $this->belongsToMany('App\Models\book','borrows','user_id','book_id')->withpivot('user_borrowed_at','user_refunds_at','answer','id');
    }
}
