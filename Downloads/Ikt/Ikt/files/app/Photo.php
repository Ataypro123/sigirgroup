<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'uploads',
        'photo_subcategory_id'
    ];

    public function photoSubcategory()
    {
        return $this->belongsTo('App\PhotoSubcategory');
    }
}
