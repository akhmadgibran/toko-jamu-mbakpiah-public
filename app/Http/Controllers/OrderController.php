<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //

    public function indexUser()
    {
        $userOrderAll = Order::where('user_id', Auth::user()->id)->get();
        $userOrderPending = Order::where('user_id', Auth::user()->id)->where('status', 'menunggu')->get();
        $userOrderProcess = Order::where('user_id', Auth::user()->id)->where('status', 'proses')->get();
        $userOrderSuccess = Order::where('user_id', Auth::user()->id)->where('status', 'selesai')->get();
        $userOrderRejected = Order::where('user_id', Auth::user()->id)->where('status', 'ditolak')->get();
        $userOrder = [
            'all' => $userOrderAll,
            'process' => $userOrderProcess,
            'pending' => $userOrderPending,
            'success' => $userOrderSuccess,
            'rejected' => $userOrderRejected
        ];
        return view('user.order.index', compact('userOrder'));
    }

    public function indexAdmin()
    {
        $adminOrderAll = Order::all();
        $adminOrderPending = Order::where('status', 'menunggu')->get();
        $adminOrderProcess = Order::where('status', 'proses')->get();
        $adminOrderSuccess = Order::where('status', 'selesai')->get();
        $adminOrderRejected = Order::where('status', 'ditolak')->get();
        $adminOrder = [
            'all' => $adminOrderAll,
            'process' => $adminOrderProcess,
            'pending' => $adminOrderPending,
            'success' => $adminOrderSuccess,
            'rejected' => $adminOrderRejected
        ];
        return view('admin.order.index', compact('adminOrder'));
    }
}
