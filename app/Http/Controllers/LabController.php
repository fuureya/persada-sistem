<?php

namespace App\Http\Controllers;

use App\Models\lab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.lab", [
            "data" => DB::table("lab")->paginate(10)
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
            "penerimaan" => "numeric",
            "pengeluaran" => "numeric",
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
