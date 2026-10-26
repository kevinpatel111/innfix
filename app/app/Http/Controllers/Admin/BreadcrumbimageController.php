<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BreadcrumbimageRequest;
use App\Models\Breadcrumbimage;
use App\Models\Breadcrumbpage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class BreadcrumbimageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbimages = Breadcrumbimage::all(); 	
        return view('admin.breadcrumbimages.index', compact('breadcrumbimages'));
    }

    public function changeStatus(Request $request) {
        $user = Breadcrumbimage::find($request->user_id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success' => 'Status Changed Successfully']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbpages = Breadcrumbpage::all();
        return view('admin.breadcrumbimages.create', compact('breadcrumbpages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BreadcrumbimageRequest $request)
    {
        $breadcrumbimage = new Breadcrumbimage();
       
        $breadcrumbimage->breadcrumb_name = $request->input('breadcrumb_name'); 
     
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('website/adminproduct/breadcrumbimages'), $imageName);
        $breadcrumbimage->image = $imageName;
        
        $breadcrumbimage->save();

        \Toastr::success('Image Created successfully', 'Success', []); 

        return redirect()->route('breadcrumbimages.index');
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
        $breadcrumbimage = Breadcrumbimage::find($id);
        $breadcrumbpages = Breadcrumbpage::all();
        if($breadcrumbimage) {
            return view('admin.breadcrumbimages.create', compact('breadcrumbimage','breadcrumbpages'));
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
        $breadcrumbimage = Breadcrumbimage::find($id);
        $breadcrumbimage->breadcrumb_name = $request->input('breadcrumb_name');
     
        if($request->has('image')) {
            $imageName = time().'.'.$request->image->extension(); 
            $request->image->move(public_path('website/adminproduct/breadcrumbimages'), $imageName);
            $breadcrumbimage->image = $imageName;
        }
  
        $breadcrumbimage->update();

        \Toastr::success('Image Updated successfully', 'Success', []);
        
        return redirect()->route('breadcrumbimages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Breadcrumbimage::find($id)->delete();
        \Toastr::success('Image Deleted successfully', 'Success', []);
        return redirect()->route('breadcrumbimages.index');
    }
}
