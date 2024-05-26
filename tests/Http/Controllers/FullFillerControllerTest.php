<?php

namespace Tests\Http\Controllers;

use App\Models\Item;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Str;
use Tests\TestCase;

class FullFillerControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function test_fulfiller_list_status(): void
    {
        $response = $this->get('/fullfiller');

        $response->assertStatus(200);
    }

    public function test_fullfiller_item_update(): void
    {
        $item = Item::factory()->create();
        $response = $this->put('/fullfiller/' . $item->id , [
            'completed' => true
        ]);

        $response->assertStatus(200);
        $this->assertTrue(Str::contains($response->getContent(), 'success'));
    }
}
