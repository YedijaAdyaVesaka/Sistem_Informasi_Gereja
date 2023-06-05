<?php

namespace App\Http\Controllers;

use App\Models\Jadwalibadah;
use App\Models\Jemaat;
use App\Models\Majelis;
use App\Models\Pelayan;
use App\Models\Pendeta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PelayanController extends Controller
{
    public function index()
    {
        $pelayan = Pelayan::with('jadwal','majelis')->get();
        return view('pelayan.pelayan', compact('pelayan'));
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
        $request->validate([
            'jadwal'=>'required',
            'majelis'=>'required',
        ]);

        
        Pelayan::create([
            'id_jadwal' => $request->jadwal,
            'id_majelis' => $request->majelis,
        ]);

        return redirect()->route('pelayan')->with('success', 'Data Berhasil Ditambahkan!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $jadwal = Jadwalibadah::all();
        $majelis = Majelis::all();
        return view('pelayan.pelayan-entry', compact('jadwal','majelis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelayan = Pelayan::find($id);
        $jadwal = Jadwalibadah::all();
        $majelis = Majelis::all();
        return view('pelayan.pelayan-edit', compact('jadwal','majelis','pelayan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'jadwal'=>'required',
            'majelis'=>'required',
        ]);

        Pelayan::find($request->id_pelayan)->update([
            'id_jadwal' => $request->jadwal,
            'id_majelis' => $request->majelis,
        ]);

        return redirect()->route('pelayan')->with('success', 'Data Berhasil Di Update!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelayan = Pelayan::find($id)->delete();

        return redirect()->route('pelayan'); 
    }

    public function exportpdf()
    {
        $pelayan = Pelayan::all();
        // return view('jemaat.jemaat-pdf', compact('jemaat'));
        $pdf = Pdf::loadview('pelayan.pelayan-pdf', compact('pelayan'));
        return $pdf->stream('data-pelayan.pdf');
    } 
}
