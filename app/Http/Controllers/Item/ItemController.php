<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Models\Items;
use App\Models\UoM;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Items::with(['uom'])->get();
        return view('items.index', ['items' => $items]);
    }

    public function create()
    {
        $uom_s = UoM::all();
        $kode_item = IdGenerator::generate(['table' => 'items', 'field' => 'kode_item', 'length' => 7, 'prefix' => 'ITM-']);
        // $kode_item = Items::kodeItem();
        return view('items.create', [
            'kode_item' => $kode_item,
            'uom_s' => $uom_s,
        ]);
    }

    public function store(Request $request)
    {
        $ItemStore = $request->validate([
            'uom_id' => 'required|integer',
            'kode_item' => 'required',
            'nama_item' => 'required',
            'jenis_item' => 'required',
            'quantity' => 'required|min:1|numeric|digits_between:1,5',
            'harga_item' => 'required|numeric',
        ]);

        // dd($ItemStore);
        Items::create($ItemStore);

        return redirect()->route('items')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function getinfo($id)
    {
        $info = UoM::where('nama_uom', $id)->first();
        return response()->json($info);
    }

    public function destroy($id)
    {
        Items::where('id', $id)->delete();
        return redirect()->route('items');
    }
}
