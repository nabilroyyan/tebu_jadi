<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

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

// API untuk mendapatkan semua data timbangan tanpa relasi
public function apiGetAllTimbangan()
{
    $timbangans = Tb_Timbangan::all(); // Mengambil semua data dari tabel Tb_Timbangan
    return response()->json([
        'success' => true,
        'message' => 'Data timbangan berhasil diambil.',
        'data' => $timbangans
    ], 200);
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

    public function update(Request $request, $id)
{
  

    $validated = $request->validate([
        
        'no_spa' => 'nullable|string|max:255',
        'tanggal' => 'nullable|date',
        'nopol' => 'nullable|string',
        'sopir' => 'nullable|string|max:255',
        'status_timbang' => 'nullable|in:proses,selesai ditimbang',
        'bruto' => 'nullable|numeric',
        'tara' => 'nullable|numeric',
        'neto' => 'nullable|numeric',
        'tgl_masuk_pos' => 'nullable|date',
        'tgl_timb_masuk' => 'nullable|date',
        'tgl_timb_keluar' => 'nullable|date',
        'jenis_tebu' => 'nullable|in:lokal, non lokal',
        'brix' => 'nullable|string|max:255',
    ]);


     // Hitung neto (backup logika untuk memastikan konsistensi di backend)
     $bruto = $request->input('bruto');
     $tara = $request->input('tara');
     $neto = $bruto - $tara;

    // Ambil data timbangan berdasarkan ID
    $timbangan = Tb_Timbangan::findOrFail($id);

    // Update data timbangan
    $timbangan->update($validated);

    // Ubah status_timbang menjadi selesai_ditimbang
    $timbangan->status_timbang = 'selesai ditimbang';
    $timbangan->save();

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
