<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/** @mixin \Eloquent */
class Show extends Model
{

    protected $fillable = ['title', 'subtitle','summary','language','category','itunes_category','copyright','owner','email','author','explicit'];
    protected $hidden = [];

    protected $casts = [
        'itunes_category' => 'array'
    ];

    public function episodes()
    {
        return $this->hasMany('App\Episode');
    }

}
