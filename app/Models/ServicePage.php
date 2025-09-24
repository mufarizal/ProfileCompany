<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePage extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
        'name',
        'email',
        'message',
        'banner_title',
        'banner_subtitle',
        'banner_image',
    ];
}
