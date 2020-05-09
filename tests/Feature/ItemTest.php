<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAllItems()
    {
        $response = $this->get('/api/item/all');

        $response->assertJson(['success'=>true]);
    }

    public function testGetItem()
    {
        $response = $this->get('/api/item/1');

        $response->assertJson(['success'=>true]);
    }
}
