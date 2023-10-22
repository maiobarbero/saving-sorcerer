<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    public function index(){
        return Inertia::render('Auth/Login');
    }

    public function dashboard(Request $request){
        return Inertia::render('Auth/Dashboard',[
            'user'=> Auth::id()
        ]);
    }
}
