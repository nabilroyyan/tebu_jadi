<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\tb_timbangan;
use App\Models\Kebun;
use App\Models\DataHutang;
use App\Models\Konstanta;
use App\Models\Bodys1;
use App\Models\Bodys2;
use App\Models\Bodys3;
use App\Models\Bodys4;
use App\Models\HalamanRelated;
use App\Models\TbHutang;
use App\Models\TbTransaksi;
use App\Models\Anggota;
use Hashids\Hashids;

class DocumentController extends Controller
{
    public function showReport(Request $request)
    {
        try {
            // Ambil nilai `Id` yang dienkripsi dari request
            $encryptedId = $request->input('Id');
    
            // Log nilai `encryptedId` untuk debugging
            \Log::info('Encrypted ID diterima:', ['encryptedId' => $encryptedId]);
    
            // Cek jika `encryptedId` tidak ada
            if (!$encryptedId) {
                \Log::error('Parameter ID tidak ditemukan di request');
                return abort(404, 'Parameter ID tidak ditemukan');
            }
    
            // Dekripsi `encryptedId`
            $id = Crypt::decryptString($encryptedId);
    
            // Log nilai setelah dekripsi
            \Log::info('ID setelah dekripsi:', ['id' => $id]);
    
            // Kembalikan view dengan ID yang sudah didekripsi
            return view('cetak.hasil_ph.report', compact('id'));
        } catch (\Exception $e) {
            // Log pesan error jika terjadi kesalahan
            \Log::error('Gagal mendekripsi ID: ' . $e->getMessage());
            return abort(404, 'Gagal mendekripsi ID');
        }
    }
    

    public function showDataMasuk()
    {
        return view('cetak.hasil_ph.dataMasuk');
    }

    public function getReportData($id)
    {
        // Ambil data timbangan
    $timbangan = tb_timbangan::find($id);
    if (!$timbangan) {
        return response()->json(['error' => 'Timbangan not found'], 404);
    }

    // Ambil data kebun berdasarkan id_master_kebun dari timbangan
    $kebun = kebun::find($timbangan->master_kebun_id);
    if (!$kebun) {
        return response()->json(['error' => 'Kebun not found'], 404);
    }

    // Ambil data hutang berdasarkan nokontrak dari kebun
    $dataHutang = TbHutang::where('nokontrak', $kebun->nomer_kontrak)->get();
    if ($dataHutang->isEmpty()) {
        return response()->json(['error' => 'Data Hutang not found'], 404);
    }

    $konstata = Konstanta::find(1);
    
        $body1s = Bodys1::all();
        $body2s = Bodys2::all();
        $body3s = Bodys3::all();
        $body4s = Bodys4::all();
        $anggotas = Anggota::all();
        $halamanRelated = HalamanRelated::find(1);
    
        return response()->json([
            'kebun' => $kebun,
            'timbangan' => $timbangan,
            'dataHutang' => $dataHutang,
            'konstata' => $konstata,
            'body1s' => $body1s,
            'body2s' => $body2s,
            'body3s' => $body3s,
            'body4s' => $body4s,
            'anggotas' => $anggotas,
            'halamanRelated' => $halamanRelated,
        ]);
    }

    public function getDataMasuk()
    {
        $dataMasuk = tb_timbangan::all()->map(function($item) {
            // Enkripsi ID menggunakan Crypt
            $item->encrypted_id = Crypt::encryptString($item->id_timbangan);
            return $item;
        });
    
        return response()->json(['dataMasuk' => $dataMasuk]);
    }
        
}
