<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class APIItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::find($request->category_id);
        $item = new Item();
        //check update category id  exist or not exist in database
        if($category){
            $categories = Category::all();
            $image = $request->image;
            $newName = "gallery_".uniqid().".".$image->extension();
            $image -> storeAs("public/gallery",$newName);
            $item->name=$request->name;
            $item->price=$request->price;
            $item->category_id=$request->category_id;
            $item->expire_date=$request->expire_date;
            $item->image=$newName;
            $item->save();
            return response()->json(['message'=>$item]);
        }
        return response()->json(['message'=>'Category id='.$request->category_id.' not found in database']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        if($item){
            return response()->json(['message'=>$item]);
        }
        else{
            return response()->json(['message'=>'Item not found in database']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        if($item){
            return response()->json(['message'=>$item]);
        }
        else{
            return response()->json(['message'=>'Item not found in database']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        //check update item id  exist or not exist in database
        if($item){
            $category = Category::find($request->category_id);
            //check update category id  exist or not exist in database
            if($category){
                if($request->has('name')){
                    $item->name = $request->name;
                }
                if($request->has('price')){
                    $item->price = $request->price;
                }
                if($request->has('category_id')){
                    $item->category_id = $request->category_id;
                }
                if($request->has('expire_date')){
                    $item->expire_date = $request->expire_date;
                }
                if($request->has('image')){
                    $image = $request->image;
                    $newName = "gallery_".uniqid().".".$image->extension();
                    $image -> storeAs("public/gallery",$newName);
                    $item->image = $newName;
                }
                $item->update();
                return response()->json(['update sucessfully'=>$item]);

            }
            return response()->json(['message'=>'Update Category id='.$request->category_id.' not found in database']);
        }
        return response()->json(['message'=>'update Item id='.$id.' not found']);
        // if($item){
        //     switch($request){
        //         case($request->has('name')):$item->name = $request->name;break;
        //         case($request->has('price')):$item->price = $request->price;break;
        //         case($request->has('category_id')):$item->category_id = $request->category_id;break;
        //         case($request->has('expire_date')):$item->expire_date = $request->expire_date;break;
        //         case($request->has('image')):
        //             $image = $request->image;
        //             $newName = "apigallery_".uniqid().".".$image->extension();
        //             $image -> storeAs("public/apigallery",$newName);
        //             $item->image = $request->$newName;break;

        //     }
        //     $item->update();
        //     return response()->json(['update sucessfully'=>$item]);
        // }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        if($item){
            $item->delete();
            return response()->json(['message'=>'deleted successfully Item id='.$id]);
        }
        else{
            return response()->json(['message'=>'Item not found in database']);
        }
    }
}
