<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

use function PHPUnit\Framework\returnSelf;

class PostapiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post=Post::all();
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


     $post= new Post();
     $post->name=$request->input('name');
     $post-> description=$request->input('description');
     $post-> category_id=$request->input('category');
     $post->save();
     return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::find('$id');
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
       

        $post = Post::find($id);
         $post->name=$request->input('name');
         $post-> description=$request->input('description');
         $post-> category_id=$request->input('category');
         $post->save();
         return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::find($id);
        if(is_null($post)){
            return response()->json('No se pudo eliminar.');

        }
        else
        $post->delete();
        return ['Eliminado'];
    }
}
