<?php

namespace App\Http\Controllers;

use App\Proceso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProcesoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','rols:Administrador,Docente']);
    }

    public function index()
    {
        $processes=Proceso::all();
        return view('procesos.index',compact('processes'));
    }


    public function store(Request $request)
    {
        $file=$request->file('archivo')->getClientOriginalName();
        $path=$request->file('archivo')->storeAs('public',$file);
        $pathenv=substr($path,6);
        $ruta='storage'.$pathenv;
        $data=request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'], 
            'archivo'=>['required'],
        ]);
        DB::table('procesos')->insert([
            'name'=>$data['name'],
            'description'=>$data['description'],
            'archivo'=>$ruta,
        ]);

        return redirect()
        ->route('process.index')
        ->withSuccess("El proceso fue creado satisfactoriamente");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Proceso $process)
    {
        return view('procesos.show',compact('process'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Proceso $process)
    {
        return view('procesos.edit')->with([
            'process' => $process,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Proceso $process)
    {
        $process->update([
            'name'=>request('name'),
            'description'=>request('description'),
        ]);

        return redirect()
        ->route('process.index')
        ->withSuccess("El proceso fue editado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proceso $process)
    {
        $process->delete();
        return redirect()
        ->route('process.index')
        ->withSuccess("El proceso fue eliminado satisfactoriamente");
    }
}
