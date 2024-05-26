<?php

namespace Tests\Http\Controllers;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CashierControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function test_item_list_status(): void
    {
        $response = $this->get('/cashier');

        $response->assertStatus(200);
    }


    public function test_item_create(): void
    {
        $response = $this->post('/cashier', [
            'name' => 'itemA',
            'price' => '12',
            'completed' => false
        ]);

        $data = json_decode((string) $response->getContent(), true);

        $response->assertStatus(201);
    }

    public function test_item_list(): void
    {
        $response = $this->get('/cashier-list');
        $data = json_decode($response->getContent(), true);

        $this->assertTrue($data != null);
    }
}
