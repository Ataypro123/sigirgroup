<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentContent extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'status',
        'course',
        'image',
        'role',
        'student_id',
        'body',
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

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
