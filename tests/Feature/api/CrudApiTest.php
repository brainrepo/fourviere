<?php

namespace Tests\Feature\api;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Sanctum\Sanctum;
use Tests\CreatesApplication;

abstract class CrudApiTest extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();

        Sanctum::actingAs(
            factory(User::class)->create(),
            ['*']
        );
    }

    protected function index(string $path, string $modelClass)
    {
        $response = $this->get($path);

        $response->assertStatus(200);
        $response->assertJsonPath('data', []);

        $data = factory($modelClass)->make();
        $data->save();

        $response = $this->get($path);

        $response->assertStatus(200);
        $response->assertJsonPath('data.0.id', $data->id);
    }

    protected function storeWithValidData(string $path, string $modelClass, string $table)
    {
        $entity = factory($modelClass)->make();
        $response = $this->json('post', $path, $entity->toArray());

        $response->assertStatus(200);
        $this->assertDatabaseCount($table, 1);
    }

    public function storeWithInvalidData(string $path, string $modelClass, string $fieldToUnset)
    {
        $entity = factory($modelClass)->make([
            $fieldToUnset => null,
        ]);
        $response = $this->json('post', $path, $entity->toArray());

        $response->assertStatus(422);
    }

    public function show(string $path, string $modelClass)
    {
        $response = $this->get("$path/100");
        $response->assertStatus(404);

        $entity = factory($modelClass)->make();
        $entity->save();

        $response1 = $this->get("$path/{$entity->id}");
        $response1->assertStatus(200);
        $response1->assertExactJson(['data' => $entity->toArray()]);
    }

    public function updateWithValidData(string $path, string $modelClass, string $table, string $fieldToUpdate, string $updatedValue)
    {
        $entity = factory($modelClass)->make();
        $entity->save();

        $response = $this->json('put', "$path/{$entity->id}", [$fieldToUpdate => $updatedValue]);

        $response->assertStatus(200);
        $this->assertDatabaseHas($table, [$fieldToUpdate => $updatedValue]);
    }

    public function updateWithInvalidData(string $path, string $modelClass, string $table, string $fieldToUpdate, string $updatedValue)
    {
        $entity = factory($modelClass)->make();
        $entity->save();

        $response = $this->json('put', "$path/{$entity->id}", [$fieldToUpdate => $updatedValue]);

        $response->assertStatus(422);
        $this->assertDatabaseHas($table, [$fieldToUpdate => $entity->$fieldToUpdate]);
    }

    public function deleteData(string $path, string $modelClass, string $table)
    {
        $entity = factory($modelClass)->make();
        $entity->save();
        $response = $this->delete("$path/{$entity->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing($table, ['id' => $entity->id]);
    }
}
