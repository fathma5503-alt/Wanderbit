<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'cover_image',
        'slug',
        'status',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];
}
