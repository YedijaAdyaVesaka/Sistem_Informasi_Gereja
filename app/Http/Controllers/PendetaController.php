<?php

namespace App\Http\Controllers;

use App\Models\Jemaat;
use App\Models\Pendeta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
class PendetaController extends Controller
{
    public function index()
    {
        $pendeta = Pendeta::get();
        return view('pendeta.pendeta', compact('pendeta'));
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
            'nama'=>'required',
            'alamat'=>'required',
            'jk'=>'required',
            'telp'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => "pendeta",
        ]);
        
        Pendeta::create([
            'nama' => $request->nama,
            'id_user' => $user->id,
            'alamat'=> $request->alamat,
            'jenis_kelamin'=> $request->jk,
            'no_telp'=> $request->telp,
        ]);

        return redirect()->route('pendeta')->with('success', 'Data Berhasil Ditambahkan!'); 
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
        $pendeta = Pendeta::find($id);
        return view('pendeta.pendeta-edit', compact('pendeta'));
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
        ]);

        Pendeta::find($request->id_pendeta)->update([
            'nama' => $request->nama,
            'alamat'=> $request->alamat,
            'jenis_kelamin'=> $request->jk,
            'no_telp'=> $request->telp,
        ]);

        return redirect()->route('pendeta')->with('success', 'Data Berhasil Di Update!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendeta = Pendeta::find($id)->delete();

        return redirect()->route('pendeta'); 
    }

    public function exportpdf()
    {
        $pendeta = Pendeta::all();
        // return view('jemaat.jemaat-pdf', compact('jemaat'));
        $pdf = Pdf::loadview('pendeta.pendeta-pdf', compact('pendeta'));
        return $pdf->stream('data-pendeta.pdf');
    } 
}
