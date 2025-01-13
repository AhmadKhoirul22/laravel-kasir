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

    public function store(Request $request){
        $validasi = request()->validate([
            'nama' => 'required|string|min:4|max:200',
            'username' => 'required|string|min:4|max:200',
            'password' => 'required|string|min:4',
        ]);
        if($validasi == false){
            return redirect()->back()->withErrors($validasi)->withInput();
        }
        $user = new User();
        $user->nama = $request->input('nama');
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect()->route('user-index')->with('success','User berhasil ditambahkan');
    }
}
