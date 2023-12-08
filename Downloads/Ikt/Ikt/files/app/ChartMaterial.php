<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChartMaterial extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'chart_content_id',
        'body',
        'pdf',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function chartContent()
    {
        return $this->belongsTo('App\ChartContent');
    }
}
