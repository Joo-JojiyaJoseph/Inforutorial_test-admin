<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Account;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Credential;
use App\Models\Admin\Game;
use App\Models\Admin\Subcat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas = Account::join('categories', 'categories.id', '=', 'accounts.cat_id')->Orderby('accounts.id', 'desc')->get('accounts.*','brands.title','category.title');
// dd($datas);
        $categories = Category::Orderby('id', 'desc')->get();
        
       $subcategories = Subcat::Orderby('id', 'desc')->get();
        $brands = Brand::Orderby('id', 'desc')->get();
        $credentials =Credential::Orderby('id', 'desc')->get();
        $games=Game::Orderby('id', 'desc')->get();

        return view('admin.product.account', compact('datas','categories','brands','credentials','games','subcategories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                "category" => "required|numeric",
               
                "title" => "required",
                "game" => "required",
                "description" => "required",
                "specification" => "required",
                "price" => "required|numeric",
                "offer" => "required|numeric",
                'image' => 'required',
                'image.*' => 'image|mimes:jpg,jpeg,png',
            ],
            [
                'image.*.mimes' => 'Only jpeg,png images are allowed',
            ]
        );

        if($request->hasFile('image')){
            $filename = time().'.'.$request->file('image')->extension();

            $request->image->storeAs('uploads/account', $filename, 'public');
             $filename = 'uploads/account/'.$filename;
        }

       $offer = ( $request->price - ( $request->price * $request->offer / 100 ));
       Account::create([
            'cat_id' => $request->category,
            'games' => $request->game,
            'name' => $request->title,
            'description' => $request->description,
            'specification' => $request->specification,
            'rate' => $request->price,
            'offer' => $request->offer,
            'offer_rate' => $offer,
            'image' =>$filename,
        ]);

        return back()->with('success', 'Added Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $datas  = Account::find($id);
        return view('admin.product.credential_add', compact('datas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $account = Account::find($id);

        $request->validate([
            "category" => "required|numeric",
         
            "title" => "required",
            "description" => "required",
            "specification" => "required",
            "price" => "required|numeric",
            "offer" => "required|numeric",
            "game" => "required",

        ]);

        if($request->hasFile('image')){

       Storage::delete('/public/'.$account->image);


       $filename = time().'.'.$request->file('image')->extension();

      $request->image->storeAs('uploads/account', $filename, 'public');
       $filename = 'uploads/account/'.$filename;

        } else {
            $filename = $account->image;
        }

        $offer = ( $request->price - ( $request->price * $request->offer / 100 ));

        $account->update([
            'cat_id' => $request->category,
             'subcat_id' => $request->sub_category,
            'brand' => $request->brand,
            'name' => $request->title,
            'description' => $request->description,
            'specification' => $request->specification,
            'rate' => $request->price,
            'offer' => $request->offer,
            'offer_rate' => $offer,
            'image' =>  $filename,
            'games' => $request->game,

        ]);

        return back()->with('success', 'Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Account::find($id);


        if($account->image !='')
        {
            Storage::delete('/public/'.$account->image);
        }

        account::destroy($account->id);
        return redirect(route('accounts.index'))->with('success', 'Deleted Successfully');
    }
}
