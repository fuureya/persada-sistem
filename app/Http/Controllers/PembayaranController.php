<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

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

        // cari by nis
        if($request->has("nis")){
            // $data = DB::table("pembayaran")->where('nis','like',"%".$request->nis."%")->paginate();
            $pembayaran = $pembayaran->where('nis','like',"%".$request->nis."%");
        }

        // rekap by bulan
        if($request->has("rekap")){
            $pembayaran->whereMonth("tanggal_bayar", '=', $request->rekap);
        }

        // paginate awal
        $data = $pembayaran->paginate(10);

        // total uang pembangunan
        function sumPembangunan(){
            $totalPembayaran = pembayaran::all();
            // variabel nilai total uang pembayaran
            $totalUangPembayaran = 0;
            
            foreach($totalPembayaran as $total){
                $totalUangPembayaran += (int)$total["uang_pembangunan"] + (int)$total["uang_pembangunan"];
            }
            return $totalUangPembayaran;
        }

        return view("dashboard.pembayaran", [
            "data" => $data,
            "uang_pembangunan" => sumPembangunan()
           
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
            'nis' => 'required',
            'kelas' => 'required',
            'uang_pembangunan' => 'required',
            'uang_spp' => 'required',
            'uang_lab' => 'required',
            'uang_uas' => 'required',
            'semester_ganjil' => 'required',
            'semester_genap' => 'required',
            'uang_psg' => 'required',
            'tunggakan' => 'required',
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

       if($insert){
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
       $pembayaran->find($request->id);
       $pembayaran->nama_siswa = $request->update_nama_siswa;
       $pembayaran->nama_siswa = $request->update_nis;
       $pembayaran->save();
       return redirect("/dashboard/pembayaran")->with(["success" => "berhasil tambah data"]);
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
