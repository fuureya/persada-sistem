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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function show(lab $lab)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function destroy(lab $lab)
    {
        //
    }
}
