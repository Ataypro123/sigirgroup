<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoSubcategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'body',
        'photo_category_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function photoCategory()
    {
        return $this->belongsTo('App\PhotoCategory');
    }

    public function photo()
    {
        return $this->hasMany('App\Photo');
    }
}
