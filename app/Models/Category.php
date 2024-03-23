<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'code', 'name', 'createdAt'
    ];

    protected $table = 'categories';

    public function videos()
    {
        return $this->hasMany(Video::class, 'categoryId');
    }
}
