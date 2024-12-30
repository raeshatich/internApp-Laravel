<?php

namespace App\Http\Controllers;

use App\Models\Posisi;
use Illuminate\Http\Request;


class PosisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posisi = Posisi::all();
        return view('anggota.posisi', compact('posisi'),[
            'title' => 'PosisiCrud',
        ]);
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
     * @param  \App\Http\Requests\StorePosisiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Posisi::create([
            'nama_posisi' =>$request->nama_posisi,
            'created_at' => date('Y-m-d H:i:s'),
             'updated_at'=> date('Y-m-d H:i:s'),
        ]);

        return redirect('/posisicrud')->with('succes', 'data berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posisi  $posisi
     * @return \Illuminate\Http\Response
     */
    public function show(Posisi $posisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posisi  $posisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Posisi $posisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePosisiRequest  $request
     * @param  \App\Models\Posisi  $posisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $posisi = Posisi::find($id);
 
         $posisi->nama_posisi        = $request->namaposisi_edit;
         $posisi->updated_at            = date('Y-m-d H:i:s');
 
         $posisi->save();
         return redirect('/posisicrud')->with('success','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posisi  $posisi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posisi = Posisi::find($id);
         $posisi->delete();
 
         return redirect('/posisicrud')->with('success','Data Berhasil Dihapus');
    }
}
