<?php

namespace App\Http\Controllers;

use App\Models\Tata;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class TataController extends Controller
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
        $tata = Tata::all();
        return view('syarat.tata', compact('tata'), [
            'title' => 'TataCrud',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tata::create([
            'nama_tata' => $request->nama_tata,            
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);
        return redirect('/tatacrud')->with('success', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tata  $tata
     * @return \Illuminate\Http\Response
     */
    public function show(Tata $tata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tata  $tata
     * @return \Illuminate\Http\Response
     */
    public function edit(Tata $tata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTataRequest  $request
     * @param  \App\Models\Tata  $tata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tata = Tata::find($id);
        $tata->nama_tata    =$request->namatata_edit;
        $tata->updated_at     = date('Y-m-d H:i:s');

        $tata->save();
        return redirect('/tatacrud')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tata  $tata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tata = Tata::find($id);
        $tata->delete();

        return redirect('/tatacrud')->with('success', 'Data berhasil dihapus');
    }
}
