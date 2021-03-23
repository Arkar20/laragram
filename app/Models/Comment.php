<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ablum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'comment', 'ablum_id'];

    public function ablum()
    {
        return $this->hasOne(Ablum::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
