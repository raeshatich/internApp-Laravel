<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Http\Requests\StoreDaftarRequest;
use App\Http\Requests\UpdateDaftarRequest;
use Illuminate\Http\Request;


class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar = Daftar::all();
        return view('daftar', compact('daftar'),[
            'title' => 'DaftarCrud'
        ]);
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
     * @param  \App\Http\Requests\StoreDaftarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Daftar::create([
            'nama_daftar' => $request->nama_daftar,
            'nik' => $request->nik,
            'jk' => $request->jk,
            'notel' => $request->notel,
            'email' => $request->email,
            'univ' => $request->univ,
            'ps' => $request->ps,
            'ipk' => $request->ipk,
            'cv' => $request->cv,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);
        return redirect('/home')->with('success','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function show(Daftar $daftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function edit(Daftar $daftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDaftarRequest  $request
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDaftarRequest $request, Daftar $daftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Daftar $daftar)
    {
        //
    }
}
