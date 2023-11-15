<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartList extends Component
{


    public function updateCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $cart = session('cart', []);

        if ($quantity <= 0) {
            unset($cart[$productId]);
        } else {
            $cart[$productId] = $quantity;
        }

        session(['cart' => $cart]);

        // return redirect()->route('cart.index');
    }
    public function render()
    {
        $cart = session('cart', []);
        return view('livewire.cart-list', compact('cart'));
    }
}
