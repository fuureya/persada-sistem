<?php

namespace App\Http\Controllers;

use App\Models\psg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PsgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.psg", [
            "data" => DB::table("psg")->paginate(10)
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
            "kode" => "required|unique:psg",
            "uraian" => "required",
            "penerimaan" => "numeric",
            "pengeluaran" => "numeric",
        ]);

        $insert = psg::create([
            "tanggal" => $request->tanggal,
            "kode" => $request->kode,
            "uraian" => $request->uraian,
            "penerimaan" => $request->penerimaan,
            "pengeluaran" => $request->pengeluaran,
        ]);

        if($insert){
            return redirect("/dashboard/psg")->with(["success" => "Berhasil Menambah Data!"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\psg  $psg
     * @return \Illuminate\Http\Response
     */
    public function show(psg $psg)
    {
        return view("dashboard.psg_update", [
            "data" => $psg
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\psg  $psg
     * @return \Illuminate\Http\Response
     */
    public function edit(psg $psg)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\psg  $psg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, psg $psg)
    {
        $psg->find($request->id);
        $psg->tanggal = $request->update_tanggal;
        $psg->kode = $request->update_kode;
        $psg->uraian = $request->update_uraian;
        $psg->penerimaan = $request->update_penerimaan;
        $psg->pengeluaran = $request->update_pengeluaran;
        $psg->saldo = $request->update_saldo;
        $psg->save();

        return redirect("/dashboard/lab")->with(["success" => "berhasil mengubah data"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\psg  $psg
     * @return \Illuminate\Http\Response
     */
    public function destroy(psg $psg)
    {
        $psg->delete();
        return redirect("/dashboard/psg");
    }
}
