<?php

namespace App\Http\Controllers;

use App\Models\Pendeta;
use App\Models\Renungan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class RenunganController extends Controller
{
    public function index()
    {
        $renungan = Renungan::get();
        return view('renungan.renungan', compact('renungan'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'judul'=>'required',
            'pendeta'=>'required',
            'bacaan'=>'required',
            'isi'=>'required',
            'tanggal'=>'required',

        ]);

        Renungan::create([
            'judul' => $request->judul,
            'id_pendeta' => $request->pendeta,
            'bacaan'=> $request->bacaan,
            'isi_renungan'=> $request->isi,
            'tanggal'=> $request->tanggal,
        ]);

        return redirect()->route('renungan')->with('success', 'Data Berhasil Ditambahkan!');
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
        return view('renungan.renungan-entry', compact('pendeta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $renungan = Renungan::find($id);
        $pendeta = Pendeta::all();
        return view('renungan.renungan-edit', compact('pendeta','renungan'));

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
            'judul'=>'required',
            'bacaan'=>'required',
            'isi'=>'required',
            'tanggal'=>'required',

        ]);
        
        Renungan::find($request->id_renungan)->update([
            'judul' => $request->judul,
            'bacaan'=> $request->bacaan,
            'isi_renungan'=> $request->isi,
            'tanggal'=> $request->tanggal,
            
        ]);

        return redirect()->route('renungan')->with('success', 'Data Berhasil Di Update!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $renungan = Renungan::find($id)->delete();

        return redirect()->route('renungan'); 
    }

    public function exportpdf()
    {
        $renungan = Renungan::all();
        $pdf = Pdf::loadview('renungan.renungan-pdf', compact('renungan'));
        return $pdf->stream('renungan.pdf');
    }
}