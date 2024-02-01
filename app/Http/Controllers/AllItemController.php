<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class AllItemController extends Controller
{
    public function index()
    {
        $items=Item::all();
        //$categories=Category::all();
        return view('index',compact('items'));
    }

    public function show(Item $item)
    {
        return view('index',compact('item'));
    }
}
