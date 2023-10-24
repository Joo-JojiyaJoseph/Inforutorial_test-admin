<?php

namespace App\Http\Controllers;

use App\Mail\Order;
use App\Mail\Career;
use App\Models\Admin\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\Account;
use App\Models\admin\application;
use App\Models\Admin\Category;
use App\Models\Admin\country;
use App\Models\Admin\Food;
use App\Models\Admin\News;
use App\Models\Admin\Privacypolicy;
use App\Models\Admin\Refund;
use App\Models\Admin\Terms;
use App\Models\Admin\Slider;
use Illuminate\Support\Facades\Redirect;

use App\Models\Admin\tour;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $cats = Category::Orderby('id', 'desc')->get();
        $foods = Food::Orderby('id', 'desc')->get();
        $testimonials = Testimonial::Orderby('id', 'desc')->get();
        return view('index',compact('testimonials','cats','foods'));
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
    public function shop($id)
    {
        $cat=$id;
        return view('shop',compact('cat'));
    }


    public function contactPost(Request $request)
    {

        $request->validate([
            'g-recaptcha-response' => 'required',
         ]);

        $subject = 'Contact Enquiry';
        $message = 'Name : '.$request->name. '<br>Email : '.$request->email. '<br>Phone : '.$request->phone. '<br>Message : '.$request->message;
        Mail::to('')->send(new Order($message, $subject));

        return redirect(route('contact'))->with('status', 'Contact Enquiry  Successfully Submitted');
    }


}
