<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobEnquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'job_title',
        'qualification',
        'hs_division',
        'tenth_percentage',
        'hs_percentage',
        'address',
        'cv',
    ];
}
