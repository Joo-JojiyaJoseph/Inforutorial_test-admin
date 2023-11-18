<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cartbutton extends Component
{
    public $cartcount = '';
    public function render()
    {
        $cart = session('cart', []);
        $this->cartcount=count($cart);
        return view('livewire.cartbutton');
    }
}
