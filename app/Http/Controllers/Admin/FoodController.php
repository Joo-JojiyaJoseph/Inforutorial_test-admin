<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::Orderby('id', 'desc')->get();
        $foods = Food::Orderby('id', 'desc')->get();
        return view('admin.food.category',compact('cats','foods'));
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
            'title' => 'required',
            'cat' => 'required',
            'amount' => 'required',
            'offer' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png'
         ]);

         $filename = time().'.'.$request->file('image')->extension();
         $request->image->storeAs('uploads/food', $filename, 'public');
         $data = [
             'title' => $request->title,
             'cat' => $request->cat,
             'amount' => $request->amount,
             'offer' => $request->offer,
             'price' => $request->price,
             'image' => $filename,
         ];
        Food::create($data);
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
        $foods = Food::find($id);
        $request->validate([
            'title' => 'required',
         ]);

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png']);
            Storage::delete('/public/uploads/food/'.$foods->image);
            $filename = time().'.'.$request->file('image')->extension();
            $request->image->storeAs('uploads/food', $filename, 'public');
        } else {
            $filename = $foods->image;
        }

        $data = [
            'title' => $request->title,
            'cat' => $request->cat,
            'amount' => $request->amount,
            'offer' => $request->offer,
            'price' => $request->price,
            'image' => $filename,
        ];


        $foods->update($data);
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
        $foods= Food::findOrFail($id);
        $foods->delete();
        return redirect(route('food.index'))->with('success', 'Deleted Successfully');

    }
}
