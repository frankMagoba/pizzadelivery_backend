<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\User;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $password = Str::random(10);
        $email = Str::random(10).'@gmail.com';
        $response = $this->json('POST','/api/auth/register',[
            'name' => Str::random(10),
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $response->assertJson(['success'=>true]);
    }

    public function testLogin()
    {

        $response = $this->json('POST','/api/auth/login',[
            'email' => "test@testmail.com",
            'password' => "123456",
        ]);

        $response->assertJson(['success'=>true]);
    }
}
