<?php

namespace App\Http\Controllers;

use App\Models\pendaftarSmkModel;
use App\Models\pendaftarSmpModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        return view("dashboard.index");
    }

    public function pendaftarSmp()
    {
        return view("dashboard.pendaftar-smp", [
            "data" => DB::table("pendaftar_smp")->paginate(10)
        ]);
    }

    public function pendaftarSmk()
    {
        $data = pendaftarSmkModel::with('jurusan')->paginate(10);
        return view("dashboard.pendaftar-smk", [
            "data" => $data
        ]);
    }


}
