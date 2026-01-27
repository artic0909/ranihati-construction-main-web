<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fact extends Model
{
    protected $fillable = [
        'no_of_experts',
        'no_of_clients',
        'no_of_completed_projects',
        'no_of_running_projects',
    ];
}
