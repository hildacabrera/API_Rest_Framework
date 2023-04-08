<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()  
    
    

     {
        $post=Category::all();
        return view('dashboard.category.index',['category'=>$post]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=Category::all();
        return view('dashboard.category.create',['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(request $request)
     {
         $request->validate (['name'=>'required|min:3|max:100', 
            'description'=> 'required|min:2' 
             ]);
    

         $category= new Category();
         $category->name=$request->input('name');
         $category-> description=$request->input('description');
         //$post-> category_id=$request->input('category');
         $category->save();
         return view("dashboard.category.message",['msg'=>"publicacion creada con exito"] );
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)

    {$post=Category::find($id);
         return view("dashboard.category.edit",['post'=>$post, 'category'=>category::all()] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $request->validate(['name'=>'required |min:3| max:100', 
        'description'=> 'required|min:2'  
         ] );
       

        $category = Category::find($id);
         $category->name=$request->input('name');
         $category-> description=$request->input('description');
       //  $post-> category_id=$request->input('category');
         $category->save();
         return view("dashboard.category.message",['msg'=>"modificacion guardada con exito"] );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post=Category::find($id);
        $post->delete();
        return redirect ("dashboard/category");
    }
}