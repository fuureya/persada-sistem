<?php

namespace App\Http\Controllers;

use App\Models\semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // jika di tabel kode tidak null
        $semester = semester::whereNotNull('kode');

        // variabel yang mengirim ke blade semester
        $totalPenerimaan = $semester->sum("penerimaan");
        $totalPengeluaran = $semester->sum("pengeluaran");
        $totalSaldo = $totalPenerimaan - $totalPengeluaran;

        // rekap by bulan
        if ($request->has("rekap")) {
            $semester->whereMonth("tanggal", '=', $request->rekap);
            // akumulasi saldo
            $totalPenerimaan = $semester->sum("penerimaan");
            $totalPengeluaran = $semester->sum("pengeluaran");
            $totalSaldo = $totalPenerimaan - $totalPengeluaran;
        }

        // cari by kode
        if ($request->has("kode")) {
            $semester = $semester->where('kode', 'like', "%" . $request->kode . "%");
            // akumulasi saldo
            $totalPenerimaan = $semester->sum("penerimaan");
            $totalPengeluaran = $semester->sum("pengeluaran");
            $totalSaldo = $totalPenerimaan - $totalPengeluaran;
        }

        // view biasa
        $data = $semester->paginate(10);
        return view("dashboard.semester", [
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
            "kode" => "required|unique:semester",
            "uraian" => "required",
            "penerimaan" => "numeric",
            "pengeluaran" => "numeric",
            "saldo" => "required"
        ]);

        $insert = semester::create([
            "tanggal" => $request->tanggal,
            "kode" => $request->kode,
            "uraian" => $request->uraian,
            "penerimaan" => $request->penerimaan,
            "pengeluaran" => $request->pengeluaran,
        ]);

        if ($insert) {
            return redirect("/dashboard/semester")->with(["success" => "Berhasil Menambah Data!"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(semester $semester)
    {
        return view("dashboard.all_update", [
            "data" => $semester
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit(semester $semester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, semester $semester)
    {
        $semester->find($request->id);
        $semester->tanggal = $request->update_tanggal;
        $semester->kode = $request->update_kode;
        $semester->uraian = $request->update_uraian;
        $semester->penerimaan = $request->update_penerimaan;
        $semester->pengeluaran = $request->update_pengeluaran;
        $semester->save();
        return redirect("/dashboard/semester")->with(["anjay" => "berhasil mengubah data"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = semester::find($id);
        $delete->delete();
        return redirect("dashboard/semester");
    }
}
