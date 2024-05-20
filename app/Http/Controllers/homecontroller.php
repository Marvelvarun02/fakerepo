<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homecontroller extends Controller
{
    public function usereg(Request $request)

    {
        $inputdata = $request -> validate([
            'demo_name'=>'required',
            'demo_password'=>'required'
        ]);
        return view('home');
    }
    
}
