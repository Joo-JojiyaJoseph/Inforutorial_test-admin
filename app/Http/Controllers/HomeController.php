<?php

namespace App\Http\Controllers;

use App\Models\Admin\News;
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
        return view('about');
    }
    public function contact()
    {
        return view('contact');
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
        return view('checkout');
    }
    public function dish($id)
    {
        $cat=$id;
        return view('shop',compact('cat'));
    }
    public function menu()
    {
        return view('shop');
    }

    public function contactPost(Request $request)
    {
        $subject = 'Contact Enquiry';
        $message = 'Name : '.$request->name. '<br>Email : '.$request->email. '<br>Phone : '.$request->phone. '<br>Message : '.$request->message;
        Mail::to('')->send(new Order($message, $subject));
        return redirect(route('contact'))->with('status', 'Contact Enquiry  Successfully Submitted');
    }


}
