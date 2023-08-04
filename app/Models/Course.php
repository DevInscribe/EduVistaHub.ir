<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title', 'type', 'slug', 'body', 'price','tags','images','videos','time','view_count', 'comment_count'];

    protected $casts = [
        'images' => 'array'
    ];
}
