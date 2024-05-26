<?php

namespace Tests\Services\Impl;

use App\Models\Item;
use App\Services\Impl\ItemServiceImpl;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ItemServiceImplTest extends TestCase
{
    use DatabaseMigrations;

    public function test_item_mock_list(): void
    {
        $itemServiceMock = \Mockery::mock(ItemServiceImpl::class);

        $collection = new Collection([
            'name' => 'itemA',
            'price' => '12',
            'completed' => false
        ]);
        $itemServiceMock->shouldReceive('list')
            ->once()
            ->andReturn($collection);

        $service = $this->bindedService($itemServiceMock);
        $data = $service->list();

        $this->assertNotEmpty($data);
    }

    public function test_item_mock(): void
    {
        $itemServiceMock = \Mockery::mock(ItemServiceImpl::class);
        $item = Item::factory()->create();
        $itemServiceMock->shouldReceive('read')
            ->with($item)
            ->once()
            ->andReturn($item);

        $service = $this->bindedService($itemServiceMock);
        $data = $service->read($item);

        $this->assertEquals($data, $item);
    }

    public function test_item_mock_update(): void
    {
        $itemServiceMock = \Mockery::mock(ItemServiceImpl::class);
        $itemA = Item::factory()->create([
            'name' => 'itemA',
            'price' => '12',
            'completed' => false
        ]);

        $updatedValue = [
            'completed' => true
        ];
        $itemServiceMock->shouldReceive('update')
            ->with($itemA, [
                'completed' => true
            ])
            ->once()
            ->andReturn(true);

        $service = $this->bindedService($itemServiceMock);
        $data = $service->update($itemA, $updatedValue);

        $this->assertTrue($data == true);
    }

    public function test_item_mock_create(): void
    {
        $itemServiceMock = \Mockery::mock(ItemServiceImpl::class);
        $item = [
            'name' => 'itemA',
            'price' => '12',
            'completed' => false
        ];
        $itemServiceMock->shouldReceive('create')
            ->with($item)
            ->once()
            ->andReturn(Item::create($item));

        $service = $this->bindedService($itemServiceMock);
        $data = $service->create($item);

        $this->assertNotNull($data);
    }

    private function bindedService($itemServiceMock): mixed
    {
        $this->app->instance(ItemServiceImpl::class, $itemServiceMock);
        return $this->app->make(ItemServiceImpl::class);
    }
}
