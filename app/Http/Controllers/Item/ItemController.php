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

        return redirect()->route('items')->with(['success' => 'Data items berhasil ditambahkan']);
    }

    public function edit($id)
    {
        $uom_s = UoM::all();
        $edit_items = Items::find($id);
        return view('items.edit', [
            'uom_s' => $uom_s,
            'edit_items' => $edit_items,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'uom_id' => 'required|integer',
            'kode_item' => 'required',
            'nama_item' => 'required',
            'jenis_item' => 'required',
            'quantity' => 'required|min:1|numeric|digits_between:1,5',
            'harga_item' => 'required|numeric',
        ]);

        $edit_items = Items::find($id);
        $edit_items->uom_id = $request->uom_id;
        $edit_items->kode_item = $request->kode_item;
        $edit_items->nama_item = $request->nama_item;
        $edit_items->jenis_item = $request->jenis_item;
        $edit_items->quantity = $request->quantity;
        $edit_items->harga_item = $request->harga_item;
        $edit_items->update();
        return redirect()->route('items')->with(['status' => 'Data items berhasil di update']);
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
