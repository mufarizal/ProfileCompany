<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortofolioPage extends Model
{
    protected $fillable = [
        'banner_title',
        'banner_subtitle',
        'banner_image',
    ];

    public function projects()
    {
        return $this->hasMany(PortofolioProject::class);
    }
}
