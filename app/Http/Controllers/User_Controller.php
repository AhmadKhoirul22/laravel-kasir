<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User_Controller extends Controller
{
    public function index(){
        return view('user',[
            'title' => 'User'
        ]);
    }
}
