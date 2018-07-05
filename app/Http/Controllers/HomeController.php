<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Local;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //if email confirmation = true, redirect to homepage
        if (Gate::allows('confirmUser')) {
            $totalLocals = Local::where('user_id', '=', auth()->user()->id)->count();
            return view('home', compact('totalLocals'));// The current user can update the post...
        }else{            
            return view('unauthorized');
        }
        
    }

     
}
