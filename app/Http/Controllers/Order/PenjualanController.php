<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index()
    {
        $sale = Purchase::with('price')->get();
        return view('shopping.penjualan.index', compact('sale'));
    }

    public function show(Request $request)
    {
        $date1 = substr($request->search, 0, 10);
        $date2 = substr($request->search, 13, 10);

        $sale = Purchase::with('price')
            ->whereBetween('tanggal', [$date1, $date2])
            ->get();

        $transaction = DB::table('purchases')
            ->whereBetween('tanggal', [$date1, $date2])
            ->count();

        $total_price = DB::table('purchases')
            ->whereBetween('tanggal', [$date1, $date2])
            ->sum('harga_item');
        $total = number_format($total_price, 0, ".", ".");

        return view('shopping.penjualan.index', compact('sale', 'transaction', 'total'));
    }
}
