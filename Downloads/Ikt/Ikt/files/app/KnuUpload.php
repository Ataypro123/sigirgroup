<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KnuUpload extends Model
{
    protected $fillable = [
        'uploads',
        'blog_id'
    ];

    public function blog()
    {
        return $this->belongsTo('App\Blog');
    }
}
