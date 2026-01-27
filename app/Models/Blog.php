<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'image',
        'title',
        'category',
        'tag',
        'description',
        'author_name',
        'about_author',
    ];
}
