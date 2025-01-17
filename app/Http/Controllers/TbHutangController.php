<?php

namespace App\Http\Controllers;

use App\Models\kebun;
use App\Models\TbHutang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TbHutangController extends Controller
{
    public function index()
    {
        $hutangs = TbHutang::all();
        return view('hutang.index', compact('hutangs'));
    }

    public function apiIndex()
{
    $hutangs = TbHutang::all();
    return response()->json($hutangs);
}
    public function show($id)
{
    $hutang = TbHutang::findOrFail($id);
    return view('hutang.show', compact('hutang'));
}
    // Fungsi untuk menampilkan form untuk membuat hutang baru
    public function create()
{
    // Ambil semua data dari db_master_kebun untuk dropdown
    $kebuns = \App\Models\kebun::all(); // Asumsikan Anda sudah membuat model DbMasterKebun

    return view('hutang.create', compact('kebuns'));
}


    // Fungsi untuk menyimpan hutang baru
    public function store(Request $request)
    {
        $request->validate([
            'nokontrak' => 'required',
            'pinjaman' => 'required|numeric',
            'angsuran_sisa' => 'required|numeric',
            'status' => 'required|in:diproses,diterima,ditolak',
        ]);

        TbHutang::create($request->all());

        return redirect()->route('hutangs.index')->with('success', 'Hutang berhasil ditambahkan');
    }

    // Fungsi untuk menampilkan form edit hutang
    public function edit()
    {
        $hutangs = TbHutang::all();
        return view('hutang.edit', compact('hutangs'));
    }

    public function update(Request $request, $id)
{
    // Validate the incoming data
    $validated = $request->validate([
        'status' => 'required|string|in:diproses,diterima,ditolak',
    ]);

    // Find the hutang by ID
    $hutang = TbHutang::findOrFail($id);

    // Update the status field
    $hutang->status = $validated['status'];

    // Save the updated hutang to the database
    $hutang->save();

    // Return a JSON response
    return response()->json(['message' => 'Status berhasil diupdate'], 200);
}

    // Fungsi untuk menghapus hutang
    public function destroy($id)
{
    $hutang = TbHutang::find($id);

    if ($hutang) {
        $hutang->delete();
        return response()->json(['message' => 'Hutang berhasil dihapus'], 200);
    }

    return response()->json(['message' => 'Hutang tidak ditemukan'], 404);
}

}