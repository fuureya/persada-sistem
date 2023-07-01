<?php

namespace App\Http\Controllers;

use App\Models\tunggakan;
use Illuminate\Http\Request;

class TunggakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // jika kode tidak null
        $tunggakan = tunggakan::whereNotNull("kode");

        // megnirim nilai sum ke blade
        $totalPenerimaan = $tunggakan->sum("penerimaan");
        $totalPengeluaran = $tunggakan->sum("pengeluaran");
        $totalSaldo = $totalPenerimaan - $totalPengeluaran;

        // rekap sesuai dengan bulan
        if ($request->has("rekap")) {
            $tunggakan->whereMonth("tanggal", '=', $request->rekap);
            // megnirim nilai sum ke blade
            $totalPenerimaan = $tunggakan->sum("penerimaan");
            $totalPengeluaran = $tunggakan->sum("pengeluaran");
            $totalSaldo = $totalPenerimaan - $totalPengeluaran;
        }

        // cari by kode pengeluaran/pemasukan
        if ($request->has("kode")) {
            $tunggakan = $tunggakan->where('kode', 'like', "%" . $request->kode . "%");
            // megnirim nilai sum ke blade
            $totalPenerimaan = $tunggakan->sum("penerimaan");
            $totalPengeluaran = $tunggakan->sum("pengeluaran");
            $totalSaldo = $totalPenerimaan - $totalPengeluaran;
        }

        $data = $tunggakan->paginate(10);

        return view("dashboard.tunggakan", [
            "data" => $data,
            "totalPenerimaan" => $totalPenerimaan,
            "totalPengeluaran" => $totalPengeluaran,
            "totalSaldo" => $totalSaldo,
            "no_rekap" => $request->rekap
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
            "kode" => "required|unique:tunggakan",
            "uraian" => "required",
            "penerimaan" => "numeric",
            "pengeluaran" => "numeric",
        ]);

        $insert = tunggakan::create([
            "tanggal" => $request->tanggal,
            "kode" => $request->kode,
            "uraian" => $request->uraian,
            "penerimaan" => $request->penerimaan,
            "pengeluaran" => $request->pengeluaran,
        ]);

        if($insert){
            return redirect("/dashboard/tunggakan")->with(["success" => "Berhasil Menambah Data!"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tunggakan  $tunggakan
     * @return \Illuminate\Http\Response
     */
    public function show(tunggakan $tunggakan)
    {
        return view("dashboard.tunggakan_update", [
            "data" => $tunggakan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tunggakan  $tunggakan
     * @return \Illuminate\Http\Response
     */
    public function edit(tunggakan $tunggakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tunggakan  $tunggakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tunggakan $tunggakan)
    {
        $tunggakan->find($request->id);
        $tunggakan->tanggal = $request->update_tanggal;
        $tunggakan->kode = $request->update_kode;
        $tunggakan->uraian = $request->update_uraian;
        $tunggakan->penerimaan = $request->update_penerimaan;
        $tunggakan->pengeluaran = $request->update_pengeluaran;
        $tunggakan->save();

        return redirect("/dashboard/tunggakan")->with(["success" => "berhasil mengubah data"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tunggakan  $tunggakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(tunggakan $tunggakan)
    {
        $tunggakan->delete();
        return redirect("/dashboard/tunggakan");
    }
}
