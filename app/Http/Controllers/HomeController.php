<?php

namespace App\Http\Controllers;

use App\Mail\Order;
use App\Mail\Career;
use App\Models\Admin\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\Account;
use App\Models\admin\application;
use App\Models\Admin\country;
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
        //session()->flush();
        $testimonials = Testimonial::Orderby('id', 'desc')->get();
        return view('index',compact('testimonials'));
    }

    public function faq()
    {
        return view('faq');
    }

    public function faq1()
    {
        return view('faq1');
    }
    public function faq2()
    {
        return view('faq2');
    }
    public function faq3()
    {
        return view('faq3');
    }
    public function faq4()
    {
        return view('faq4');
    }
    public function faq5()
    {
        return view('faq5');
    }

  public function profileedit()
    {
        return view('profile_edit');
    }

    public function university_search()
    {
        return view('university_search');
        }

    public function about()
    {
        return view('about');
    }

     public function blog()
    {
        $blogs = News::Orderby('news.id', 'desc')->paginate(2);
        return view('blog',compact('blogs'));
    }

    public function blogdetail($id)
    {

        $items = News::Orderby('id', 'desc')->whereNotIn('id', [$id])->get();
        $blog = News::where('id',$id)->Orderby('id', 'desc')->first();
        return view('blog_detail',compact('blog','items'));
    }

    public function shop()
    {
        return view('product');
    }

    public function career()
    {
        return view('career');
    }

    public function application($university)
    {

        $user = User::find(auth()->user()->id);
        if($user->phone!='' )
        {
            $data = [
                'user_id' => auth()->user()->id,
                'university_id' => $university,
            ];
           application::create($data);
            return redirect(route('university_search'))->with('status', ' Successfully Submitted');
        }
        else{
            return redirect(route('myaccount'))->with('error', ' Please complete the profile');
        }

    }

    public function login()
    {
        return view('login');
    }

    public function password()
    {
        return view('password-link');
    }

    public function contact()
    {
        return view('contact');
    }
    public function book()
    {
        return view('book');
    }

    public function careersend(Request $request)
    {

        $attachmentPath = $request->file('file')->store('file'); // Store the attachment
        $subject = 'New Career';
        $message = 'Name : '.$request->name. '<br>Email : '.$request->email. '<br>Phone : '.$request->phone. '<br>department : '.$request->department;
        Mail::to('jojiyajoseph1996@gmail.com')->send(new Career(storage_path("app/$attachmentPath"),$message, $subject));


        // $subject = 'New Career';
        // $message = 'Name : '.$request->name. '<br>Email : '.$request->email. '<br>Phone : '.$request->phone. '<br>department : '.$request->department;
        // Mail::to('jojiyajoseph1996@gmail.com')->send(new Order($message, $subject));

        return redirect(route('career'))->with('status', 'Career Enquiry  Successfully Submitted');

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


    public function privacy()
    {
        $privacy= Privacypolicy::Orderby('id', 'desc')->get();
        return view('privacy-policy',compact('privacy'));
    }

    public function support()
    {
        return view('support');

    }



    public function refund()
    {
        $policy= Refund::Orderby('id', 'desc')->get();
        return view('refund-policy',compact('policy'));

    }

    public function terms()
    {
        $policy= Terms::Orderby('id', 'desc')->get();
        return view('terms-of-use',compact('policy'));

    }


}
