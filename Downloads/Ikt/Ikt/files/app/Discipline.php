<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'term_id',
        'name',
        'slug',
        'code',
        'type',
        't',
        'u',
        'k',
        'ects',
        'file',
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

    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }

    public function term()
    {
        return $this->belongsTo('App\Term');
    }
}
