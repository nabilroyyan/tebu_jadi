<?php

namespace App\Http\Controllers;

use App\Models\Kebun;
use App\Models\Tb_Timbangan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TimbanganController extends Controller
{
    // Tampilkan daftar data timbangan
    public function index()
    {
        $timbangans = Tb_Timbangan::with(['masterKebunByNama', 'masterPetaniByNama', 'masterKebunByKontrak'])->get();
        return view('viewAdmin.timbangan.index', compact('timbangans'));
    }

    // Tampilkan form tambah data
    public function create()
    {
        $kebuns = Kebun::all(); // Mengambil semua data kebun untuk dropdown
        return view('viewAdmin.timbangan.create', compact('kebuns'));
    }

    // Simpan data baru ke database
    public function store(Request $request)
    {
        
        $randomNoSpa = mt_rand(10000000, 99999999); 
        $validated = [
            'no_spa' => $randomNoSpa,
            'tanggal' => $request->tanggal,
            'master_kebun_id' => $request->master_kebun_id,
            'nama_kebun' => $request-> nama_kebun,
            'nama_petani' => $request-> nama_petani,
            'nopol' => $request->nopol,
            'sopir' => $request->sopir,
            'status_timbang' => "proses",
            'jenis_tebu' => $request->jenis_tebu,
            'brix' => $request->brix,
        ];

        // dd($validated);



        Tb_Timbangan::create($validated);
        return redirect('/timbangan')->with('success', 'Data timbangan berhasil ditambahkan.');
    }

    public function getKebunDetails($id)
{
    $kebun = Kebun::find($id);
    return response()->json($kebun);
}


    // Tampilkan form edit data
    public function edit($id)
    {
        $timbangan = Tb_Timbangan::find($id);
        $kebuns = Kebun::all(); // Mengambil semua data kebun untuk dropdown
        if (!$timbangan) {
            return redirect('/timbangan')->with('error', 'Data timbangan tidak ditemukan.');
        }

        return view('viewAdmin.timbangan.timbangan_update', compact('timbangan', 'kebuns'));
    }

    // Update data di database
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_spa' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'nomer_kontrak' => 'required|exists:db_master_kebun,nomer_kontrak',
            'nopol' => 'required|integer',
            'sopir' => 'required|string|max:255',
            'status_timbang' => 'required|in:proses,selesai_ditimbang',
            'bruto' => 'required|numeric',
            'tara' => 'required|numeric',
            'neto' => 'required|numeric',
            'tgl_masuk_pos' => 'nullable|date',
            'tgl_timb_masuk' => 'nullable|date',
            'tgl_timb_keluar' => 'nullable|date',
            'jenis_tebu' => 'required|string|max:255',
            'brix' => 'required|string|max:255',
        ]);

        $timbangan = Tb_Timbangan::findOrFail($id);
        $timbangan->update($validated);

        return redirect('/timbangan')->with('success', 'Data timbangan berhasil diperbarui.');
    }

    // Hapus data dari database
    public function destroy($id)
    {
        $timbangan = Tb_Timbangan::findOrFail($id);
        $timbangan->delete();

        return redirect('/timbangan')->with('success', 'Data timbangan berhasil dihapus!');
    }
}
