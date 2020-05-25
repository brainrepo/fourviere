<?php

namespace App\Http\Requests\api;

use App\Show;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShowRequest extends Request
{

    private static $model = Show::class;

    private array $createRules = [
            'title' => 'required|max:255',
            'subtitle'=> 'required|max:255',
            'summary'=> 'required',
            'language'=> 'required',
            'category'=> 'required',
            'itunes_category'=> 'required|array',
            'copyright'=> 'required|max:255',
            'owner'=> 'required',
            'email'=> 'required|email',
            'author'=> 'required|max:255',
            'explicit'=> 'required|boolean'
        ];


    private array $updateRules = [
            'title' => 'max:255',
            'subtitle'=> 'max:255',
            'summary'=> '',
            'language'=> '',
            'category'=> '',
            'itunes_category'=> 'array',
            'copyright'=> 'max:255',
            'owner'=> '',
            'email'=> 'email',
            'author'=> 'max:255',
            'explicit'=> 'boolean'
        ];


    private function checkData(array $rules, callable $success, callable $fail): JsonResponse
    {
        $validator = \Validator::make($this->json()->all(), $rules);

        if ($validator->fails()) {
            return $fail($validator);
        }

        return $success($validator->validated());
    }

    private function checkDataForCreate(callable $success, callable $fail): JsonResponse
    {
        return $this->checkData($this->createRules, $success, $fail);
    }

    private function checkDataForUpdate(callable $success, callable $fail): JsonResponse
    {
        return $this->checkData($this->createRules, $success, $fail);
    }

}
