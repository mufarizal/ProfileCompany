<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'landing_pages_id',
        'title',
        'description',
        'image',
    ];

    public function landingPage()
    {
        return $this->belongsTo(LandingPage::class);
    }
}
