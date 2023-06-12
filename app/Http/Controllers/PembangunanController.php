<?php

namespace App\Http\Controllers;

use App\Models\pembangunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // jika kode tidak null
        $pembangunan = pembangunan::whereNotNull("kode");

        // megnirim nilai sum ke blade
        $totalPenerimaan = $pembangunan->sum("penerimaan");
        $totalPengeluaran = $pembangunan->sum("pengeluaran");
        $totalSaldo = $totalPenerimaan - $totalPengeluaran;

        // rekap sesuai dengan bulan
        if ($request->has("rekap")) {
            $pembangunan->whereMonth("tanggal", '=', $request->rekap);
            // megnirim nilai sum ke blade
            $totalPenerimaan = $pembangunan->sum("penerimaan");
            $totalPengeluaran = $pembangunan->sum("pengeluaran");
            $totalSaldo = $totalPenerimaan - $totalPengeluaran;
        }

        // cari by kode pengeluaran/pemasukan
        if ($request->has("kode")) {
            $pembangunan = $pembangunan->where('kode', 'like', "%" . $request->kode . "%");
            // megnirim nilai sum ke blade
            $totalPenerimaan = $pembangunan->sum("penerimaan");
            $totalPengeluaran = $pembangunan->sum("pengeluaran");
            $totalSaldo = $totalPenerimaan - $totalPengeluaran;
        }

        $data = $pembangunan->paginate(10);

        return view("dashboard.pembangunan", [
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
            "kode" => "required|unique:pembangunan",
            "uraian" => "required",
            "penerimaan" => "numeric",
            "pengeluaran" => "numeric",
        ]);

        $insert = pembangunan::create([
            "tanggal" => $request->tanggal,
            "kode" => $request->kode,
            "uraian" => $request->uraian,
            "penerimaan" => $request->penerimaan,
            "pengeluaran" => $request->pengeluaran,
        ]);

        if($insert){
            return redirect("/dashboard/pembangunan")->with(["success" => "Berhasil Menambah Data!"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pembangunan  $pembangunan
     * @return \Illuminate\Http\Response
     */
    public function show(pembangunan $pembangunan)
    {
        return view("dashboard.pembangunan_update", [
            "data" => $pembangunan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pembangunan  $pembangunan
     * @return \Illuminate\Http\Response
     */
    public function edit(pembangunan $pembangunan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pembangunan  $pembangunan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pembangunan $pembangunan)
    {
        $pembangunan->find($request->id);
        $pembangunan->tanggal = $request->update_tanggal;
        $pembangunan->kode = $request->update_kode;
        $pembangunan->uraian = $request->update_uraian;
        $pembangunan->penerimaan = $request->update_penerimaan;
        $pembangunan->pengeluaran = $request->update_pengeluaran;
        $pembangunan->saldo = $request->update_saldo;
        $pembangunan->save();

        return redirect("/dashboard/pembangunan")->with(["success" => "berhasil mengubah data"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pembangunan  $pembangunan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pembangunan $pembangunan)
    {
        $pembangunan->delete();
        return redirect("dashboard/pembangunan");
    }
}
