<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display the shopping cart page.
     */
    public function index()
    {
        return view('cart.index');
    }

    /**
     * Add an item to the cart.
     */
    public function add(Request $request)
    {
        return response()->json(['message' => 'Item added to cart']);
    }

    /**
     * Complete the checkout process.
     */
    public function checkout(Request $request)
    {
        return response()->json(['message' => 'Checkout completed']);
    }
}
