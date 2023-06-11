<?php

namespace App\Http\Controllers;

use App\Models\spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // jika kode tidak null
        $spp = spp::whereNotNull("kode");

        // megnirim nilai sum ke blade
        $totalPenerimaan = $spp->sum("penerimaan");
        $totalPengeluaran = $spp->sum("pengeluaran");
        $totalSaldo = $totalPenerimaan - $totalPengeluaran;

        // rekap sesuai dengan bulan
        if ($request->has("rekap")) {
            $spp->whereMonth("tanggal", '=', $request->rekap);
            // megnirim nilai sum ke blade
            $totalPenerimaan = $spp->sum("penerimaan");
            $totalPengeluaran = $spp->sum("pengeluaran");
            $totalSaldo = $totalPenerimaan - $totalPengeluaran;
        }

        // cari by kode pengeluaran/pemasukan
        if ($request->has("kode")) {
            $spp = $spp->where('kode', 'like', "%" . $request->kode . "%");
            // megnirim nilai sum ke blade
            $totalPenerimaan = $spp->sum("penerimaan");
            $totalPengeluaran = $spp->sum("pengeluaran");
            $totalSaldo = $totalPenerimaan - $totalPengeluaran;
        }

        $data = $spp->paginate(10);

        return view("dashboard.spp", [
            "data" => $data,
            "totalPenerimaan" => $totalPenerimaan,
            "totalPengeluaran" => $totalPengeluaran,
            "totalSaldo" => $totalSaldo
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            "tanggal" => "required",
            "kode" => "required|unique:spp",
            "uraian" => "required",
            "penerimaan" => "numeric",
            "pengeluaran" => "numeric",
        ]);

        $insert = spp::create([
            "tanggal" => $request->tanggal,
            "kode" => $request->kode,
            "uraian" => $request->uraian,
            "penerimaan" => $request->penerimaan,
            "pengeluaran" => $request->pengeluaran,
        ]);

        if ($insert) {
            return redirect("/dashboard/spp")->with(["success" => "Berhasil Menambah Data!"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function show(spp $spp)
    {
        return view("dashboard.spp_update", [
            "data" => $spp
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function edit(spp $spp)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, spp $spp)
    {
        $spp->find($request->id);
        $spp->tanggal = $request->update_tanggal;
        $spp->kode = $request->update_kode;
        $spp->uraian = $request->update_uraian;
        $spp->penerimaan = $request->update_penerimaan;
        $spp->pengeluaran = $request->update_pengeluaran;
        $spp->saldo = $request->update_saldo;
        $spp->save();

        return redirect("/dashboard/spp")->with(["success" => "berhasil mengubah data"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function destroy(spp $spp)
    {
        // route model binding
        $spp->delete();
        return redirect("dashboard/spp");
    }
}
