<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];


    public function scopeGetCategory($query,$category)
    {
        $query->where('category',$category);
    }
}



