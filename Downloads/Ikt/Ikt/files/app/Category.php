<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug'
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

    public function subCategory()
    {
        return $this->hasMany('App\Subcategory');
    }

    public function teamDepartment()
    {
        return $this->hasMany('App\TeamDepartment');
    }

    public function files()
    {
        return $this->hasMany('App\File');
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
