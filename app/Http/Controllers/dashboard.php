<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboard extends Controller
{
    //
    public function index(){
        return view('backend.dashboard.index',[
            'title' => 'Dashboard'
        ]);
    }
}
