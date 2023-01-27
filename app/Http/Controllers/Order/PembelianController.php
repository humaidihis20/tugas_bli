<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Items;
use App\Models\Purchase;
use App\Models\UoM;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;
use JetBrains\PhpStorm\Pure;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Purchase::all();
        return view('shopping.order.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Items::all();
        $uoms = UoM::all();
        $id = UniqueIdGenerator::generate(['table' => 'purchases', 'field' => 'invoice', 'length' => 15, 'prefix' => 'INV/', 'suffix' => date('/m/Y')]);
        return view('shopping.order.create', [
            'items' => $items,
            'id' => $id,
            'uoms' => $uoms,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchaseStore = $request->validate([
            'uoms_id' => 'required',
            'id_quantity' => 'required',
            'tanggal' => 'required',
            'nama_item_id' => 'required',
            'sku' => 'required|numeric',
            'invoice' => 'required',
            'harga_item' => 'required',
            'total' => 'required',
            'quantity' => 'required',
            'subtotal' => 'required',
        ]);

        Purchase::create($purchaseStore);
        $updateQty = Items::findOrFail($request->id_quantity);
        $updateQty->quantity -= $request->quantity;
        $updateQty->update();

        return redirect()->route('purchase')->with(['success' => 'Order berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $pembelian)
    {
        //
    }

    public function getinfo($id)
    {
        $info = Items::where('id', $id)->first();
        return response()->json($info);
    }
}
