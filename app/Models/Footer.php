<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = [
        'company_name',
        'address',
        'phone',
        'email',
        'instagram'
    ];
}
