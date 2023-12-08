<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'department_id',
        'name',
        'slug',
        'pdf',
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

    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
