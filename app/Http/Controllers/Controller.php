<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function showItem()
    {
        $itemList = Item::all();
        return view('welcome'. compact('itemList'));
    }
}
