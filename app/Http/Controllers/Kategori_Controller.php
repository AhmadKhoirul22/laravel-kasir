<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class Kategori_Controller extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        return view('kategori',[
            'title' => 'Kategori page',
            'kategori' => $kategori
        ]);
    }

    public function store(Request $request){
        $validasi = request()->validate([
            'kategori_nama' => 'required|string|min:4|max:200',
        ]);
        if($validasi == false){
            return redirect()->back()->withErrors($validasi)->withInput();
        }
        $user = new Kategori();
        $user->kategori_nama = $request->input('kategori_nama');

        $user->save();
        return redirect()->route('kategori-index')->with('success','Kategori berhasil ditambahkan');
    }

    public function destroy($id){
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect()->route('kategori-index')->with('success','Kategori berhasil dihapus');
    }

    public function update(Request $request,$id){
        $validasi = request()->validate([
            'kategori_nama' => 'required|string|min:4|max:200',
        ]);
        if($validasi == false){
            return redirect()->back()->withErrors($validasi)->withInput();
        }
        $user = Kategori::find($id);
        $user->kategori_nama = $request->input('kategori_nama');

        $user->save();
        return redirect()->route('kategori-index')->with('success','Kategori berhasil diupdate');
    }
}
