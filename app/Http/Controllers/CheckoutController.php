<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //

    public function index()
    {
        // * ambil data cart
        $cartItems = Cart::where('user_id', Auth::user()->id)->get();

        // * hitung total price
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // * ambil nomor telepon admin
        $adminPhone = User::where('usertype', 'admin')->first()->phone;

        // * kirim data ke view
        return view('user.checkout.index', compact('cartItems', 'totalPrice', 'adminPhone'));
    }

    public function store(Request $request)
    {
        // * step 1: Validasi data order
        $validatedData = $request->validate([
            'buyer_note' => 'required',
        ]);

        // * step 2: konek ke cart user tersebut
        $carts = Cart::where('user_id', Auth::user()->id);
        $userCart = $carts->get();

        // * hitung total price
        $totalPrice = $userCart->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // * step 3: buat order
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'address' => Auth::user()->address,
            'total_price' => $totalPrice,
            'buyer_note' => $validatedData['buyer_note'],
        ]);

        // * step 4: buat order detail dari cart
        foreach ($userCart as $cart) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
            ]);
        }

        // * step 5: hapus data cart
        Cart::where('user_id', Auth::user()->id)->delete();

        // * step 6: redirect ke halaman order
        return redirect()->route('product.index');
    }
}
