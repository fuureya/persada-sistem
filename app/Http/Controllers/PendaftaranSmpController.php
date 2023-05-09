<?php

namespace App\Http\Controllers;

use App\Models\PendaftarSmpModel;
use Illuminate\Http\Request;

class PendaftaranSmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // view
        return view("pendaftar.pendaftar_smp");
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
        // validation
        $request->validate([
            "nama_pendaftar" => "required|max:60",
            "asal_sekolah" => "required|max:60",
            "tanggal_lahir" => "required",
            "nomor_wa" => "required",
            "nama_wali" => "required",
            "nomor_wa_wali" => "required"
        ]);

        // setelah validasi
        PendaftarSmpModel::insert([
            "nama_pendaftar" => $request->nama_pendaftar,
            "asal_sekolah" => $request->asal_sekolah,
            "tanggal_lahir" => $request->tanggal_lahir,
            "nomor_wa" => $request->nomor_wa,
            "nama_wali" => $request->nama_wali,
            "nomor_wa_wali" => $request->nomor_wa_wali
        ]);

        return redirect("/daftarsmp")->with("success", "Kamu berhasil mendaftar. Silahkan tunggu admin");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
