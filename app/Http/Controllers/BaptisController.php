<?php

namespace App\Http\Controllers;

use App\Models\Baptis;
use App\Models\Jemaat;
use App\Models\Pendeta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BaptisController extends Controller
{
    public function index()
    {
        $baptis = Baptis::with('pendeta','jemaat')->get();
        return view('baptis.baptis', compact('baptis'));
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
            'jemaat'=>'required',
            'tanggal'=>'required',
            
        ]);

        Baptis::create([
            'id_pendeta' => $request->pendeta,
            'id_jemaat' => $request->jemaat,
            'tanggal_baptis'=> $request->tanggal,
        ]);

        return redirect()->route('baptis')->with('success', 'Data Berhasil Ditambahkan!');


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
        return view ('baptis.baptis-entry', compact('pendeta','jemaat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $baptis = Baptis::find($id);
        $pendeta = Pendeta::all();
        $jemaat = Jemaat::all();
        return view('baptis.baptis-edit', compact('pendeta','jemaat','baptis'));
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
            'jemaat'=>'required',
            'tanggal'=>'required',
        
        ]);

        Baptis::find($request->id_baptis)->update([
            'id_pendeta' => $request->pendeta,
            'id_jemaat' => $request->jemaat,
            'tanggal_baptis'=> $request->tanggal,
        ]);

        return redirect()->route('baptis')->with('success', 'Data Berhasil Di Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baptis = Baptis::find($id)->delete();

        return redirect()->route('baptis'); 
    }

    public function exportpdf()
    {
        $baptis = Baptis::all();
        // return view('jemaat.jemaat-pdf', compact('jemaat'));
        $pdf = Pdf::loadview('baptis.baptis-pdf', compact('baptis'));
        return $pdf->stream('data-baptis.pdf');
    } 
}