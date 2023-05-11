<?php

namespace App\Http\Controllers;

use App\Models\pembangunan;
use Illuminate\Http\Request;

class PembangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.pembangunan");
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
     * @param  \App\Models\pembangunan  $pembangunan
     * @return \Illuminate\Http\Response
     */
    public function show(pembangunan $pembangunan)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pembangunan  $pembangunan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pembangunan $pembangunan)
    {
        //
    }
}
