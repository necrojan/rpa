<?php

namespace App\Services;

use App\Models\Item;

interface ItemService
{
    public function list();
    public function create(array $data);
    public function read(Item $item);
    public function update($id, array $data);
}
