<?php

namespace App\Http\Controllers;

use App\Models\JurusanModel;
use App\Models\jurusanModel as ModelsJurusanModel;
use App\Models\pendaftarSmkModel;
use Illuminate\Http\Request;

class PendaftarSmkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = pendaftarSmkModel::with('jurusan')->get();
        // $data = pendaftarSmkModel::all();
        $data = JurusanModel::all();

        return view("pendaftar.pendaftar_smk", [
            "data" => $data
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
        // dd($request->all());
        $validate = $request->validate([
            "nama_pendaftar" => "required|max:60",
            "jurusans_id" => "required",
            "asal_sekolah" => "required|max:60",
            "tanggal_lahir" => "required",
            "nomor_wa" => "required",
            "nama_wali" => "required",
            "nomor_wa_wali" => "required"
        ]);
        pendaftarSmkModel::insert($validate);
        return redirect("/daftarsmk")->with("success", "Kamu berhasil mendaftar. Silahkan tunggu admin");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JurusanModel  $jurusanModel
     * @return \Illuminate\Http\Response
     */
    public function show(JurusanModel $jurusanModel)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JurusanModel  $jurusanModel
     * @return \Illuminate\Http\Response
     */
    public function edit(JurusanModel $jurusanModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JurusanModel  $jurusanModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JurusanModel $jurusanModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JurusanModel  $jurusanModel
     * @return \Illuminate\Http\Response
     */

    public function destroy(JurusanModel $jurusanModel)
    {
        //
    }
}
