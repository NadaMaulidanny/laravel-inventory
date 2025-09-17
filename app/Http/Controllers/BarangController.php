<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;

class BarangController extends Controller
{
    public function index(){
        $barangs = Barang::with('kategori')->get();
        return view('barang.barangList', compact('barangs'));
    }

    public function add(){
        $kategoris = Kategori::all();
        return view('barang.barangAdd', compact('kategoris'));
    }

    public function store(Request $request){
         $request->validate([
            'kode_barang' => 'required|string|max:50|unique:barangs,kode_barang',
            'nama_barang' => 'required|string|max:150',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok'        => 'required|integer|min:0',
            'harga_beli'  => 'required|numeric|min:0',
            'harga_jual'  => 'required|numeric|min:0',
            'deskripsi'   => 'nullable|string',
        ]);

        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'stok'        => $request->stok,
            'harga_beli'  => $request->harga_beli,
            'harga_jual'  => $request->harga_jual,
            'deskripsi'   => $request->deskripsi,
        ]);

        return redirect()->route('barang.barangList')
                         ->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit(string $id){
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all();

        return view('barang.barangEdit', compact('barang', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
         $barang = Barang::findOrFail($id);

        $request->validate([
            'kode_barang' => 'required|string|max:50|unique:barangs,kode_barang,' . $id,
            'nama_barang' => 'required|string|max:150',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok'        => 'required|integer|min:0',
            'harga_beli'  => 'required|numeric|min:0',
            'harga_jual'  => 'required|numeric|min:0',
            'deskripsi'   => 'nullable|string',
        ]);

        $barang->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'stok'        => $request->stok,
            'harga_beli'  => $request->harga_beli,
            'harga_jual'  => $request->harga_jual,
            'deskripsi'   => $request->deskripsi,
        ]);

        return redirect()->route('barang.barangList')
                         ->with('success', 'Barang berhasil diperbarui!');
    }

    public function delete(string $id){
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.barangList')
                         ->with('success', 'Barang berhasil dihapus!');
    }
}
