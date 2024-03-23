<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'actor', 'description', 'director', 'href', 'isActive', 'poster', 'price', 'share', 'title', 'view', 'categoryId'
    ];

    protected $table = 'videos';

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt'; 
    public $timestamps = true;

    public function category(){
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'videoId');
    }

    public function histories(){
        return $this->hasMany(History::class, 'videoId')->where('isLiked', true);
    }
}
