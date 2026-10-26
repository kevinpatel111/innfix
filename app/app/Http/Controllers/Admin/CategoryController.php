<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Upload Path Helper
    |--------------------------------------------------------------------------
    */

    private function uploadPath($path = '')
    {
        /*
        |--------------------------------------------------------------------------
        | LOCAL SERVER
        |--------------------------------------------------------------------------
        */

        if (
            request()->getHost() === '127.0.0.1' ||
            request()->getHost() === 'localhost'
        ) {

            return public_path($path);
        }

        /*
        |--------------------------------------------------------------------------
        | LIVE SERVER (cPanel)
        |--------------------------------------------------------------------------
        */

        return base_path('../public_html/' . ltrim($path, '/'));
    }

    /*
    |--------------------------------------------------------------------------
    | Create Folder If Not Exists
    |--------------------------------------------------------------------------
    */

    private function ensureFolderExists($path)
    {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Category List
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $categories = Category::latest()->get();

        return view(
            'admin.category.index',
            compact('categories')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Create Form
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $categories = Category::with('children')
            ->whereNull('parent_id')
            ->get();

        return view(
            'admin.category.create',
            compact('categories')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Store Category
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Unique Slug
        |--------------------------------------------------------------------------
        */

        $baseSlug = Str::slug($request->name);

        $slug = $baseSlug;

        $counter = 1;

        while (Category::where('slug', $slug)->exists()) {

            $slug = $baseSlug . '-' . $counter;

            $counter++;
        }

        /*
        |--------------------------------------------------------------------------
        | Main Data
        |--------------------------------------------------------------------------
        */

        $data = [
            'name' => $request->name,
            'slug' => $slug,
            'parent_id' => $request->parent_id
        ];

        /*
        |--------------------------------------------------------------------------
        | Image Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $destination = $this->uploadPath(
                'website/adminproduct/categories'
            );

            $this->ensureFolderExists($destination);

            $imageName = time() . '.' .
                $request->image->extension();

            $request->image->move(
                $destination,
                $imageName
            );

            $data['image'] = $imageName;
        }

        Category::create($data);

        return redirect()
            ->route('categories.index')
            ->with(
                'success',
                'Category created successfully'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Form
    |--------------------------------------------------------------------------
    */

    public function edit(Category $category)
    {
        $categories = Category::with('children')
            ->whereNull('parent_id')
            ->where('id', '!=', $category->id)
            ->get();

        return view(
            'admin.category.create',
            compact('category', 'categories')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Toggle Status
    |--------------------------------------------------------------------------
    */

    public function toggleStatus(Request $request)
    {
        $category = Category::findOrFail($request->id);

        $category->status = !$category->status;

        $category->save();

        return response()->json([
            'success' => true
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Update Category
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Unique Slug
        |--------------------------------------------------------------------------
        */

        $baseSlug = Str::slug($request->name);

        $slug = $baseSlug;

        $counter = 1;

        while (
            Category::where('slug', $slug)
                ->where('id', '!=', $category->id)
                ->exists()
        ) {

            $slug = $baseSlug . '-' . $counter;

            $counter++;
        }

        /*
        |--------------------------------------------------------------------------
        | Main Data
        |--------------------------------------------------------------------------
        */

        $data = [
            'name' => $request->name,
            'slug' => $slug,
            'parent_id' => $request->parent_id
        ];

        /*
        |--------------------------------------------------------------------------
        | Image Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $destination = $this->uploadPath(
                'website/adminproduct/categories'
            );

            $this->ensureFolderExists($destination);

            $imageName = time() . '.' .
                $request->image->extension();

            $request->image->move(
                $destination,
                $imageName
            );

            $data['image'] = $imageName;
        }

        $category->update($data);

        return redirect()
            ->route('categories.index')
            ->with(
                'success',
                'Category updated successfully'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Category
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $category = Category::find($id);

        if ($category) {

            $category->delete();

            \Toastr::success(
                'Category Deleted successfully',
                'Success',
                []
            );
        }

        return redirect()->route('categories.index');
    }
}