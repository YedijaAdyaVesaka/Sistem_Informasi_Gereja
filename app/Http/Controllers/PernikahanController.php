<?php

namespace App\Http\Controllers;

use App\Models\Jemaat;
use App\Models\Pendeta;
use App\Models\Pernikahan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PernikahanController extends Controller
{
    public function index()
    {
        $pernikahan = Pernikahan::with('pendeta', 'jemaat_wanita', 'jemaat_pria')->get();
        return view('pernikahan.pernikahan', compact('pernikahan'));
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
            'jemaat_pria'=>'required',
            'jemaat_wanita'=>'required',
            'tanggal'=>'required',
        
               
        ]);

        Pernikahan::create([
            'id_pendeta' => $request->pendeta,
            'id_jemaat_pria' => $request->jemaat_pria,
            'id_jemaat_wanita' => $request->jemaat_wanita,
            'tanggal_pernikahan'=> $request->tanggal,
        ]);

        return redirect()->route('pernikahan')->with('success', 'Data Berhasil Ditambahkan!'); 

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
        $jemaat = Jemaat::all();
        return view('pernikahan.pernikahan-entry',compact('pendeta','jemaat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pernikahan = Pernikahan::find($id);
        $pendeta = Pendeta::all();
        $jemaat = Jemaat::all();
        return view('pernikahan.pernikahan-edit', compact('pendeta','jemaat','pernikahan'));
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
            'jemaat_pria'=>'required',
            'jemaat_wanita'=>'required',
            'tanggal'=>'required',
            
    ]);

        Pernikahan::find($request->id_pernikahan)->update([
            'id_pendeta' => $request->pendeta,
            'id_jemaat_pria' => $request->jemaat_pria,
            'id_jemaat_wanita' => $request->jemaat_wanita,
            'tanggal_pernikahan'=> $request->tanggal,
        ]);

        return redirect()->route('pernikahan')->with('success', 'Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pernikahan = Pernikahan::find($id)->delete();

        return redirect()->route('pernikahan'); 
    }

    public function exportpdf()
    {
        $pernikahan = Pernikahan::all();
        // return view('jemaat.jemaat-pdf', compact('jemaat'));
        $pdf = Pdf::loadview('pernikahan.pernikahan-pdf', compact('pernikahan'));
        return $pdf->stream('data-pernikahan.pdf');
    } 
}