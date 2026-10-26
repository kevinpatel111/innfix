<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhoneRequest;
use Illuminate\Http\Request;
use App\Models\Phone;
use Illuminate\Support\Str;
use Image;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = Phone::all(); 	
        return view('admin.phones.index', compact('phones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {
        $phone = new Phone();
       
        $phone->phone = $request->input('phone');      
        
        $phone->save();

        \Toastr::success('Phone Created successfully', 'Success', []); 

        return redirect()->route('phones.index');
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
    $phone = Phone::findOrFail($id);
    return view('admin.phones.create', compact('phone'));
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
        $phone = Phone::find($id);
        $phone->phone = $request->input('phone'); 
       
        $phone->update();

        \Toastr::success('Phone Updated successfully', 'Success', []);
        
        return redirect()->route('phones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Phone::find($id)->delete();
        \Toastr::success('Phone Deleted successfully', 'Success', []);
        return redirect()->route('phones.index');
    }
}
