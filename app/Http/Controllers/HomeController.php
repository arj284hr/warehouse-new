<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        if(Auth::check()){
            if(Auth::user()->isManager()) {
                return redirect()->route('manager.dashboard');
            } else if(Auth::user()->isAdmin()) {
                return redirect()->route('admin.dashboard');
            } else if(Auth::user()->isEmployee()) {
                return redirect()->route('employee.dashboard');
            } 
        } 
    }
}
