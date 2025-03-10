<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard_Controller extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('dashboard',[
            'title' => 'Dashboard page',
        ]);
    }
}
