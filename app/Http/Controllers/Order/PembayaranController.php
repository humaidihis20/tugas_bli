<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Payments;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $payment = Payments::with(['purchase'])->get();
        return view('shopping.pembayaran.index', ['payment' => $payment]);
    }
}
