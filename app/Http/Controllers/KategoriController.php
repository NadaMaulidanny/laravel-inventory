<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(){
        $kategoris = Kategori::all();

        return view ('kategori.kategoriList', compact('kategoris'));
    }

    public function add(){
        return view ('kategori.kategoriAdd');
    }

    public function store(Request $request){
        $request->validate([
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
        ]);

        Kategori::create([
            'kategori'  => $request->kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kategori.kategoriList')
                        ->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit(string $id){
        $kategori = Kategori::find($id);

        return view('kategori.kategoriEdit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $data = [
            'kategori'  => $request->kategori,
            'deskripsi' => $request->deskripsi,
        ];

        $kategori->update($data);

        return redirect()->route('kategori.kategoriList')->with('success', 'Kategori berhasil diperbarui');
    }

    public function delete(string $id){
        $kategori = Kategori::find($id);

        $kategori->delete();

        return redirect()->route('kategori.kategoriList')->with('success', 'Kategori berhasil dihapus');
    }

}
