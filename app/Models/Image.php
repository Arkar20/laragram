<?php

namespace App\Models;

use App\Models\Ablum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'ablum_id'];

    public function ablum()
    {
        return $this->belongsTo(Ablum::class);
    }
}
