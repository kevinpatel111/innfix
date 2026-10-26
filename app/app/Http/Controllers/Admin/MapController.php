<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MapRequest;
use Illuminate\Http\Request;
use App\Models\Map;
use Illuminate\Support\Str;
use Image;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maps = Map::all(); 	
        return view('admin.maps.index', compact('maps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.maps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MapRequest $request)
    {
        $map = new Map();
       
        $map->map = $request->input('map');      
        
        $map->save();

        \Toastr::success('Map Created successfully', 'Success', []); 

        return redirect()->route('maps.index');
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
    $map = Map::findOrFail($id);
    return view('admin.maps.create', compact('map'));
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
        $map = Map::find($id);
        $map->map = $request->input('map'); 
       
        $map->update();

        \Toastr::success('Map Updated successfully', 'Success', []);
        
        return redirect()->route('maps.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Map::find($id)->delete();
        \Toastr::success('Map Deleted successfully', 'Success', []);
        return redirect()->route('maps.index');
    }
}
