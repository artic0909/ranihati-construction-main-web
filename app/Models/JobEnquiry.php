<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobEnquiry extends Model
{
    protected $fillable = [
        'job_title',
        'qualification',
        'hs_division',
        'tenth_percentage',
        'hs_percentage',
        'phone',
        'address',
        'cv',
    ];
}
