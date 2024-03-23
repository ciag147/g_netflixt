<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'videoId', 'userId', 'content'
    ];

    protected $hidden = [
        'videoId', 'userId', 'id'
    ];

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt'; 

    public function createdBy(){
        return $this->belongsTo('App\User', 'userId');
    }
}
