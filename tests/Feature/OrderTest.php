<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMakeOrder()
    {
        $response = $this->json('POST','/api/order/store', [
            'name' => 'Test Name',
            'address' => 'Berlin',
            'phone_number' => '+1 123456789',
            'currency' => 1,
            'items'=>[
                ['id'=>1, 'quantity'=>2],
                ['id'=>2, 'quantity'=>1],
            ]
        ]);

        $response->assertJson([
            'success' => true
        ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMakeOrderNoPhoneError()
    {
        $response = $this->json('POST','/api/order/store', [
            'name' => 'Test Name',
            'address' => 'Berlin',
            'items'=>[
                ['id'=>1, 'quantity'=>2],
                ['id'=>2, 'quantity'=>1],
            ]
        ]);
        
        $response->assertJson([
            'success' => false
        ]);
    }

    public function testMakeOrderNoNameError()
    {
        $response = $this->json('POST','/api/order/store', [
            'address' => 'Berlin',
            'phone_number' => '+1 123456789',
            'items'=>[
                ['id'=>1, 'quantity'=>2],
                ['id'=>2, 'quantity'=>1],
            ]
        ]);
        
        $response->assertJson([
            'success' => false
        ]);
    }

    public function testMakeOrderNoAddressError()
    {
        $response = $this->json('POST','/api/order/store', [
            'name' => 'Test Name',
            'phone_number' => '+1 123456789',
            'items'=>[
                ['id'=>1, 'quantity'=>2],
                ['id'=>2, 'quantity'=>1],
            ]
        ]);

        $response->assertJson([
            'success' => false
        ]);
    }

    public function testMakeOrderNoItemsError()
    {
        $response = $this->json('POST','/api/order/store', [
            'name' => 'Test Name',
            'address' => 'Berlin',
            'phone_number' => '+1 123456789',
        ]);

        $response->assertJson([
            'success' => false
        ]);
    }

    public function testGetAllOrders()
    {
        $login = $this->json('POST','/api/auth/login',[
            'email' => "test@testmail.com",
            'password' => "123456",
        ]);

        $token = $login->original['token_type']." ".$login->original['access_token'];
        $response = $this->withHeaders(['Authorization'=>$token])->json('GET','/api/order/all');

        $response->assertStatus(200);
    }
}
