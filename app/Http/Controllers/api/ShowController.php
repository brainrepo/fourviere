<?php
declare(strict_types = 1);

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Show;
use App\Traits\JsonRespondController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator as ValidatorO;
use Illuminate\Http\JsonResponse;

class ShowController extends Controller
{

    use JsonRespondController;

    public function index(): JsonResponse
    {
        return $this->respond(Show::all());
    }

    public function store(Request $request): JsonResponse
    {
        $validator = $this->getStoreValidator($request);

        if ($validator->fails()) {
            return $this->respondValidatorFailed($validator);
        }

        $show = Show::create($validator->validated());
        return $this->respond(["id" => $show]);
    }

    public function show(int $id): JsonResponse
    {
        try{
            return $this->respond(Show::findOrFail($id)->toArray());
        }catch (ModelNotFoundException $e) {
            return $this->respondNotFound("Show not found");
        }
    }

    public function update(Request $request, int $id): JsonResponse
    {

        $validator = $this->getUpdateValidator($request);

        if ($show = Show::find($id) === null) {
            return $this->respondNotFound("Show not found");
        }

        if ($validator->fails()) {
            return $this->respondValidatorFailed($validator);
        }

        try{
            $show->update($validator->validated());
            return $this->respond($show->toArray());
        } catch (\Exception $e) {
            return $this->respondError(500, "Saving Error");
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try{
            $show = Show::findOrFail($id);
            $show->delete();

            return $this->respond(["deleted" => true]);
        }catch (ModelNotFoundException $e) {
            return $this->respondNotFound("Show not found");
        }catch (\Exception $e) {
            return $this->respondError(500, "Saving Error");
        }
    }

    private function getStoreValidator(Request $request): ValidatorO
    {
        return \Validator::make($request->json()->all(), [
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
            'explicit'=> 'required|boolean']);
    }

    private function getUpdateValidator(Request $request): ValidatorO
    {
        return \Validator::make($request->json()->all(), [
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
            'explicit'=> 'boolean']);
    }
}
