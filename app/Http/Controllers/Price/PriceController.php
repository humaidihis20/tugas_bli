<?php

namespace App\Http\Controllers\Price;

use App\Http\Controllers\Controller;
use App\Models\Items;
use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        $price = Price::all();
        return view('price.index', ['price' => $price]);
    }

    public function create()
    {
        $items = Items::all();

        return  view('price.create', [
            'items' => $items,
            // 'hargaSesudahPajak' => $hargaSesudahPajak
        ]);
    }

    public function store(Request $request)
    {
        $priceStore = $request->validate([
            'nama_item_id' => 'required',
            'harga_sebelum_pajak' => 'required|integer',
            'harga_sesudah_pajak' => 'required|integer',
        ]);

        // dd($priceStore);
        Price::create($priceStore);
        return redirect()->route('price')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function getinfo($id)
    {
        $info = Items::where('id', $id)->first();
        return response()->json($info);
    }
}
