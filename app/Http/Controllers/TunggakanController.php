<?php

namespace App\Http\Controllers;

use App\Models\tunggakan;
use Illuminate\Http\Request;

class TunggakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.tunggakan");
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tunggakan  $tunggakan
     * @return \Illuminate\Http\Response
     */
    public function show(tunggakan $tunggakan)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tunggakan  $tunggakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(tunggakan $tunggakan)
    {
        //
    }
}
