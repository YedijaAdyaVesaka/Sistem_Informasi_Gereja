<?php

namespace App\Http\Controllers;

use App\Models\Jadwalibadah;
use App\Models\Majelis;
use App\Models\Pendeta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwalibadah::with('pendeta','majelis')->get();
        return view('jadwalibadah.jadwal', compact('jadwal'));
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
            'pendeta'=>'required',
            'majelis'=>'required',
            'nama'=>'required',
            'tempat'=>'required',
            'tanggal'=>'required',
            'bacaan'=>'required',
        
        ]);
        
        Jadwalibadah::create([
            'id_pendeta' => $request->pendeta,
            'id_majelis' => $request->majelis,
            'nama'=> $request->nama,
            'tempat'=> $request->tempat,
            'tanggal'=> $request->tanggal,
            'bacaan' => $request->bacaan,

        ]);

        return redirect()->route('jadwal')->with('success', 'Data Berhasil Ditambahkan!');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pendeta = Pendeta::all();
        $majelis = Majelis::all();
        return view('jadwalibadah.jadwal-entry', compact('pendeta','majelis'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal = Jadwalibadah::find($id);
        $pendeta = Pendeta::all();
        $majelis = Majelis::all();
        return view('jadwalibadah.jadwal-edit', compact('pendeta','majelis','jadwal'));
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
            'pendeta'=>'required',
            'majelis'=>'required',
            'nama'=>'required',
            'tempat'=>'required',
            'tanggal'=>'required',
            'bacaan'=>'required',
        
        ]);

        Jadwalibadah::find($request->id_jadwal)->update([
            'id_pendeta' => $request->pendeta,
            'id_majelis' => $request->majelis,
            'nama'=> $request->nama,
            'tempat'=> $request->tempat,
            'tanggal'=> $request->tanggal,
            'bacaan' => $request->bacaan,
        ]);
        
        return redirect()->route('jadwal')->with('success', 'Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = Jadwalibadah::find($id)->delete();

        return redirect()->route('jadwal'); 
    }

    public function exportpdf()
    {
        $jadwal = Jadwalibadah::all();
        $pdf = Pdf::loadview('jadwalibadah.jadwal-pdf', compact('jadwal'));
        return $pdf->stream('jadwal.pdf');
    }
}
