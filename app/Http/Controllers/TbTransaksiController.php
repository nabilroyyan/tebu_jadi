<?php

namespace App\Http\Controllers;

use App\Models\TbTransaksi;
use App\Models\TbHutang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TbTransaksiController extends Controller
{
    // Fungsi untuk menampilkan semua transaksi
    public function index()
    {
        $transaksis = TbTransaksi::all();
        return view('transaksi.index', compact('transaksis'));
    }

    public function edit()
    {
        $transaksis = TbTransaksi::all();
        return view('transaksi.edit', compact('transaksis'));
    }

    public function apiIndex()
    {
        $transaksis = TbTransaksi::all();
        return response()->json($transaksis);
    }

    // Fungsi untuk menampilkan form untuk membuat transaksi baru
    public function create()
    {
        // Ambil data kebun dan hutang dengan join
        $kebuns = DB::table('db_master_kebun') // Pastikan nama tabel sudah benar
            ->join('tb_hutangs', 'db_master_kebun.nomer_kontrak', '=', 'tb_hutangs.nokontrak') // Join sesuai kebutuhan
            ->select(
                'db_master_kebun.id as kebun_id',
                'db_master_kebun.nomer_kontrak',
                'db_master_kebun.nama_petani',
                'tb_hutangs.id as hutang_id',
                'tb_hutangs.pinjaman'
            )
            ->get();

        return view('transaksi.create', compact('kebuns'));
    }

    // Fungsi untuk menyimpan transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'nokontrak' => 'required',
            'angsuran' => 'required|numeric',
            'status' => 'required|in:diverifikasi,belum diverifikasi',
            'recid' => 'required|exists:tb_hutangs,id',
        ]);

        // Simpan transaksi
        TbTransaksi::create($request->all());
        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    // Fungsi untuk memperbarui status transaksi
    public function updateStatus(Request $request, $id)
    {
        // Temukan transaksi berdasarkan ID
        $transaksi = TbTransaksi::find($id);

        if (!$transaksi) {
            return response()->json(['error' => 'Transaksi tidak ditemukan'], 404);
        }

        // Perbarui status transaksi
        $transaksi->status = $request->status;
        $transaksi->save();

        // Cari hutang terkait menggunakan recid
        $hutang = DB::table('tb_hutangs')->where('id', $transaksi->recid)->first();

        if (!$hutang) {
            return response()->json(['error' => 'Hutang tidak ditemukan', 'recid' => $transaksi->recid], 404);
        }

        // Perbarui angsuran_sisa pada tabel hutang
        try {
            DB::table('tb_hutangs')
                ->where('id', $hutang->id)
                ->update([
                    'angsuran_sisa' => $hutang->angsuran_sisa + $transaksi->angsuran,
                ]);
        } catch (\Exception $e) {
            logger('Kesalahan saat memperbarui hutang: ' . $e->getMessage());
            return response()->json(['error' => 'Gagal memperbarui hutang'], 500);
        }

        return response()->json(['success' => 'Status dan angsuran berhasil diperbarui']);
    }

    // Fungsi untuk menghapus transaksi
    public function destroy($id)
    {
        if (TbTransaksi::destroy($id)) {
            return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil dihapus');
        }

        return redirect()->route('transaksis.index')->with('error', 'Gagal menghapus transaksi');
    }
}
