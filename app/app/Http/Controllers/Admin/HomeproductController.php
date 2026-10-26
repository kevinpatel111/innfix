<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeproductRequest;
use App\Models\Homeproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class HomeproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeproducts = Homeproduct::all();
        return view('admin.homeproducts.index', compact('homeproducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.homeproducts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomeproductRequest $request)
    {
        $homeproduct = new Homeproduct();

        $homeproduct->title = $request->input('title');
        $homeproduct->description = $request->input('description');
        $homeproduct->product_link = $request->input('product_link');
        $homeproduct->slug = Str::slug($homeproduct->title);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('website/adminproduct/homeproducts'), $imageName);
        $homeproduct->image = $imageName;

        $homeproduct->save();

        \Toastr::success('Home Product Created successfully', 'Success', []);

        return redirect()->route('homeproducts.index');
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
        $homeproduct = HomeProduct::findOrFail($id);
        return view('admin.homeproducts.create', compact('homeproduct'));
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
        $homeproduct = Homeproduct::find($id);
        $homeproduct->title = $request->input('title');
        $homeproduct->description = $request->input('description');
        $homeproduct->product_link = $request->input('product_link');
        $homeproduct->slug = Str::slug($homeproduct->title);
        if ($request->has('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('website/adminproduct/homeproducts'), $imageName);
            $homeproduct->image = $imageName;
        }

        $homeproduct->update();

        \Toastr::success('Home Product Updated successfully', 'Success', []);

        return redirect()->route('homeproducts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Homeproduct::find($id)->delete();
        \Toastr::success('Home Product Deleted successfully', 'Success', []);
        return redirect()->route('homeproducts.index');
    }
}
