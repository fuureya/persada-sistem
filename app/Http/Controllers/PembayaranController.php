<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pembayaran = pembayaran::whereNotNull('nis');

        

        // variabel yang mengirim ke blade sebagai total
        $totalPembangunan = $pembayaran->sum("uang_pembangunan");
        $totalUangSpp = $pembayaran->sum("uang_spp");
        $totalUangLab = $pembayaran->sum("uang_lab");
        $totalSemesterGanjil = $pembayaran->sum("semester_ganjil");
        $totalSemesterGenap = $pembayaran->sum("semester_genap");
        $totalUangPsg = $pembayaran->sum("uang_psg");
        $totalUangUas = $pembayaran->sum("uang_uas");
        $totalTunggakan = $pembayaran->sum("tunggakan");

        // rekap by bulan
        if ($request->has("rekap")) {

            // tangkap by rekap bulan
            $pembayaran->whereMonth("tanggal_bayar", '=', $request->rekap);
            $getBulan = $pembayaran->whereMonth("tanggal_bayar", '=', $request->rekap);

            // mengirim data sesuai bulan
            $totalPembangunan = $getBulan->sum("uang_pembangunan");
            $totalUangSpp = $getBulan->sum("uang_spp");
            $totalUangLab = $getBulan->sum("uang_lab");
            $totalSemesterGanjil = $getBulan->sum("semester_ganjil");
            $totalSemesterGenap = $getBulan->sum("semester_genap");
            $totalUangPsg = $getBulan->sum("uang_psg");
            $totalUangUas = $getBulan->sum("uang_uas");
            $totalTunggakan = $getBulan->sum("tunggakan");
        }

        // cari by nis
        if ($request->has("nis")) {
            // $data = DB::table("pembayaran")->where('nis','like',"%".$request->nis."%")->paginate();
            $pembayaran = $pembayaran->where('nis', 'like', "%" . $request->nis . "%");
            $getNis = $pembayaran;

            // mengirim data sesuai Nis
            $totalPembangunan = $getNis->sum("uang_pembangunan");
            $totalUangSpp = $getNis->sum("uang_spp");
            $totalUangLab = $getNis->sum("uang_lab");
            $totalSemesterGanjil = $getNis->sum("semester_ganjil");
            $totalSemesterGenap = $getNis->sum("semester_genap");
            $totalUangPsg = $getNis->sum("uang_psg");
            $totalUangUas = $getNis->sum("uang_uas");
            $totalTunggakan = $getNis->sum("tunggakan");
        }

        // paginate yang tampil 
        $data = $pembayaran->paginate(10);


        return view("dashboard.pembayaran", [
            "data" => $data,
            "uang_pembangunan" => $totalPembangunan,
            "uang_spp" => $totalUangSpp,
            "uang_lab" => $totalUangLab,
            "semester_ganjil" => $totalSemesterGanjil,
            "semester_genap" => $totalSemesterGenap,
            "uang_psg" => $totalUangPsg,
            "uang_uas" => $totalUangUas,
            "uang_tunggakan" => $totalTunggakan
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

        $validated = $request->validate([
            'nama_siswa' => 'required',
            'tanggal_bayar' => 'required',
            'nis' => 'required|numeric',
            'kelas' => 'required',
            'uang_pembangunan' => 'required|numeric',
            'uang_spp' => 'required|numeric',
            'uang_lab' => 'required|numeric',
            'uang_uas' => 'required|numeric',
            'semester_ganjil' => 'required|numeric',
            'semester_genap' => 'required|numeric',
            'uang_psg' => 'required|numeric',
            'tunggakan' => 'required|numeric',
            'keterangan' => 'required'
        ]);

        $insert = pembayaran::create([
            'nama_siswa' => $request->nama_siswa,
            'tanggal_bayar' => $request->tanggal_bayar,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'uang_pembangunan' => $request->uang_pembangunan,
            'uang_spp' => $request->uang_spp,
            'uang_lab' => $request->uang_lab,
            'semester_ganjil' => $request->semester_ganjil,
            'semester_genap' => $request->semester_genap,
            'uang_psg' => $request->uang_psg,
            'uang_uas' => $request->uang_uas,
            'tunggakan' => $request->tunggakan,
            'keterangan' => $request->keterangan
        ]);

        if ($insert) {
            return redirect("/dashboard/pembayaran")->with(["success" => "berhasil tambah data"]);
        } else {
            return redirect("/dashboard/pembayaran")->with(["error" => "Gagal Menambah data"]);
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(pembayaran $pembayaran)
    {

        return view("dashboard.pembayaran_update", [
            "data" => $pembayaran
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(pembayaran $pembayaran)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pembayaran $pembayaran)
    {
        // validate before update
        // $validated = $request->validate([
        //     'update_nama_siswa' => '',
        //     'update_tanggal_bayar' => 'required',
        //     'update_nis' => 'required',
        //     'update_kelas' => 'required',
        //     'update_uang_pembangunan' => 'required',
        //     'update_uang_spp' => 'required',
        //     'update_uang_lab' => 'required',
        //     'update_uang_uas' => 'required',
        //     'update_semester_ganjil' => 'required',
        //     'update_semester_genap' => 'required',
        //     'update_uang_psg' => 'required',
        //     'update_tunggakan' => 'required',
        //     'update_keterangan' => 'required'
        // ]);

        $pembayaran->find($request->id);
        $pembayaran->nama_siswa = $request->update_nama_siswa;
        $pembayaran->nis = $request->update_nis;
        $pembayaran->kelas = $request->update_kelas;
        $pembayaran->uang_pembangunan = $request->update_uang_pembangunan;
        $pembayaran->uang_spp = $request->update_uang_spp;
        $pembayaran->uang_lab = $request->update_uang_lab;
        $pembayaran->semester_ganjil = $request->update_semester_ganjil;
        $pembayaran->semester_genap = $request->update_semester_genap;
        $pembayaran->uang_psg = $request->update_uang_psg;
        $pembayaran->uang_uas = $request->update_uang_uas;
        $pembayaran->tunggakan = $request->update_tunggakan;

        $pembayaran->save();
        return redirect("/dashboard/pembayaran")->with(["success" => "berhasil mengubah data"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($pembayaran)
    {
        $delete = pembayaran::find($pembayaran);
        $delete->delete();
        return redirect("dashboard/pembayaran");
    }
}
