<?php

namespace App\Http\Controllers;

use App\Models\Ketentuan;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\StoreKetentuanRequest;
use App\Http\Requests\UpdateKetentuanRequest;
use Illuminate\Http\Request;

class KetentuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ketentuan = DB::table('ketentuans')
        ->select('nama_ketentuan')
        ->get();
        return view('informasi.ketentuan', [
            'ketentuan' => $ketentuan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ketentuan = Ketentuan::all();
        return view('informasi.ketentuan', compact('ketentuan'),[
            'title' => 'KetentuanCrud',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKetentuanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ketentuan::create([
            'nama_ketentuan' => $request->nama_ketentuan,            
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);
        return redirect('/ketentuancrud')->with('success', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ketentuan  $ketentuan
     * @return \Illuminate\Http\Response
     */
    public function show(Ketentuan $ketentuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ketentuan  $ketentuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Ketentuan $ketentuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKetentuanRequest  $request
     * @param  \App\Models\Ketentuan  $ketentuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ketentuan = Ketentuan::find($id);
        $ketentuan->nama_ketentuan    =$request->namaketentuan_edit;
        $ketentuan->updated_at     = date('Y-m-d H:i:s');

        $ketentuan->save();
        return redirect('/ketentuancrud')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ketentuan  $ketentuan
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $ketentuan = Ketentuan::find($id);
        $ketentuan->delete();

        return redirect('/ketentuancrud')->with('success', 'Data berhasil dihapus');
    }
}
