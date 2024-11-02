<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

    // * Route index controller for index
    // * 
    public function index()
    {
        // * Get cart items for the current user
        $cartItems = Cart::where('user_id', Auth::user()->id)->get();

        // * Calculate the total price for the current user
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // * Pass the cart items and total price to the view
        return view('user.cart.index', compact('cartItems', 'totalPrice'));
    }

    // public function show()
    // {
    //     $data = Cart::where('user_id', Auth::user()->id)->get();
    //     return view('cart.show', ['carts' => $data]);
    // }

    public function store(Request $request)
    {
        // * Validate the incoming req data before storing (divalidasi dulu, sebelum disimpan ke database)
        // * preventing inconsistent data from being stored (mencegah data yang tidak sesuai disimpan ke database)
        $validatedData = $request->validate([

            'user_id' => 'required|numeric',
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        // * check apakah item product sudah ada di database
        // * memeriksa apakah item product sudah ada di database
        $cart = Cart::where('user_id', $validatedData["user_id"])->where('product_id', $validatedData["product_id"])->first();
        if ($cart) {
            $cart->quantity = $cart->quantity + $validatedData["quantity"];
            $cart->save();
            return redirect()->route('user.cart.index')->with('success', 'Product added to cart successfully!');
        } else {
            // * Store data to database
            // * Menyimpan data ke database
            $cart = Cart::create([
                'user_id' => $validatedData["user_id"],
                'product_id' => $validatedData["product_id"],
                'quantity' => $validatedData["quantity"],
            ]);
        }

        // Cart::create([
        //     'user_id' => $validatedData["user_id"],
        //     'product_id' => $validatedData["product_id"],
        //     'quantity' => $validatedData["quantity"],
        // ]);

        // ! redirect back
        // ! mengalihkan kembali
        return redirect()->route('user.cart.index')->with('success', 'Product added to cart successfully!');
    }


    // * method update quantity at cart
    public function updateQuantity(Request $request, $id)
    {
        //* Validate the quantity input
        $validatedData = $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        //* Find the cart item and update its quantity
        $cartItem = Cart::findOrFail($id);
        $cartItem->quantity = $validatedData['quantity'];
        $cartItem->save();

        //* Redirect back to the cart page
        return redirect()->route('user.cart.index')->with('success', 'Quantity updated successfully!');
    }

    // * method delete cart item
    // * menghapus item cart
    public function destroy($id)
    {
        // Find the cart item and delete it
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        // Redirect back to the cart page
        return redirect()->route('user.cart.index')->with('success', 'Product removed from cart successfully!');
    }
}
