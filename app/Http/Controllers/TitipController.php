<?php

namespace App\Http\Controllers;

use App\Models\Trans_Titip;
use App\Models\M_Kendaraan;
use Illuminate\Http\Request;
use App\Http\Requests\TitipRequest;

class TitipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titip = Trans_Titip::with('kendaraan')->get();
        // dd($titip);

        return view('titip.index', compact('titip'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kendaraan = M_Kendaraan::doesntHave('titip')->get();

        return view('titip.add', compact('kendaraan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TitipRequest $request)
    {
        $validatedData = $request->all();
        // dd($validatedData);
        Trans_Titip::create($validatedData);
        return redirect()->route('titip.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trans_Titip  $trans_Titip
     * @return \Illuminate\Http\Response
     */
    public function show(Trans_Titip $trans_Titip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trans_Titip  $trans_Titip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trans_Titip $trans_Titip, $id)
    {
        $titip = Trans_Titip::FindOrFail($id);
        $kendaraan = M_Kendaraan::doesntHave('titip')->get();
        // dd($kendaraan);
        return view('titip.edit', compact('titip', 'kendaraan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trans_Titip  $trans_Titip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trans_Titip $trans_Titip, $id)
    {
        $validatedData = $request->all();
        // dd($validatedData);
        $trans_Titip = Trans_Titip::FindOrFail($id);
        $trans_Titip->update($validatedData);
        return redirect()->route('titip.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trans_Titip  $trans_Titip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trans_Titip $trans_Titip, $id)
    {
        $trans_Titip = Trans_Titip::FindOrFail($id);
        $trans_Titip->delete();
        return redirect()->route('titip.index');
    }
}
