<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function userPage()
    {
        $itemList = Item::all();
        return view('user', compact('itemList'));
    }

    public function adminPage()
    {
        $itemList = Item::all();
        return view('admin', compact('itemList'));
    }

    public function showCreate()
    {
        return view('create');
    }

    public function create(Request $req)
    {
        $req->validate([
            'name' => 'required|min:3|string',
            'description' => 'required|min:3|string',
            'stock' => 'required|min:0|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'dokumen' => 'nullable|mimes:pdf`'
        ]);

        $filename = null;
        if ($req->hasFile("image")) {
            $now = now()->format("Y-m-d_H.i.s");
            $filename = $now . "_" . $req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs('images', $filename, "public");
        }

        Item::create([
            'name' => $req->name,
            'description' => $req->description,
            'stock' => $req->stock,
            'image' => $filename
        ]);

        return redirect()->route('admin.page');
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'name' => 'required|min:3|string',
            "description" => 'required|min:3|string',
            'stock' => 'required|min:0|integer'
        ]);

        $item = Item::findOrFail($id);
        $item->name = $req->name;
        $item->description = $req->description;
        $item->stock = $req->stock;

        $item->save();

        return redirect()->route('admin.page');
    }

    public function showUpdate($id)
    {
        $item = Item::findOrFail($id);
        return view('update', compact('item'));
    }

    public function delete($id)
    {
        $item = Item::findOrFail($id);
        if ($item->image) {
            Storage::disk('public')->delete('images/' . $item->image);
        }
        $item->delete();

        return redirect()->route('admin.page');
    }
}
