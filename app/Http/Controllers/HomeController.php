<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*$id=Auth::id();
        $user=User::find($id);
        $procesos=$user->procesos;
        foreach ($procesos as $proceso) {
               
            $proceso->documents;
                
        }
        
       
       
        if (isset($proceso)) {
            return view('home',compact('proceso'));
            
        }else{
            return view('home');
        }*/
        $id=Auth::id();
        $user=User::find($id);
        $procesos=$user->procesos;
        foreach ($procesos as $proceso) {
               
            $proceso->procedures;
                
        }
        if (isset($proceso)) {
            return view('home',compact('proceso','procesos'));
            
        }else{
            return view('home');
        }
        
    }
}
