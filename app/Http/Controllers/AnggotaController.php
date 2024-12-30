<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Unit;
use App\Models\Posisi;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota  = Anggota::join('units', 'units.id', '=', 'anggotas.unit_id')
        ->join('posisis','posisis.id','=','anggotas.posisi_id')
        ->get();

        $unit = Unit::all();

        $posisi = Posisi::all();
        return view('anggota.index',
        compact('anggota','unit','posisi'),[
            'title' => 'Anggota',
        ]);
    }

    public function crud()
    {
       
        $anggota  = Anggota::join('units', 'units.id', '=', 'anggotas.unit_id')
        ->join('posisis','posisis.id','=','anggotas.posisi_id')
        ->get();

        $unit = Unit::all();
        $posisi = Posisi::all();
        return view('anggota.crud',
        compact('anggota','unit','posisi'),[
            'title' => 'AnggotaCrud',
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Anggota::create([
            'unit_id'=>$request->unit_id,
            'nama_anggota'=> $request->nama_anggota,
            'posisi_id'=>$request->posisi_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')

        ]);

        return redirect('/anggotacrud')->with('success','Data Berhasil Disimpan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $anggota = Anggota::find($id);
        $anggota-> unit_id               = $request->unit_id;
        $anggota-> nama_anggota           = $request->nama_anggota;
        $anggota-> posisi_id              = $request->posisi_id;
        $anggota-> updated_at            = date('Y-m-d H:i:s');

        $anggota->save();
        return redirect('/anggotacrud')->with('success','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();

        return redirect('/anggotacrud')->with('success','Data Berhasil Dihapus');
    }
}
