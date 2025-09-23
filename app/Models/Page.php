<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'title',
    ];

    public function banner()
    {
        return $this->hasMany(Banner::class);
    }
}
