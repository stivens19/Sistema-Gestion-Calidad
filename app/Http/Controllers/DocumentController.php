<?php

namespace App\Http\Controllers;

use App\Document;
use App\Proceso;
use App\Typedocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','rols:Administrador']);
    }
    public function index()
    {
        $typedocuments=Typedocument::all(['id','name']);
        $procesos=Proceso::all(['id','name']);
        $documents=Document::all();
        return view('documents.index',compact('documents','typedocuments','procesos'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file=$request->file('archivo')->getClientOriginalName();
        $path=$request->file('archivo')->storeAs('public',$file);
        $pathenv=substr($path,6);
        $ruta='storage'.$pathenv;
        $data=request()->validate([
            'name' => 'required|min:6',
            'description'=>'required',
            'archivo'=>'required',
            'typedocument_id'=>'required',
            'proceso_id'=>'required'
        ]);

        DB::table('documents')->insert([
            'name'=>$data['name'],
            'description'=>$data['description'],
            'archivo'=>$ruta,
            'typedocument_id'=>$data['typedocument_id'],
            'proceso_id'=>$data['proceso_id'],
        ]);

        return redirect()
        ->route('document.index')
        ->withSuccess("Se creo satisfactoriamente el documento");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proceso=Proceso::find($id);
        $documents=$proceso->documents->toArray();
        return view('documents.show',compact('documents','proceso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
