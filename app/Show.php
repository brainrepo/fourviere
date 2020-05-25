<?php

declare(strict_types=1);

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Show extends Model
{
    use UsesUuid;

    protected $fillable = ['title', 'subtitle', 'summary', 'language', 'category', 'itunes_category', 'copyright', 'owner', 'email', 'author', 'explicit'];
    protected $hidden = [];

    protected $casts = [
        'itunes_category' => 'array',
        'explicit' => 'boolean',
    ];

    public function episodes(): HasMany
    {
        return $this->hasMany('App\Episode');
    }
}
