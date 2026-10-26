<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FinishRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Finish;
use Illuminate\Support\Str;
use Image;

class FinishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $finishes = Finish::latest()->get();
        return view('admin.finishes.index', compact('finishes', 'categories', 'subcategories'));
    }

    public function changeStatus(Request $request)
    {
        $user = Finish::find($request->user_id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success' => 'Status Changed Successfully']);
    }

    public function getarea(Request $request, $id)
    {
        $subcategories = Subcategory::where('id', $id)->first();
        $subcategory = $subcategories->category_name;

        return view('admin.finishes.create', compact('subcategory'));

    }

    public function findWithStateID($id)
    {
        $size = Subcategory::where('category_name', $id)->get();
        return response()->json($size);
    }

    public function filterByCategory($categoryId)
    {
        // $data = Finish::with('category')->where('category_name', $categoryId)->get();
        // return response()->json($data);
        $data = Finish::with(['category', 'subcategory'])
            ->where('category_name', $categoryId)
            ->get();

        $transformedData = $data->map(function ($item) {
            return [
                'id' => $item->id,
                'category_name' => $item->category->name,
                'category_size' => $item->subcategory->size,
                'finish' => $item->finish,
                'status' => $item->status,
                // Add other fields you want to include
            ];
        });
        return response()->json($transformedData);
    }

    public function filterBySize($categoryId)
    {
        $data = Finish::with(['category', 'subcategory'])
            ->where('category_size', $categoryId)
            ->get();

        $transformedData = $data->map(function ($item) {
            return [
                'id' => $item->id,
                'category_name' => $item->category->name,
                'category_size' => $item->subcategory->size,
                'finish' => $item->finish,
                'status' => $item->status,
                // Add other fields you want to include
            ];
        });
        return response()->json($transformedData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.finishes.create', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FinishRequest $request)
    {
        $finish = new Finish();
        $finish->category_name = $request->input('category_name');
        $finish->category_size = $request->input('category_size');
        $finish->finish = $request->input('finish');

        $finish->save();
        \Toastr::success('Finish Create successfully', 'Success', []);
        return redirect()->route('finishes.index');
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
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $finish = Finish::find($id);
        if ($finish) {
            return view('admin.finishes.create', compact('finish', 'categories', 'subcategories'));
        }
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
        $finish = Finish::find($id);
        $finish->category_name = $request->input('category_name');
        $finish->category_size = $request->input('category_size');
        $finish->finish = $request->input('finish');

        $finish->update();
        \Toastr::success('Finish Updated successfully', 'Success', []);
        return redirect()->route('finishes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        finish::find($id)->delete();
        \Toastr::success('Finish Deleted successfully', 'Success', []);
        return redirect()->route('finishes.index');
    }
}
