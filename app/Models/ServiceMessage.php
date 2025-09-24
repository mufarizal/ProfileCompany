<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceMessage extends Model
{
    protected $fillable = [
        'name',
        'email',
        'message'
    ];
}
