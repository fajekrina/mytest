<?php

namespace App\Http\Controllers;

use App\Models\M_Kendaraan;
use Illuminate\Http\Request;
use App\Http\Requests\KendaraanRequest;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kendaraan = M_Kendaraan::all();

        return view('kendaraan.index', compact('kendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kendaraan.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KendaraanRequest $request)
    {
        $validatedData = $request->all();
        // dd($validatedData);
        M_Kendaraan::create($validatedData);
        return redirect()->route('kendaraan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\M_Kendaraan  $m_Kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(M_Kendaraan $m_Kendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\M_Kendaraan  $m_Kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(M_Kendaraan $m_Kendaraan, $id)
    {
        $kendaraan = M_Kendaraan::FindOrFail($id);
        // dd($kendaraan);
        return view('kendaraan.edit', compact('kendaraan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\M_Kendaraan  $m_Kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(KendaraanRequest $request, M_Kendaraan $m_Kendaraan, $id)
    {
        $validatedData = $request->all();
        // dd($validatedData);
        $m_Kendaraan = M_Kendaraan::FindOrFail($id);
        $m_Kendaraan->update($validatedData);
        return redirect()->route('kendaraan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\M_Kendaraan  $m_Kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(M_Kendaraan $m_Kendaraan, $id)
    {
        $m_Kendaraan = M_Kendaraan::FindOrFail($id);
        $m_Kendaraan->delete();
        return redirect()->route('kendaraan.index');
    }
}
