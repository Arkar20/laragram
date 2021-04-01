<?php

namespace App\Models;

use App\Models\Ablum;
use App\Models\Follower;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'avatar'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ablums()
    {
        return $this->hasMany(Ablum::class);
    }
    public function following()
    {
        return $this->hasMany(User::class, 'follwering_id', 'id');
    }

    public function follow($userid)
    {
        return Follower::create([
            'follower_id' => $this->id,
            'following_id' => $userid,
        ]);
    }
    public function isFollow($userId)
    {
        return DB::table('followers')
            ->where('follower_id', $this->id)
            ->where('following_id', $userId)
            ->exists();
    }
    public function unfollow($userId)
    {
        return DB::table('followers')
            ->where('follower_id', $this->id)
            ->where('following_id', $userId)
            ->delete();
    }
    public function getFollowingUsers()
    {
        return DB::table('followers')
            ->where('follower_id', $this->id)
            ->get();

        // return $this->hasManyThrough(Follower::class, User::class,'');
    }
    public function myFollowers()
    {
        return DB::table('followers')
            ->where('following_id', $this->id)
            ->get();
    }
    public function images()
    {
        return $this->hasManyThrough(Image::class, Ablum::class);
    }
}
