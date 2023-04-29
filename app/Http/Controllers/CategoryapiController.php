<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryapiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post=Category::all();
        return $post;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate (['name'=>'required|min:3|max:100', 
            'description'=> 'required|min:2' 
             ]);
    

         $category= new Category();
         $category->name=$request->input('name');
         $category-> description=$request->input('description');
         //$post-> category_id=$request->input('category');
         $category->save();
         return $category;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Category::find('$id');
        return $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['name'=>'required |min:3| max:100', 
        'description'=> 'required|min:2'  
         ] );
       

        $category = Category::find($id);
         $category->name=$request->input('name');
         $category-> description=$request->input('description');
       //  $post-> category_id=$request->input('category');
         $category->save();
         return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Category::find($id);
        if(is_null($post)){
            return response()->json('No se pudo eliminar.');

        }
        else
        $post->delete();
        return ['Eliminado'];
    }
}
