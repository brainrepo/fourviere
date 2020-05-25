<?php

declare(strict_types=1);

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episode extends Model
{
    use UsesUuid;

    protected $fillable = ['title', 'permalink', 'visibility', 'description', 'explicit', 'downloadable', 'publish_date', 'show_id'];
    protected $hidden = [];
    protected $casts = [
        'explicit' => 'boolean',
        'downloadable' => 'boolean',
        'publish_date' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Show');
    }
}
