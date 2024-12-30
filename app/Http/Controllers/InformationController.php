<?php

namespace App\Http\Controllers;

use App\Models\information;
use App\Http\Requests\StoreinformationRequest;
use App\Http\Requests\UpdateinformationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasi = Information::all();
        $ketentuan = DB::table('ketentuans')
        ->select('nama_ketentuan')
        ->get();


        return view('informasi.index', [
            'informasi' => $informasi,
            'ketentuan' => $ketentuan,
            'title' => 'Informasi',
        ]);  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $informasi = Information::all();
        return view('informasi.informasi', compact('informasi'), [
            'title' => 'InformasiCrud',
        ]
    );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreinformationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $file = $request->file('format');
        $namafile = $file->getClientOriginalName();
        $file->storeAs('post-file', $namafile);
        
        Information::create([
                'nama_informasi'=> $request->name_dokumen,
                'format' => $namafile,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            
            ]);
        return redirect('/infocrud')->with('success','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(information $information)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateinformationRequest  $request
     * @param  \App\Models\information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $informasi = Information::find($id);
        $informasi-> nama_informasi      = $request->name_dokumen;
        $informasi-> format            = $request->format;
        $informasi-> updated_at           = date('Y-m-d H:i:s');

        $informasi->save();
        return redirect('/infocrud')->with('success', 'berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informasi = Information::find($id);
        $informasi->delete();

        return redirect('/infocrud')->with('success', 'Data berhasil dihapus');
    }
}
