<?php

namespace App\Http\Controllers;

use App\Models\Admin\About;
use App\Models\Admin\Address;
use App\Models\Admin\Category;
use App\Models\Admin\Food;
use App\Models\Admin\News;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use App\Models\Admin\Slider;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $newss = News::Orderby('id', 'desc')->get();
        $sliders = Slider::Orderby('id', 'desc')->get();
        return view('index',compact('sliders','newss'));
    }
    public function about()
    {
        $abouts = About::Orderby('id', 'desc')->first();
        return view('about',compact('abouts'));
    }
    public function contact()
    {
        return view('contact');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function myaccount()
    {
        return view('dashboard');
    }
    public function team()
    {
        return view('team');
    }
    public function table()
    {
        return view('table');
    }

    public function cart()
    {
        return view('cart');
    }

    public function checkout()
    {
        $totalamount=0;
        $finalamount=0;
        $carts=session('cart', []);
        $foods = Food::join('categories','categories.id','=','food.cat')->Orderby('food.id', 'desc')->select('food.*','categories.title')->get();
        foreach($carts as $productId => $quantity)
        {
            foreach( $foods as $food)
            {
                if($food->id==$productId)
                {
                    $totalamount=$totalamount+(($food->amount)*$quantity);
                }
            }
        }
        $finalamount=$finalamount+$totalamount+env('SHIPPING');
        return view('checkout',compact('foods','carts','totalamount','finalamount'));
    }

    public function add_to_cart($id)
    {
        $food = $id;
        $quantity = 1;

        $cart = session('cart', []);
        if (isset($cart[$food])) {
            $cart[$food] += $quantity;
        } else {
            $cart[$food] = $quantity;
        }
        session(['cart' => $cart]);
        return redirect(route('cart'))->with('status', 'Added Successfully');

    }

    public function dish($id)
    {
        $cat = Category::where('id',$id)->Orderby('id', 'asc')->first();
        $dishes = Food::join('categories','categories.id','=','food.cat')->where('categories.id',$id)->Orderby('food.id', 'desc')->select('food.*','categories.title')->get();
        return view('dish',compact('cat','dishes'));
    }
    public function menu()
    {
        return view('shop');
    }

    public function order(Request $request)
    {

        $request->validate([
            'email' => 'email',
         ]);

        $totalamount=0;$finalamount=0;
        $carts=session('cart', []);
        $product='';$quantitys='';$price='';
        $foods = Food::join('categories','categories.id','=','food.cat')->Orderby('food.id', 'desc')->select('food.*','categories.title')->get();
        foreach($carts as $productId => $quantity)
        {
        $product .= $productId.', ';
        $quantitys .= $quantity.', ';
            foreach( $foods as $food)
            {
                if($food->id==$productId)
                {
                    $totalamount=$totalamount+(($food->amount)*$quantity);
                }
            }
        }
        $finalamount=$finalamount+$totalamount+env('SHIPPING');

         $data = [
             'name' => $request->name,
             'phone' => $request->phone,
             'email' => $request->email,
             'housename' => $request->housename,
             'country' => $request->country,
             'state' => $request->state,
             'zipcode' => $request->zipcode,
             'user_id' =>"guest",
         ];
         $address_id=Address::create($data);

         $data1 = [
            'product' =>$product,
            'quantity' =>$quantitys,
            'totalamount' =>$finalamount,
            'type' => $request->type,
            'user' =>"guest",
            'Status' => "new",
            'address_id' =>$address_id->id,
        ];
        Order::create($data1);
        return redirect(route('menu'))->with('status', 'Order Placed Sucessfully, We Will contact you Soon.');

    }

    // public function contactPost(Request $request)
    // {
    //     $subject = 'Contact Enquiry';
    //     $message = 'Name : '.$request->name. '<br>Email : '.$request->email. '<br>Phone : '.$request->phone. '<br>Message : '.$request->message;
    //     Mail::to('')->send(new Order($message, $subject));
    //     return redirect(route('contact'))->with('status', 'Contact Enquiry  Successfully Submitted');
    // }


}
