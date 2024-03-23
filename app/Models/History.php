<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'histories'; // Tên của bảng trong cơ sở dữ liệu

    protected $fillable = [
        'isLiked',
        'likedAt',
        'lastViewedAt',
        'userId',
        'videoId',
    ];
  
    public $hidden = [
        'id', 'userId', 'videoId'
    ];

    // Định nghĩa quan hệ một-nhiều với model User
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    // Định nghĩa quan hệ một-nhiều với model Video
    public function video()
    {
        return $this->belongsTo(Video::class, 'videoId');
    }

    public $timestamps = FALSE;
}
