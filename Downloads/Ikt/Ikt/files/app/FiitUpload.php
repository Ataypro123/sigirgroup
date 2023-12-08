<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FiitUpload extends Model
{
    protected $fillable = [
        'uploads',
        'fiit_blog_id'
    ];

    public function fiitBlog()
    {
        return $this->belongsTo('App\FiitBlog');
    }
}
