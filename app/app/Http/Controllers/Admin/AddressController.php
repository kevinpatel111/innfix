<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::all(); 	
        return view('admin.addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request)
    {
        $address = new Address();
       
        $address->title = $request->input('title'); 
        $address->description = $request->input('description');       
        
        $address->save();

        \Toastr::success('Address Created successfully', 'Success', []); 

        return redirect()->route('addresses.index');
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
    $address = Address::findOrFail($id);
    return view('admin.addresses.create', compact('address'));
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
        $address = Address::find($id);
        $address->title = $request->input('title'); 
        $address->description = $request->input('description');      
  
        $address->update();

        \Toastr::success('Address Updated successfully', 'Success', []);
        
        return redirect()->route('addresses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Address::find($id)->delete();
        \Toastr::success('Address Deleted successfully', 'Success', []);
        return redirect()->route('addresses.index');
    }
}
