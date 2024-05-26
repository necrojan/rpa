<?php

namespace App\Http\Controllers;

use App\Services\ItemService;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    public function index()
    {
        return view('cashier');
    }

    public function store(Request $request, ItemService $itemService)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'completed' => 'nullable'
        ]);

        return $itemService->create($validated);
    }

    public function list(ItemService $service)
    {
        return response()->json([
            'items' => $service->list()
        ]);
    }
}
