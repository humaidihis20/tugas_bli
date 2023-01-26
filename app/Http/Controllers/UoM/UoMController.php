<?php

namespace App\Http\Controllers\UoM;

use App\Http\Controllers\Controller;
use App\Models\UoM;
use Illuminate\Http\Request;

class UoMController extends Controller
{
    public function index()
    {
        $uom = UoM::all();
        return view('uom.index', ['uom' => $uom]);
    }

    public function create()
    {
        return view('uom.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_uom' => 'required',
            'deskripsi_uom' => 'required'
        ]);

        UoM::create([
            'nama_uom' => $request->nama_uom,
            'deskripsi_uom' => $request->deskripsi_uom,
        ]);
        return redirect()->route('uoms')->with(['success' => 'Data berhasil ditambahkan']);
    }
}
