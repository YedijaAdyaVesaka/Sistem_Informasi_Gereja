<?php

namespace App\Http\Controllers;

use App\Models\Jemaat;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class JemaatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jemaat = Jemaat::get();
        return view('jemaat.jemaat', compact('jemaat'));
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
            'nama'=>'required',
            'alamat'=>'required',
            'jk'=>'required',
            'telp'=>'required',
            'ayah'=>'required',
            'ibu'=>'required',
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
            'golongan'=>'required',
        ]);

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => "Jemaat",
        ]);
        
        Jemaat::create([
            'nama' => $request->nama,
            'id_user' => $user->id,
            'alamat'=> $request->alamat,
            'jenis_kelamin'=> $request->jk,
            'no_telp'=> $request->telp,
            'nama_ayah'=>$request->ayah, 
            'nama_ibu'=>$request->ibu, 
            'golongan_jemaat'=>$request->golongan, 
        ]);

        return redirect()->route('jemaat')->with('success', 'Data Berhasil Ditambahkan!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jemaat = Jemaat::find($id);
        return view('jemaat.jemaat-edit', compact('jemaat'));
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
            'nama'=>'required',
            'alamat'=>'required',
            'jk'=>'required',
            'telp'=>'required',
            'ayah'=>'required',
            'ibu'=>'required',
            'golongan'=>'required',
        ]);

        Jemaat::find($request->id_jemaat)->update([
            'nama' => $request->nama,
            'alamat'=> $request->alamat,
            'jenis_kelamin'=> $request->jk,
            'no_telp'=> $request->telp,
            'nama_ayah'=>$request->ayah, 
            'nama_ibu'=>$request->ibu, 
            'golongan_jemaat'=>$request->golongan, 
        ]);

        return redirect()->route('jemaat')->with('success', 'Data Berhasil Di Update!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jemaat = Jemaat::find($id)->delete();

        return redirect()->route('jemaat'); 
    }
    
    public function exportpdf()
    {
        $jemaat = Jemaat::all();
        // return view('jemaat.jemaat-pdf', compact('jemaat'));
        $pdf = Pdf::loadview('jemaat.jemaat-pdf', compact('jemaat'));
        return $pdf->stream('data-jemaat.pdf');
    } 
    

}
