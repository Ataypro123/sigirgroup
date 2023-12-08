<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChartContent extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'chart_id',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function chart()
    {
        return $this->belongsTo('App\Chart');
    }

    public function chartMaterial()
    {
        return $this->hasMany('App\ChartMaterial');
    }
}
