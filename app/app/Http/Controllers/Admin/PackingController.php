<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackingRequest;
use Illuminate\Http\Request;
use App\Models\Packing;
use Illuminate\Support\Str;
use Image;

class PackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packings = Packing::all(); 	
        return view('admin.packings.index', compact('packings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.packings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackingRequest $request)
    {
        $packing = new Packing();
       
        $packing->name = $request->input('name'); 
     
        $imageName = time().'.'.$request->pdf->extension();  
        $request->pdf->move(public_path('website/adminproduct/packings'), $imageName);
        $packing->pdf = $imageName;
        
        $packing->save();

        \Toastr::success('Packing Created successfully', 'Success', []); 

        return redirect()->route('packings.index');
    }

     
    public function edit($id)
    {
        $packing = Packing::find($id);
        if($packing) {
            return view('admin.packings.create', compact('packing'));
        }
        abort(404);
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
        $packing = Packing::find($id);
        $packing->name = $request->input('name');
        if($request->has('pdf')) {
            $imageName = time().'.'.$request->pdf->extension();  
            $request->pdf->move(public_path('website/adminproduct/packings'), $imageName);
            $packing->pdf = $imageName;
        }
  
        $packing->update();

        \Toastr::success('Packing Updated successfully', 'Success', []);
        
        return redirect()->route('packings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Packing::find($id)->delete();
        \Toastr::success('Packing Deleted successfully', 'Success', []);
        return redirect()->route('packings.index');
    }
}
