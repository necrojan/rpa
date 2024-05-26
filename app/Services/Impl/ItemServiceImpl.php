<?php

namespace App\Services\Impl;

use App\Events\ItemCreated;
use App\Events\ItemUpdated;
use App\Jobs\ProcessItem;
use App\Jobs\UpdateItem;
use App\Models\Item;
use App\Services\ItemService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class ItemServiceImpl implements ItemService
{
    public function list(): Collection
    {
        return Item::all();
    }
    public function create(array $data): Item
    {
        $item = Item::create($data);
        broadcast(new ItemCreated($item))->toOthers();
        ProcessItem::dispatch($item);
        Log::info($item);
        return $item;
    }

    public function read(Item $item): Item
    {
        return $item;
    }

    public function update($id, array $data): bool
    {
        $item = Item::findOrFail($id);

        broadcast(new ItemUpdated($item))->toOthers();
        UpdateItem::dispatch($item);

        return $item->update($data);
    }
}
