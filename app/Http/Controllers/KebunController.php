<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

use App\Models\Kebun;
use Illuminate\Http\Request;

class KebunController extends Controller
{
    public function index()
    {
        $data = [
            'kebuns' => Kebun::all()
        ];
        return view('viewAdmin.kebun.kebun', $data);
    }

    public function store(Request $request)
    {
        $randomNumber = rand(10000, 99999);
        $huruf = range('A', 'Z');
        $hurufAcak = $huruf[array_rand($huruf)];

        $data = [
            'nomer_kontrak' => $hurufAcak . '-' . $randomNumber,
            'nama_kebun' => $request->nama_kebun,
            'alamat' => $request->alamat,
            'luas' => $request->luas,
            'provinsi' => $request->provinsi_nama, // Menggunakan nama provinsi
            'kabupaten' => $request->kabupaten_nama, // Menggunakan nama kabupaten
            'kecamatan' => $request->kecamatan_nama, // Menggunakan nama kecamatan
            'nama_petani' => $request->nama_petani,
            'status' => "aktif",
        ];

        Kebun::create($data);
        return redirect('/kebun')->with('success', 'Data kebun berhasil ditambahkan.');
    }

    // Add the missing `edit` method
    public function edit($id)
    {
        $kebun = Kebun::find($id);
        if (!$kebun) {
            return redirect('/kebun')->with('error', 'Data kebun tidak ditemukan.');
        }
        return view('viewAdmin.kebun.kebun_update', compact('kebun'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            "nama_kebun" => $request->nama_kebun,
            "alamat" => $request->alamat,
            "luas" => $request->luas,
           'provinsi' => $request->provinsi_nama, 
            'kabupaten' => $request->kabupaten_nama,
            'kecamatan' => $request->kecamatan_nama,
            "nama_petani" => $request->nama_petani,
            "status" => $request->status,
        ];

        $kebun = Kebun::find($id);
        if (!$kebun) {
            return redirect('/kebun')->with('error', 'Data kebun tidak ditemukan.');
        }

        $kebun->update($data);
        return redirect('/kebun')->with('success', 'Data kebun berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kebun = Kebun::findOrFail($id);
        $kebun->delete();

        return redirect('/kebun')->with('success', 'Data kebun berhasil dihapus!');
    }
}
