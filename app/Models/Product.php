<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'landing_pages_id',
        'name',
        'description',
        'image',
    ];

    public function landingPage()
    {
        return $this->belongsTo(LandingPage::class);
    }
}
