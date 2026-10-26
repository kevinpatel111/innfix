<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Category;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::with('category')
            ->sortable()
            ->paginate(10);

        return view('admin.subcategories.index', compact('subcategories','categories'));
    }

    /**
     * Filter subcategories by category
     */
    public function filterByCategory($categoryId)
    {
        $data = Subcategory::with('category')
            ->where('category_name', $categoryId)
            ->get();

        return response()->json($data);
    }

    /**
     * Change status (AJAX or normal)
     */
    public function changeStatus(Request $request)
    {
        $subcategory = Subcategory::findOrFail($request->id);
        $subcategory->status = !$subcategory->status;
        $subcategory->save();

        return response()->json(['success' => true]);
    }

    /**
     * Show create form
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategories.create', compact('categories'));
    }

    /**
     * Store new subcategory
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name'      => 'required|exists:categories,id',
            'title'              => 'required|string|max:255',
            'short_description'  => 'nullable|string',
            'image'              => 'nullable|image'
        ]);

       $data = $request->only([
    'category_name',
    'title',
    'short_description'
]);

$data['slug'] = \Str::slug($request->title);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(
                public_path('website/adminproduct/subcategories'),
                $imageName
            );
            $data['image'] = $imageName;
        }

        Subcategory::create($data);

        \Toastr::success('Subcategory created successfully');
        return redirect()->route('subcategories.index');
    }

    /**
     * Edit form
     */
    public function edit($id)
    {
        $categories = Category::all();
        $subcategory = Subcategory::findOrFail($id);

        return view('admin.subcategories.create', compact('subcategory','categories'));
    }

    /**
     * Update subcategory
     */
    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);

        $request->validate([
            'category_name'      => 'required|exists:categories,id',
            'title'              => 'required|string|max:255',
            'short_description'  => 'nullable|string',
            'image'              => 'nullable|image'
        ]);

      $data = $request->only([
    'category_name',
    'title',
    'short_description'
]);

$data['slug'] = \Str::slug($request->title);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(
                public_path('website/adminproduct/subcategories'),
                $imageName
            );
            $data['image'] = $imageName;
        }

        $subcategory->update($data);

        \Toastr::success('Subcategory updated successfully');
        return redirect()->route('subcategories.index');
    }

    /**
     * Delete subcategory
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();

        \Toastr::success('Size deleted successfully');
        return redirect()->route('subcategories.index');
    }
}
