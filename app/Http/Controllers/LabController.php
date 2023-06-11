<?php

namespace App\Http\Controllers;

use App\Models\lab;
use Illuminate\Http\Request;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // jika kode tidak null
        $spp = lab::whereNotNull("kode");

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

        return view("dashboard.lab", [
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
            "kode" => "required|unique:lab",
            "uraian" => "required",
            "penerimaan" => "required|numeric",
            "pengeluaran" => "required|numeric",
        ]);

        $insert = lab::create([
            "tanggal" => $request->tanggal,
            "kode" => $request->kode,
            "uraian" => $request->uraian,
            "penerimaan" => $request->penerimaan,
            "pengeluaran" => $request->pengeluaran,
        ]);

        if($insert){
            return redirect("/dashboard/lab")->with(["success" => "Berhasil Menambah Data!"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function show(lab $lab)
    {
        return view("dashboard.lab_update", [
            "data" => $lab
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function edit(lab $lab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lab $lab)
    {
        $lab->find($request->id);
        $lab->tanggal = $request->update_tanggal;
        $lab->kode = $request->update_kode;
        $lab->uraian = $request->update_uraian;
        $lab->penerimaan = $request->update_penerimaan;
        $lab->pengeluaran = $request->update_pengeluaran;
        $lab->saldo = $request->update_saldo;
        $lab->save();

        return redirect("/dashboard/lab")->with(["success" => "berhasil mengubah data"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function destroy(lab $lab)
    {
        $lab->delete();
        return redirect("/dashboard/lab");
    }
}
