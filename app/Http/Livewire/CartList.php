<?php

namespace App\Http\Livewire;

use App\Models\Admin\Food;
use Livewire\Component;

class CartList extends Component
{
    public $cartcount = '';
    public $cart = '';
    public $foods = '',$totalamount=0;
    public $quantity,$product_id;

    public function mount()
    {
        $this->cart = session('cart', []);
        $this->foods = Food::join('categories','categories.id','=','food.cat')->Orderby('food.id', 'desc')->select('food.*','categories.title')->get();
        $this->cartcount=count($this->cart);
    }

    // public function updateCart(Request $request)
    // {
    //     $productId = $request->input('product_id');
    //     $quantity = $request->input('quantity');
    //     $cart = session('cart', []);
    //      $this->cartcount=count($cart);
    //     if ($quantity <= 0) {
    //         unset($cart[$productId]);
    //     } else {
    //         $cart[$productId] = $quantity;
    //     }
    //     session(['cart' => $cart]);
    //     // return redirect()->route('cart.index');
    // }

    public function render()
    {
        // $totalamount=$totalamount+(($food->amount)*$quantity)
        $carts=session('cart', []);
        $foods = Food::join('categories','categories.id','=','food.cat')->Orderby('food.id', 'desc')->select('food.*','categories.title')->get();
        foreach($carts as $productId => $quantity)
        {
            foreach( $foods as $food)
            {
                if($food->id==$productId)
                {
                    $this->totalamount=$this->totalamount+(($food->amount)*$quantity);
                }
            }

        }
       $this->cart = session('cart', []);
       return view('livewire.cart-list');
    }
}
