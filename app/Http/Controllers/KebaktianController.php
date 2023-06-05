<?php

namespace App\Http\Controllers;

use App\Models\Kebaktian;
use App\Models\Majelis;
use App\Models\Pendeta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KebaktianController extends Controller
{
    public function index()
    {
        $kebaktian = Kebaktian::with('pendeta','majelis')->get();
        return view('kebaktian.kebaktian', compact('kebaktian'));
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
            
        ]);

        Kebaktian::create([
            'id_pendeta' => $request->pendeta,
            'id_majelis' => $request->majelis,
            'nama'=> $request->nama,
            'tempat'=> $request->tempat,
            'tanggal'=> $request->tanggal,
        ]);

        return redirect()->route('kebaktian')->with('success', 'Data Berhasil Ditambahkan!'); 

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
        return view('kebaktian.kebaktian-entry', compact('pendeta','majelis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kebaktian = Kebaktian::find($id);
        $pendeta = Pendeta::all();
        $majelis = Majelis::all();
        return view('kebaktian.kebaktian-edit', compact('pendeta','majelis','kebaktian'));
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
        ]);

        Kebaktian::find($request->id_kebaktian)->update([
            'id_pendeta' => $request->pendeta,
            'id_majelis' => $request->majelis,
            'nama'=> $request->nama,
            'tempat'=> $request->tempat,
            'tanggal'=> $request->tanggal,
        ]);

        return redirect()->route('kebaktian')->with('success', 'Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kebaktian = Kebaktian::find($id)->delete();

        return redirect()->route('kebaktian');
    }

    public function exportpdf()
    {
        $kebaktian = Kebaktian::all();
        $pdf = Pdf::loadview('kebaktian.kebaktian-pdf', compact('kebaktian'));
        return $pdf->stream('kebaktian.pdf');
    }
}