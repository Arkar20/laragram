<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\React;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ablum extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image', 'user_id', 'category_id'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function photos()
    {
        return $this->hasMany(Image::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function reacts()
    {
        return $this->hasMany(React::class);
    }
}
