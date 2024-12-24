<?php

namespace App\Http\Controllers;

use App\Models\tb_timbangan;
use App\Models\Kebun;
use Illuminate\Http\Request;

class TimbanganController extends Controller
{
    // Tampilkan daftar data timbangan
    public function index()
    {
        $timbangans = tb_timbangan::with(['masterKebunByNama', 'masterPetaniByNama'])->get();
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

        tb_timbangan::create($validated);
        return redirect('/timbangan')->with('success', 'Data timbangan berhasil ditambahkan.');
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $timbangan = tb_timbangan::find($id);
        $kebuns = Kebun::all(); // Mengambil semua data kebun untuk dropdown
        if (!$timbangan) {
            return redirect('/timbangan')->with('error', 'Data timbangan tidak ditemukan.');
        }
        return view('viewAdmin.timbangan.edit', compact('timbangan', 'kebuns'));
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

        $timbangan = tb_timbangan::findOrFail($id);
        $timbangan->update($validated);

        return redirect('/timbangan')->with('success', 'Data timbangan berhasil diperbarui.');
    }

    // Hapus data dari database
    public function destroy($id)
    {
        $timbangan = tb_timbangan::findOrFail($id);
        $timbangan->delete();

        return redirect('/timbangan')->with('success', 'Data timbangan berhasil dihapus!');
    }
}
