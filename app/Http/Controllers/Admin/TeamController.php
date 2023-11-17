<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::Orderby('id', 'desc')->get();
        return view('admin.web.team', compact('teams'));
    }

    /**
     * Show the form for creating a team resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a teamly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png'
         ]);

         $filename = time().'.'.$request->file('image')->extension();
         $request->image->storeAs('uploads/team', $filename, 'public');
         $filename = 'uploads/team/'.$filename;

         Team::create([
             'name' => $request->name,
             'designation' => $request->designation,
             'image' => $filename,
         ]);

         return redirect(route('team.index'))->with('success', 'Added Successfully');
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
        $teams = Team::find($id);

        $request->validate([
            'name' => 'required',
            'designation' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png']);
            Storage::delete('/public/'.$teams->image);
            $filename = time().'.'.$request->file('image')->extension();
            $request->image->storeAs('uploads/teams', $filename, 'public');
            $filename = 'uploads/teams/'.$filename;
        } else {
            $filename = $teams->image;
        }

        $teams->update([  'name' => $request->name,
        'designation' => $request->designation,
        'image' => $filename,
        ]);

        return redirect(route('team.index'))->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teams = Team::find($id);
        Storage::delete('/public/'.$teams->image);
        Team::destroy($teams->id);

        return redirect(route('team.index'))->with('success', 'Deleted Successfully');
    }
}
