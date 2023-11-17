<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        if(Story::count() == 0 ) {
            Story::create([
                'title' => null,
                'description' => null,
                'image' => null,
                'image1' => null,
            ]);
        }
    }

    public function index()
    {
        $storys = Story::Orderby('id', 'desc')->get();
        return view('admin.web.story', compact('storys'));
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
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'image1' => 'required|mimes:jpg,jpeg,png'
         ]);

         $filename = time().'.'.$request->file('image')->extension();
         $request->image->storeAs('uploads/story', $filename, 'public');
         $filename = 'uploads/story/'.$filename;

         $filename1 = time().'.'.$request->file('image1')->extension();
         $request->image1->storeAs('uploads/story', $filename1, 'public');
         $filename1 = 'uploads/story/'.$filename1;
         Story::create([
             'title' => $request->title,
             'description' => $request->description,
             'image' => $filename,
             'image1' => $filename1,
         ]);

         return redirect(route('story.index'))->with('success', 'Added Successfully');
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
        $story = Story::find($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png']);
            Storage::delete('/public/'.$story->image);
            $filenames = time().'.'.$request->file('image')->extension();
            $request->image->storeAs('uploads/story', $filenames, 'public');
            $filenames = 'uploads/story/'.$filenames;
        } else {
            $filenames = $story->image;
        }


        // if ($request->hasFile('secondimage1')) {
        //     $request->validate(['secondimage1' => 'mimes:jpg,jpeg,png']);
        //     Storage::delete('/public/'.$story->secondimage1);
        //     $secondfilename1 = time().'.'.$request->file('secondimage1')->extension();
        //     $request->secondimage1->storeAs('uploads/story', $secondfilename1, 'public');
        //     $secondfilename1 = 'uploads/story/'.$secondfilename1;
        // } else {
        //     $secondfilename1 = $story->secondimage1;
        // }

        $story->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $filenames,
            // 'image1' => $secondfilename1,
        ]);

        return redirect(route('story.index'))->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $story = Story::find($id);
        Storage::delete('/public/'.$story->image);
        Storage::delete('/public/'.$story->image1);
        story::destroy($story->id);

        return redirect(route('story.index'))->with('success', 'Deleted Successfully');
    }
}
