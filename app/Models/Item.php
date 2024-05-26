<?php

namespace App\Models;

use App\Models\Concerns\ItemTraitAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory, ItemTraitAttributes;

    protected $fillable = ['name', 'price', 'completed'];
}
