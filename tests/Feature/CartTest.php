<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAddItemToCart()
    {
        $login = $this->json('POST','/api/auth/login',[
            'email' => "test@testmail.com",
            'password' => "123456",
        ]);

        $token = $login->original['token_type']." ".$login->original['access_token'];
        $response = $this->withHeaders(['Authorization'=>$token])->json('POST','/api/cart/store',[
            'items'=>[
                ['id'=>3, 'quantity'=>1]
            ]
        ]);

        $response->assertJson(['success'=>true]);
    }

    public function testRemoveItemFromCart()
    {
        $login = $this->json('POST','/api/auth/login',[
            'email' => "test@testmail.com",
            'password' => "123456",
        ]);

        $token = $login->original['token_type']." ".$login->original['access_token'];
        $this->withHeaders(['Authorization'=>$token])->json('POST','/api/cart/store',[
            'items'=>[
                ['id'=>3, 'quantity'=>1]
            ]
        ]);

        $response = $this->withHeaders(['Authorization'=>$token])->json('DELETE','/api/cart/remove_item/3',[]);

        $response->assertJson(['success'=>true]);
    }
}
