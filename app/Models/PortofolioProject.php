<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortofolioProject extends Model
{
    protected $fillable = [
        'portofolio_page_id',
        'title',
        'description',
        'image',
    ];

    public function page()
    {
        return $this->belongsTo(PortofolioPage::class);
    }
}
