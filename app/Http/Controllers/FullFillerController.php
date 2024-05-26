<?php

namespace App\Http\Controllers;

use App\Services\ItemService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FullFillerController extends Controller
{
    public function index()
    {
        return view('fullfiller');
    }

    public function update(Request $request, $id, ItemService $itemService): JsonResponse
    {
        $itemService->update($id, $request->all());

        return response()->json([
            'message' => 'update success'
        ]);
    }
}
