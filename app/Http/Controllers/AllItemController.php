<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class AllItemController extends Controller
{
    // get api data
    public function index()
    {
       $apiItems = Http::get('http://127.0.0.1:8000/api/item')->json();
       return view('');
    }

    // select items equal category id
    public function getByCategoryId($categoryId)
    {
        $items = Item::where('category_id',$categoryId)->get();
        return response()->json($items);
    }
}
