<?php

namespace App\Http\Controllers;

use App\Models\Majelis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class MajelisController extends Controller
{
    public function index()
    {
        $majelis = Majelis::get();

        return view('majelis.majelis', compact('majelis'));
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

        ]);

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => "majelis",
        ]);

        Majelis::create([
            'nama' => $request->nama,
            'id_user' => $user->id,
            'alamat'=> $request->alamat,
            'jenis_kelamin'=> $request->jk,
            'no_telp'=> $request->telp,
            'nama_ayah'=>$request->ayah, 
            'nama_ibu'=>$request->ibu, 
        ]);

        return redirect()->route('majelis')->with('success', 'Data Berhasil Ditambahkan!'); 
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
        $majelis = Majelis::find($id);
        return view('majelis.majelis-edit', compact('majelis')); 
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
        ]);

        Majelis::find($request->id_majelis)->update([
            'nama' => $request->nama,
            'alamat'=> $request->alamat,
            'jenis_kelamin'=> $request->jk,
            'no_telp'=> $request->telp,
            'nama_ayah'=>$request->ayah, 
            'nama_ibu'=>$request->ibu, 
         ]);

         return redirect()->route('majelis')->with('success', 'Data Berhasil Di Update!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $majelis = Majelis::find($id)->delete();

        return redirect()->route('majelis'); 
    }

    public function exportpdf()
    {
        $majelis = Majelis::all();
        $pdf = Pdf::loadview('majelis.majelis-pdf', compact('majelis'));
        return $pdf->stream('data-majelis.pdf');
    } 
}
