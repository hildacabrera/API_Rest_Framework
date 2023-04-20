<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UsuarioController extends Controller
{
    function __construct()
    {
     $this->middleware('permission:ver-usuario|crear-usuario|editar-usuario|borrar-usuario',['only'=>['index']]);
     $this->middleware('permission:crear-usuario',['only'=>['create','store']]);
     $this->middleware('permission:editar-usuario',['only'=>['edit','update']]);
     $this->middleware('permission:borrar-usuario',['only'=>['destroy']]);
 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios=user::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles= Role::pluck('name','name')->all();
        return view('usuarios.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|email',
            'password'=>'same:confirm-password',
            'roles'=>'required'
        ]);
        $input=$request->all();
        $input['password']=Hash::make($input['password']);
        $user=user::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=user::find($id);
        $roles= Role::pluck('name','name')->all();
        $userRole=$user->roles->pluck('name','name')->all();
        return view('usuarios.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|email',
            'password'=>'same:confirm-password',
            'roles'=>'required'
        ]);
        $input=$request->all();
        if (!empty($input['password']))
        {
            $input['password']=Hash::make($input['password']);
        }
        else{
            $input['password']=Arr::except($input, array('password'));
        }
        $user=user::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('usuarios.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return Redirect()->route('usuarios.index');
    }
}
