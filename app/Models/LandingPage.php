<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    protected $fillable = [
        'about_title',
        'about_description',
        'about_image',
        'visi',
        'misi',
        'banner_image',
        'banner_title',
        'banner_subtitle',
    ];

    
    public function partners()
    {
        return $this->hasMany(Partner::class);
    }


}
