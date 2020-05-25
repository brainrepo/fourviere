<?php

declare(strict_types=1);

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Traits\UsesJsonResponer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

abstract class ApiCrudController extends Controller
{
    use UsesJsonResponer;

    protected const CREATE_RULES = [];
    protected const UPDATE_RULES = [];
    protected const MODEL = '';
    protected const RESOURCE = '';
    protected const RESOURCE_COLLECTION = '';

    public function index(): JsonResponse
    {
        return (static::RESOURCE_COLLECTION)
            ::make((static::MODEL)::paginate())
            ->response();
    }

    public function store(Request $request): JsonResponse
    {
        $validator = \Validator::make($request->json()->all(), static::CREATE_RULES);
        $entity = (static::MODEL)::create($validator->validate());

        return $this->respondOk(['created' => true]);
    }

    public function show(string $id): JsonResponse
    {
        try {
            $entity = (static::MODEL)::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return $this->respondNotFound('Resource not found');
        }

        return (static::RESOURCE)::make($entity)->response();
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $validator = \Validator::make($request->json()->all(), static::UPDATE_RULES);

        try {
            $entity = (static::MODEL)::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return $this->respondNotFound('Resource not found');
        }

        $entity->update($validator->validate());

        return $this->respondOk(['updated' => true]);
    }

    public function destroy(string $id): JsonResponse
    {
        if (($entity = (static::MODEL)::find($id)) === null) {
            return $this->respondNotFound('Resource not found');
        }

        $entity->delete();

        return $this->respondOk(['deleted' => true]);
    }
}
