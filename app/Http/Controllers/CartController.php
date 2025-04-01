<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogue;

class CartController extends Controller
{
    public function add($id)
    {
        // Get the item from the catalogue
        $item = Catalogue::find($id);

        if (!$item) {
            return redirect()->route('catalogue.index')->with('error', 'Item not found.');
        }

        // Retrieve the cart from the session
        $cart = session()->get('cart', []);

        // Check if the item already exists in the cart
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $item->name,
                'description' => $item->description,
                'price' => $item->price,
                'quantity' => 1,
                'image' => $item->image_url, // Assuming you have this in your item
            ];
        }

        // Save the cart back to the session
        session()->put('cart', $cart);

        return redirect()->route('catalogue')->with('success', 'Item added to cart!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity'] -= 1;
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Item updated successfully');
            } else {
                unset($cart[$id]);
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Item removed successfully');
            }
        }

        return redirect()->back()->with('success', 'Item removed successfully');
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }
}
