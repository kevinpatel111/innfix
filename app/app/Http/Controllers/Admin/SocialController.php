<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialRequest;
use Illuminate\Http\Request;
use App\Models\Social;
use Illuminate\Support\Str;
use Image;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = Social::all(); 	
        return view('admin.socials.index', compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.socials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialRequest $request)
    {
        $social = new Social();
       
        $social->instagram = $request->input('instagram');      
        $social->facebook = $request->input('facebook');      
        $social->twitter = $request->input('twitter');      
        $social->linkedin = $request->input('linkedin');      
        $social->youtube = $request->input('youtube');      
        $social->pinterest = $request->input('pinterest');      

        $social->save();

        \Toastr::success('Social Media Created successfully', 'Success', []); 

        return redirect()->route('socials.index');
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
    $social = Social::findOrFail($id);
    return view('admin.socials.create', compact('social'));
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
        $social = Social::find($id);
        $social->instagram = $request->input('instagram');      
        $social->facebook = $request->input('facebook');      
        $social->twitter = $request->input('twitter');      
        $social->youtube = $request->input('youtube');      
        $social->linkedin = $request->input('linkedin'); 
        $social->pinterest = $request->input('pinterest');      

        $social->update();

        \Toastr::success('Social Updated successfully', 'Success', []);
        
        return redirect()->route('socials.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Social::find($id)->delete();
        \Toastr::success('Social Deleted successfully', 'Success', []);
        return redirect()->route('socials.index');
    }
}
