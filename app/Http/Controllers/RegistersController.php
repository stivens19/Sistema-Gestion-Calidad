<?php

namespace App\Http\Controllers;

use App\Procedure;
use App\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $procedures=Procedure::all();
        return view('registers.create',compact('procedures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file=$request->file('ruta_drive')->getClientOriginalName();
        $path=$request->file('ruta_drive')->storeAs('public',$file);
        $pathenv=substr($path,6);
        $ruta='storage'.$pathenv;
        $data=request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'], 
            'ruta_drive'=>['required'],
            'procedure_id'=>['required','numeric'],
        ]);

        DB::table('registers')->insert([
            'name'=>$data['name'],
            'description'=>$data['description'],
            'ruta_drive'=>$ruta,
            'procedure_id'=>$data['procedure_id'],
        ]);

        return redirect()
        ->route('home')
        ->withSuccess("El registro fue creado satisfactoriamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $procedure=Procedure::find($id);
        
        $registros=$procedure->registers->toArray();
       return view('registers.show',compact('registros','procedure'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(Register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Register $register)
    {
        //
    }
}
