<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;

class APICategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  Upload File with API
    public function upload(Request $request)
    {

        //$result=$request->file('file')->store('apiDocs');// project folder\storage\app\apiDocs
        $result=$request->file->store('apiDocs');
        return ['result'=>$result];
    }
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
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
        $category= new Category();
        $category->name=$request->name;
        $category->save();
        return response()->json($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::find($id);
        if($category){
            return response()->json($category);
        }
        return response()->json('Category not found 404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        if($category){
            return response()->json($category);
        }
        return response()->json('Category not found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    //  update category with api
    public function update(Request $request, $id)
    {
        $category=Category::find($id);
        // return $request;
        if($category){
            $category->name=$request->name;
            $result=$category->update();
            return ['result'=>"category updated successfully"];
        }
        else{
            return ['result'=>'category not updated'];
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        if($category){
            $category->delete();
            return response()->json('Category deleted successfully');
        }
        return response()->json('Category not found');
    }
}
