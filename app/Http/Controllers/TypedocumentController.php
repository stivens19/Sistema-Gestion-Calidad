<?php

namespace App\Http\Controllers;

use App\Typedocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypedocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','rols:Administrador']);
    }

    public function index()
    {
       $typedocuments=Typedocument::all();
       return view('typedocument.index',compact('typedocuments'));
    }

   
    public function store(Request $request)
    {
        $data=request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'], 
        ]);
        DB::table('typedocuments')->insert([
            'name'=>$data['name'],
            'description'=>$data['description'],
        ]);

        return redirect()
        ->route('typedocument.index')
        ->withSuccess("El tipo de documento fue creado satisfactoriamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Typedocument  $typedocument
     * @return \Illuminate\Http\Response
     */
    public function show(Typedocument $typedocument)
    {
        return view('typedocument.show',compact('typedocument'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Typedocument  $typedocument
     * @return \Illuminate\Http\Response
     */
    public function edit(Typedocument $typedocument)
    {
        return view('typedocument.edit')->with([
            'typedocument' => $typedocument,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Typedocument  $typedocument
     * @return \Illuminate\Http\Response
     */
    public function update(Typedocument $typedocument)
    {
        $typedocument->update([
            'name'=>request('name'),
            'description'=>request('description'),
        ]);

        return redirect()
        ->route('typedocument.index')
        ->withSuccess("El tipo de documento fue editado satisfactoriamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Typedocument  $typedocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(Typedocument $typedocument)
    {
        $typedocument->delete();
        return redirect()
        ->route('typedocument.index')
        ->withSuccess("El tipo de documento fue eliminado satisfactoriamente");
    }
}
