<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name', 'slug', 'body', 'image'
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

    public function departmentUpload()
    {
        return $this->hasMany('App\DepartmentUpload');
    }

     public function program()
    {
        return $this->hasMany('App\Program');
    }
}
