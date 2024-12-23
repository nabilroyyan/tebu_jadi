<?php

namespace App\Http\Controllers;

use App\Models\Kebun;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Model;

class KebunController extends Controller
{
    public function index()
    {
        $data = [
            'kebuns' => Kebun::all()

        ];
        return view('viewAdmin.kebun.detail', $data);
    }


    public function store(Request $request)
    {

        // $request->validate([
        //     'nama_kebun' => 'required|string|max:100',
        //     'alamat' => 'required|string|max:255',
        //     'luas' => 'required|string|max:100',
        //     'kecamatan' => 'required|string|max:100',
        //     'kabupaten' => 'required|string|max:100',
        //     'nama_petani' => 'required|string|max:100',
        //     'status' => 'required|string|max:50',
        // ]);


        $randomNumber = rand(10000, 99999);

        // Mengambil satu huruf acak
        $huruf = range('A', 'Z'); // Array dari huruf A hingga Z
        $hurufAcak = $huruf[array_rand($huruf)]; // Mengambil satu huruf acak dari array

        $data = [
            'nomer_kontrak' => $hurufAcak . '-' . $randomNumber, // Menggabungkan huruf acak dan angka
            'nama_kebun' => $request->nama_kebun,
            'alamat' => $request->alamat,
            'luas' => $request->luas,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'nama_petani' => $request->nama_petani,
            'status' => $request->status,

        ];

        Kebun::create($data);
        return redirect('/kebun')->with('success', 'Data kebun berhasil ditambahkan.');
    }
}
