<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ablum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class React extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'ablum_id', 'react'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ablum()
    {
        return $this->belongsTo(Ablum::class);
    }
}
