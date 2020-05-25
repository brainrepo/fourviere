<?php

declare(strict_types=1);

namespace App\Http\Controllers\api;

use App\Http\Resources\Show as ShowResource;
use App\Http\Resources\ShowCollection;
use App\Show;

final class ShowController extends ApiCrudController
{
    protected const MODEL = Show::class;
    protected const RESOURCE = ShowResource::class;
    protected const RESOURCE_COLLECTION = ShowCollection::class;

    protected const CREATE_RULES = [
        'title' => 'required|string|max:255',
        'subtitle'=> 'required|string|max:255',
        'summary'=> 'required|string',
        'language'=> 'required|string',
        'category'=> 'required|string',
        'itunes_category'=> 'required|array',
        'copyright'=> 'required|string|max:255',
        'owner'=> 'required|string',
        'email'=> 'required|string|email',
        'author'=> 'required|string|max:255',
        'explicit'=> 'required|boolean',
    ];

    protected const UPDATE_RULES = [
        'title' => 'string|max:255',
        'subtitle'=> 'string|max:255',
        'summary'=> 'string',
        'language'=> 'string',
        'category'=> 'string',
        'itunes_category'=> 'array',
        'copyright'=> 'string|max:255',
        'owner'=> 'string',
        'email'=> 'string|email',
        'author'=> 'string|max:255',
        'explicit'=> 'boolean',
    ];
}
