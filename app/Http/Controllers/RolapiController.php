<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolapiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::all();
        return $roles;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required','permission'=>'required']);
        
        $role =Role::create($request->only('name'));
        $role->syncPermissions($request->input('permission',[]));
        return $role;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role=Role::find('$id');
        return $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request,['name'=>'required','permission'=>'required']);
        
        $role->update($request->only('name'));
        $role->permissions()->sync($request->input('permission',[]));
        return $role;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Role::find($id);
        if(is_null($post)){
            return response()->json('No se pudo eliminar.');

        }
        else
        $post->delete();
        return ['Eliminado'];
    }
}
