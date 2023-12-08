<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'body', 'image'
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function files()
    {
        return $this->hasMany('App\File');
    }

    public function teamDepartment()
    {
        return $this->hasMany('App\TeamDepartment');
    }

    public function terms()
    {
        return $this->hasMany('App\Term');
    }
    public function disciplines()
    {
        return $this->hasMany('App\Discipline');
    }
}
