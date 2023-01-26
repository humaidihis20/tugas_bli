<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Order\PembelianController;
use App\Models\Items;
use App\Models\Payments;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $items = Items::all()->count();
        $users = User::all()->count();
        $orders = Purchase::all()->count();
        $payments = Payments::where('status_pembayaran', 'lunas')->count();
        return view('dashboard.index', [
            'items' => $items,
            'users' => $users,
            'orders' => $orders,
            'payments' => $payments,
        ]);
    }

    public function users()
    {
        $users = User::all();
        return view('users.index', [
            'users' => $users,
        ]);
    }
}
