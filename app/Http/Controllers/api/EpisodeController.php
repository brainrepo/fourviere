<?php

declare(strict_types=1);

namespace App\Http\Controllers\api;

use App\Episode;
use App\Http\Resources\Episode as EpisodeResource;
use App\Http\Resources\EpisodeCollection;

final class EpisodeController extends ApiCrudController
{
    protected const MODEL = Episode::class;
    protected const RESOURCE = EpisodeResource::class;
    protected const RESOURCE_COLLECTION = EpisodeCollection::class;

    protected const CREATE_RULES = [
        'title' => 'required|max:255',
        'permalink'=> 'required|max:255',
        'visibility'=> 'required|in:PUBLIC,PRIVATE,LIMITED',
        'description'=> 'required|max:255',
        'explicit'=> 'required|boolean',
        'downloadable'=> 'required|boolean',
        'publish_date'=> 'required|date',
        'show_id' => 'required|exists:shows,id',
    ];

    protected const UPDATE_RULES = [
        'title' => 'max:255',
        'permalink'=> 'max:255',
        'visibility'=> 'boolean',
        'description'=> 'max:255',
        'explicit'=> 'boolean',
        'downloadable'=> 'boolean',
        'publish_date'=> 'date',
        'show_id' => 'exists:show,id',
    ];
}
