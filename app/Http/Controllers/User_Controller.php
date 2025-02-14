<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class User_Controller extends Controller
{
    public function __construct(){

    }
    public function index(){
        $user = User::all();
        return view('user',[
            'title' => 'User page',
            'user' => $user
        ]);
    }

    public function store(Request $request){
        $validasi = request()->validate([
            'name' => 'required|string|min:4|max:200|unique:users,name',
            'email' => 'required|string|min:5',
            'username' => 'required|string|min:4|max:200',
            'password' => 'required|string|min:4',
        ]);
        if($validasi == false){
            return redirect()->back()->withErrors($validasi)->withInput();
        }
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect()->route('user-index')->with('success','User berhasil ditambahkan');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user-index')->with('success', 'User berhasil dihapus.');
    }

    public function update(Request $request,$id){
        $validasi = request()->validate([
            'name' => 'required|string|min:4|max:200|unique:users,name',
            'email' => 'required|string|min:5',
            'username' => 'required|string|min:4|max:200',
            'password' => 'nullable|string|',
        ]);
        if($validasi == false){
            return redirect()->back()->withErrors($validasi)->withInput();
        }
        $user = User::find($id);
        $user->nama = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        // $user->password = bcrypt($request->input('password'));

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();
        return redirect()->route('user-index')->with('success','User berhasil diupdate');
    }
}
