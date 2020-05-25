<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{

    protected $fillable = ['title', 'permalink', 'visibility', 'description', 'explicit', 'downloadable', 'publish_date'];
    protected $hidden = [];
    protected $casts = [];

    public function user()
    {
        return $this->belongsTo('App\Show');
    }

}
