<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable =[
        'page_id',
        'title',
        'subtitle',
        'image_path',
        'status',
    ];

    public function page()
{
    return $this->belongsTo(Page::class );
}

}
