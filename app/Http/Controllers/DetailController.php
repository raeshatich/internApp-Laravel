<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DetailController extends Controller
{
    public function index($id)
    {
        $unit = DB::table('units')
        ->select('nama_unit','deskripsi')
        ->where('id', $id)
        ->first();
        
        return view('detail', compact('unit'),[
            'title' => 'Detail'
        ]);
    }
}
