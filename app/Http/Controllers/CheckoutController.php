<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        return view('checkout.index', compact('cart'));
    }

    public function process(Request $request)
    {
        $request->validate([
            // Add your validation rules for payment, user info, etc.
        ]);

        $cart = session()->get('cart', []);

        // Calculate the total price of the order
        $totalPrice = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        // Create a new order
        $order = Order::create([
            'user_id' => isset(auth()->user()->id) ? auth()->user()->id : 0,
            'total_price' => $totalPrice,
            'items' => json_encode($cart),
        ]);

        session()->forget('cart');

        return redirect()->route('order.confirmation', ['order' => $order->id]);
    }

    public function orderConfirmation($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('order.confirmation', compact('order'));
    }
}
