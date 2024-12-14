<?php

namespace App\Http\Controllers;

use App\Models\Kebun;
use Illuminate\Http\Request;

class KebunController extends Controller
{
    public function index()
    {
        $kebuns = Kebun::all();  // Menampilkan semua data kebun
        return view('kebun.index', compact('kebuns'));
    }

    public function create()
    {
        return view('kebun.create');  // Menampilkan form untuk menambah data kebun
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomer_kontrak' => 'required|max:50',
            'nama_kebun' => 'required|max:100',
            'alamat' => 'required|max:255',
            'luas' => 'required|max:50',
            'kecamatan' => 'required|max:100',
            'kabupaten' => 'required|max:100',
            'nama_petani' => 'required|max:100',
            'status' => 'required|max:50',
        ]);

        Kebun::create($request->all());  // Menyimpan data kebun baru
        return redirect()->route('kebun.index');  // Mengalihkan ke halaman utama
    }

    public function edit($id)
    {
        $kebun = Kebun::findOrFail($id);  // Mencari data kebun berdasarkan ID
        return view('kebun.edit', compact('kebun'));  // Menampilkan form edit
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomer_kontrak' => 'required|max:50',
            'nama_kebun' => 'required|max:100',
            'alamat' => 'required|max:255',
            'luas' => 'required|max:50',
            'kecamatan' => 'required|max:100',
            'kabupaten' => 'required|max:100',
            'nama_petani' => 'required|max:100',
            'status' => 'required|max:50',
        ]);

        $kebun = Kebun::findOrFail($id);
        $kebun->update($request->all());  // Update data kebun berdasarkan ID
        return redirect()->route('kebun.index');  // Mengalihkan ke halaman utama
    }

    public function destroy($id)
    {
        $kebun = Kebun::findOrFail($id);
        $kebun->delete();  // Menghapus data kebun berdasarkan ID
        return redirect()->route('kebun.index');  // Mengalihkan ke halaman utama
    }
}
