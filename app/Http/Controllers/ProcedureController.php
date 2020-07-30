<?php

namespace App\Http\Controllers;

use App\Procedure;
use App\Proceso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProcedureController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','rols:Administrador']);
    }

    public function index()
    {
        $procedures=Procedure::all();
        $procesos=Proceso::all();
        return view('procedure.index',compact('procedures','procesos'));
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
            'proceso_id'=>['required','numeric'],
        ]);
        DB::table('procedures')->insert([
            'name'=>$data['name'],
            'description'=>$data['description'],
            'archivo'=>$ruta,
            'proceso_id'=>$data['proceso_id'],
        ]);

        return redirect()
        ->route('procedures.index')
        ->withSuccess("El procedimiento fue creado satisfactoriamente");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Procedure $procedure)
    {
        return view('procedure.show',compact('procedure'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Procedure $procedure)
    {
        $procesos=Proceso::all();
        return view('procedure.edit',compact('procedure','procesos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Procedure $procedure)
    {
        $procedure->update([
            'name'=>request('name'),
            'description'=>request('description'),
            'archivo'=>request('archivo'),
            'proceso_id'=>request('proceso_id')
        ]);

        return redirect()
        ->route('procedures.index')
        ->withSuccess("El procedimiento fue editado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Procedure $procedure)
    {
        $procedure->delete();
        return redirect()
        ->route('procedures.index')
        ->withSuccess("El procedimiento fue eliminado satisfactoriamente");
    }
}
