<?php

namespace App\Http\Controllers;

use App\Proceso;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','rols:Administrador']);
    }


    public function index()
    {
        $users=User::all();
        $procesos=Proceso::all();
        return view('users.index',compact('users','procesos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $data=request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'rol_id'=>['numeric','required'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        DB::table('users')->insert([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'rol_id'=>$data['rol_id'],
            'password'=>Hash::make($data['password']),
        ]);

        return redirect()
        ->route('user.index')
        ->withSuccess("El nuevo usuario fue creado correctamente");

    }

    public function asociar(Request $request)
    {
        $data=request()->validate([
            'user_id' => ['required', 'numeric'],
            'proceso_id' => ['required', 'numeric'],
        ]);
        DB::table('proceso_user')->insert([
            'user_id'=>$data['user_id'],
            'proceso_id'=>$data['proceso_id'],
        ]);

        return redirect()
        ->route('user.index')
        ->withSuccess("El usuario fue asociado correctamente");
    }

    public function edit(User $user)
    {
        return view('users.edit')->with([
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $user->update([
            'name'=>request('name'),
            'email'=>request('email'),
            'rol_id'=>request('rol_id')
        ]);

        return redirect()
        ->route('user.index')
        ->withSuccess("El usuario fue editado correctamente");
    }

}
