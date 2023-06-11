<?php

namespace App\Http\Controllers;

use App\Models\tunggakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TunggakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.tunggakan", [
            "data" => DB::table("tunggakan")->paginate(10)
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
