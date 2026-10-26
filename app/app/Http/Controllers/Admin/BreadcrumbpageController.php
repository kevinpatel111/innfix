<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BreadcrumbpageRequest;
use App\Models\Breadcrumbpage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class BreadcrumbpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbpages = Breadcrumbpage::all();
        return view('admin.breadcrumbpages.index', compact('breadcrumbpages'));
    }


    public function changeStatus(Breadcrumbpage $breadcrumbpage)
    {
        $breadcrumbpage->status = !$breadcrumbpage->status;
        $breadcrumbpage->save();

        return back()->with('success', 'Status updated successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.breadcrumbpages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BreadcrumbpageRequest $request)
    {
        $breadcrumbpage = new Breadcrumbpage();

        $breadcrumbpage->title = $request->input('title');
        $breadcrumbpage->slug = Str::slug($breadcrumbpage->title);

        $breadcrumbpage->save();

        \Toastr::success('Page Created successfully', 'Success', []);

        return redirect()->route('breadcrumbpages.index');
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
        $breadcrumbpage = Breadcrumbpage::find($id);
        if ($breadcrumbpage) {
            return view('admin.breadcrumbpages.create', compact('breadcrumbpage'));
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
        $breadcrumbpage = Breadcrumbpage::find($id);
        $breadcrumbpage->title = $request->input('title');
        $breadcrumbpage->slug = Str::slug($breadcrumbpage->title);

        $breadcrumbpage->update();

        \Toastr::success('Page Updated successfully', 'Success', []);

        return redirect()->route('breadcrumbpages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Breadcrumbpage::find($id)->delete();
        \Toastr::success('Page Deleted successfully', 'Success', []);
        return redirect()->route('breadcrumbpages.index');
    }
}
