<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'image',
        'phone',
        'email',
        'description_one',
        'description_two',
    ];
}
