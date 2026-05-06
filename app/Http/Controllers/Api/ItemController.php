<?php

namespace App\Http\Controllers\Api;

use App\Models\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
        $items = Item::all();
        return response()->json([
            'status' => 'success',
            'data' => $items
        ], 200);
    }

    public function store(Request $req) {
        $req->validate([
            'name'=>'required|string',
            'description' => 'required|string',
            'stock'=> 'required|integer'
        ]);

        $item = Item::create([
            'name'=> $req->name,
            'description'=> $req->description,
            'stock'=> $req->stock,
        ]);

        return response()->json([
            'message' => 'Berhasil!',
            'data'=> $item
        ], 201);
    }

    public function update(Request $req, $id) {
        $item = Item::findOrFail($id);

        $item->update([
            'name' => $req->name,
            'description' => $req->description,
            'stock' => $req->stock
        ]);

        return response()->json([
            'message' =>'Updated!', 
            'data' =>$item
        ]);
    }

    public function delete($id) {
        $item = Item::findOrFail($id);
        $item->delete();

        return response()->json([
            'message' => 'deleted!'
        ]);
    }
}
