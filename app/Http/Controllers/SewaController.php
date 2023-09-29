<?php

namespace App\Http\Controllers;

use App\Models\Trans_Sewa;
use App\Models\Trans_Titip;
use Illuminate\Http\Request;
use App\Http\Requests\SewaRequest;

class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sewa = Trans_Sewa::join('trans_titip', 'trans_titip.id_titip', '=', 'trans_sewa.id_titip')
        ->join('m_kendaraan', 'm_kendaraan.id_kendaraan', '=', 'trans_titip.id_kendaraan')
        ->get();
        // dd($sewa);

        return view('sewa.index', compact('sewa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sewa.add');
    }

    public function createkendaraan($data)
    {
        return view('sewa.addKendaraan', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SewaRequest $request)
    {
        dd($request->all());
        $validatedData = $request->all();
        // dd($validatedData);
        Trans_Sewa::create($validatedData);
        return redirect()->route('sewa.index');
    }

    public function sewastore(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->all();
        // dd($validatedData);
        Trans_Sewa::create($validatedData);
        return redirect()->route('sewa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trans_Sewa  $trans_Sewa
     * @return \Illuminate\Http\Response
     */
    public function show(Trans_Sewa $trans_Sewa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trans_Sewa  $trans_Sewa
     * @return \Illuminate\Http\Response
     */
    public function edit(Trans_Sewa $trans_Sewa, $id)
    {
        $trans_Sewa = Trans_Sewa::FindOrFail($id);
        // dd($kendaraan);
        return view('sewa.edit', compact('trans_Sewa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trans_Sewa  $trans_Sewa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trans_Sewa $trans_Sewa, $id)
    {
        $validatedData = $request->all();
        // dd($validatedData);
        $trans_Sewa = Trans_Sewa::FindOrFail($id);
        $trans_Sewa->update($validatedData);
        return redirect()->route('sewa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trans_Sewa  $trans_Sewa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trans_Sewa $trans_Sewa)
    {
        $trans_sewa = Trans_Sewa::FindOrFail($id);
        $trans_sewa->delete();
        return redirect()->route('sewa.index');
    }

    public function findKendaraan(Request $request)
    {
        // dd($request->except(['_token']));
        $data = $request->except(['_token']);
        // dd($data['tgl_awal']);
        $kendaraan = Trans_Titip::leftJoin('trans_sewa', 'trans_titip.id_titip', '=', 'trans_sewa.id_titip')
                                    ->join('m_kendaraan', 'm_kendaraan.id_kendaraan', '=', 'trans_titip.id_kendaraan')
                                    // ->select('trans_titip.*')
                                    ->where(function ($query) use ($request) {
                                        $query->whereNull('trans_sewa.id_sewa')
                                            ->orWhere(function ($subquery) use ($request) {
                                                $subquery->where('trans_sewa.tgl_awal', '>', $request->tgl_akhir)
                                                    ->orWhere('trans_sewa.tgl_akhir', '<', $request->tgl_awal);
                                            })
                                            ->orWhereNull('trans_sewa.id_titip'); // Pastikan data titip yang tidak memiliki sewa terkait
                                    })
                                    ->orWhere(function ($query) use ($request) {
                                        $query->where('trans_sewa.tgl_awal', '>', $request->tgl_akhir)
                                            ->orWhere('trans_sewa.tgl_akhir', '<', $request->tgl_awal);
                                    })
                                    ->orWhere(function ($query) use ($request) {
                                        $query->where('trans_sewa.tgl_awal', '<', $request->tgl_awal)
                                            ->where('trans_sewa.tgl_akhir', '>', $request->tgl_akhir);
                                    })
                                    ->orWhere(function ($query) use ($request) {
                                        $query->whereNull('trans_sewa.id_sewa')
                                            ->orWhere(function ($subquery) use ($request) {
                                                $subquery->where('trans_sewa.tgl_awal', '>', $request->tgl_awal)
                                                    ->orWhere('trans_sewa.tgl_akhir', '<', $request->tgl_akhir);
                                            });
                                    })
                                    ->get();

        // dd($kendaraan);                    


        // return response()->json($data);
        return view('sewa.addKendaraan', compact('kendaraan', 'data'));
    }
}
