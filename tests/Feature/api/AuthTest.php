<?php

namespace Tests\Feature\api;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class AuthTest extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    public function testToken()
    {
        $pw = \Hash::make('password');
        $user = factory(User::class, ['password', $pw])->create();
        $user->save();

        $response = $this->json('post', 'api/auth/token', [
            'email' => $user->email,
            'password' => 'password',
            'device_name' => 'test client',
        ]);

        $response->assertStatus(200);
    }

    public function testTokenWithWrongPassword()
    {
        $pw = \Hash::make('password');
        $user = factory(User::class, ['password', $pw])->create();
        $user->save();

        $response = $this->json('post', 'api/auth/token', [
            'email' => $user->email,
            'password' => 'wrong password',
            'device_name' => 'test client',
        ]);

        $response->assertStatus(422);
    }
}
