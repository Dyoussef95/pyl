<?php

namespace App\Http\Controllers;

use App\GrupoFamiliar;
use App\Interno;
use Illuminate\Http\Request;

class GrupoFamiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Interno $interno)
    {
        $gruposFamiliares = GrupoFamiliar::get();
        
        

        return view('GruposFamiliares.index',compact('gruposFamiliares','interno'));
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
     * @param  \App\GrupoFamiliar  $grupoFamiliar
     * @return \Illuminate\Http\Response
     */
    public function show(GrupoFamiliar $grupoFamiliar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GrupoFamiliar  $grupoFamiliar
     * @return \Illuminate\Http\Response
     */
    public function edit(GrupoFamiliar $grupoFamiliar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GrupoFamiliar  $grupoFamiliar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GrupoFamiliar $grupoFamiliar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GrupoFamiliar  $grupoFamiliar
     * @return \Illuminate\Http\Response
     */
    public function destroy(GrupoFamiliar $grupoFamiliar)
    {
        //
    }
}
