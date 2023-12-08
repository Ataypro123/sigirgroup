<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentUpload extends Model
{
    protected $fillable = [
        'uploads',
        'department_id'
    ];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
