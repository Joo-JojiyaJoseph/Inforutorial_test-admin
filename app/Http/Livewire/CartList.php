<?php

namespace App\Http\Livewire;

use App\Models\Admin\Food;
use Livewire\Component;

class CartList extends Component
{
    public $cartcount = '';
    public function mount()
    {

        $cart = session('cart', []);
        $this->cartcount=count($cart);
    }

    public function updateCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $cart = session('cart', []);
         $this->cartcount=count($cart);

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
        $foods = Food::join('categories','categories.id','=','food.cat')->Orderby('food.id', 'desc')->select('food.*','categories.title')->get();
        return view('livewire.cart-list', compact('cart'));
    }
}
