<?php

namespace App\Http\Controllers;

use App\Models\unit;
use Illuminate\Http\Request;

use App\Http\Requests\StoreunitRequest;
use App\Http\Requests\UpdateunitRequest;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit as XmlUnit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = unit::all();
        return view('anggota.unit', compact('unit'),[
            'title' => 'UnitCrud',
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreunitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        unit::create([
            'nama_unit' =>$request->nama_unit,
            'deskripsi' =>$request->deskripsi,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        return redirect('/unitcrud')->with('succes', 'data berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateunitRequest  $request
     * @param  \App\Models\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $unit = unit::find($id);
        $unit->nama_unit        = $request->namaunit_edit;
         $unit->deskripsi        = $request->deskripsi_edit;
         $unit->updated_at            = date('Y-m-d H:i:s');
 
         $unit->save();
         return redirect('/unitcrud')->with('success','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        
        $unit = Unit::find($id);
        $unit->delete();
 
        return redirect('/unitcrud')->with('success','Data Berhasil Dihapus');
    }
}
