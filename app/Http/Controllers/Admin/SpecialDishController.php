<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Food;
use App\Models\Admin\SpecialDish;
use Illuminate\Http\Request;

class SpecialDishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        if(SpecialDish::count() == 0 ) {
            SpecialDish::create([
                'dish_id' => 1,
            ]);
        }
    }

    public function index()
    {
        $specialDish = SpecialDish::join('food','food.id','=','special_dishes.dish_id')->Orderby('id', 'desc')->select('food.fdtitle','special_dishes.*')->first();
        $cats = Category::Orderby('id', 'desc')->get();
       $foods = Food::join('categories','categories.id','=','food.cat')->Orderby('food.id', 'desc')->select('food.*','categories.title')->get();
       return view('admin.web.specialDish',compact('cats','foods','specialDish'));
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
        $request->validate([
            'dish_id' => 'required',
         ]);
         $data = [
             'dish_id' => $request->dish_id,
         ];
        SpecialDish::create($data);
         return Back()->with('success', 'added');
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
        //
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
       $specialDishs = SpecialDish::find($id);
        $request->validate([
            'dish_id' => 'required',
         ]);
         $data = [
            'dish_id' => $request->dish_id,
        ];

       $specialDishs->update($data);
        return Back()->with('success', 'Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $specialDishs= SpecialDish::findOrFail($id);
        $specialDishs->delete();
        return redirect(route('specialDish.index'))->with('success', 'Deleted Successfully');
    }
}
