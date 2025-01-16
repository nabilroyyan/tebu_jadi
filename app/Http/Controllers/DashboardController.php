<?php

namespace App\Http\Controllers;

use App\Models\Kebun;
use App\Models\tb_timbangan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKebun = Kebun::count(); // Hitung total data kebun
        $totalTimbangan = tb_Timbangan::count(); // Hitung total data timbangan

        // Kirim data ke view
        return view('/viewAdmin.dashboard', compact('totalKebun', 'totalTimbangan'));
    }
}

