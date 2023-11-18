<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Addtocart extends Component
{

    public $food_id='';

    public function mount($food)
    {
        $this->food_id= $food->id;
    }

    public function like()
    {
        dd("hi");
    }
    // public function addToCarts($id)
    // {
    //     $food = $id;
    //     $quantity = 1;

    //     $cart = session('cart', []);
    //     if (isset($cart[$food])) {
    //         $cart[$food] += $quantity;
    //     } else {
    //         $cart[$food] = $quantity;
    //     }
    //     session(['cart' => $cart]);
    //     return redirect(route('contact'))->with('status', 'Contact Enquiry  Successfully Submitted');

    // }

    public function render()
    {
       return view('livewire.addtocart');
    }
}
