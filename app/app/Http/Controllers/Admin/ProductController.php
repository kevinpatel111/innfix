<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Feature;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /* ===============================
        LISTING
    ================================ */

    public function index(Request $request)
    {
        $categories = Category::with('children.children')
            ->whereNull('parent_id')
            ->get();

        $products = Product::with([
            'category',
            'features'
        ])
            ->when(
                $request->category_id,
                fn($q) =>
                $q->where('category_id', $request->category_id)
            )
            ->latest()
            ->paginate(10);

        return view(
            'admin.products.index',
            compact('products', 'categories')
        );
    }

    /* ===============================
        CREATE
    ================================ */

    public function create()
    {
        $categories = Category::with('children.children')
            ->whereNull('parent_id')
            ->get();

        $features = Feature::where('status', 1)
            ->latest()
            ->get();

        return view(
            'admin.products.create',
            compact(
                'categories',
                'features'
            )
        );
    }

    /* ===============================
        STORE
    ================================ */

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        /*
        |--------------------------------------------------------------------------
        | SLUG
        |--------------------------------------------------------------------------
        */

        $data['slug'] = $this->uniqueSlug($data['name']);

        /*
        |--------------------------------------------------------------------------
        | MAIN IMAGE
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $data['image'] = $this->uploadImage(
                $request->file('image'),
                'uploads/products'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | GALLERY
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gallery')) {

            $data['gallery'] = $this->uploadGallery(
                $request->file('gallery'),
                'uploads/products/gallery'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | CREATE PRODUCT
        |--------------------------------------------------------------------------
        */

        $product = Product::create($data);

        /*
        |--------------------------------------------------------------------------
        | SAVE FEATURES
        |--------------------------------------------------------------------------
        */

        if ($request->has('features')) {

            $product->features()->sync(
                $request->features
            );
        }

        return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully');
    }

    /* ===============================
        EDIT
    ================================ */

    public function edit($id)
    {
        $product = Product::with('features')
            ->findOrFail($id);

        $categories = Category::with('children.children')
            ->whereNull('parent_id')
            ->get();

        $features = Feature::where('status', 1)
            ->latest()
            ->get();

        return view(
            'admin.products.create',
            compact(
                'product',
                'categories',
                'features'
            )
        );
    }

    /* ===============================
        UPDATE
    ================================ */

    public function update(Request $request, $id)
    {
        $product = Product::with('features')
            ->findOrFail($id);

        $data = $this->validatedData($request);

        /*
        |--------------------------------------------------------------------------
        | SLUG
        |--------------------------------------------------------------------------
        */

        $data['slug'] = $this->uniqueSlug($data['name'], $product->id);

        /*
        |--------------------------------------------------------------------------
        | UPDATE IMAGE
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $data['image'] = $this->uploadImage(
                $request->file('image'),
                'uploads/products'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE GALLERY
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gallery')) {

            $data['gallery'] = $this->uploadGallery(
                $request->file('gallery'),
                'uploads/products/gallery'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE PRODUCT
        |--------------------------------------------------------------------------
        */

        $product->update($data);

        /*
        |--------------------------------------------------------------------------
        | UPDATE FEATURES
        |--------------------------------------------------------------------------
        */

        $product->features()->sync(
            $request->features ?? []
        );

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /* ===============================
        DELETE
    ================================ */

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted');
    }

    public function toggleStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:products,id',
        ]);

        $product = Product::findOrFail($request->id);
        $product->status = !$product->status;
        $product->save();

        return response()->json([
            'success' => true,
            'status' => $product->status,
        ]);
    }

    public function changeStatus(Request $request)
    {
        return $this->toggleStatus($request);
    }

    /* ===============================
        VALIDATION
    ================================ */

    private function validatedData(Request $request): array
    {
        $request->validate([

            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'youtube_link' => 'nullable|url',
            'short_description' => 'nullable|string',
            'product_descripion' => 'nullable|string',
            'image' => 'nullable|image',
            'gallery.*' => 'nullable|image',
            'features' => 'nullable|array',
            'features.*' => 'exists:features,id',

        ]);

        return [

            'category_id' => $request->category_id,
            'short_description' => $request->short_description,

            'name' => $request->name,

            'youtube_link' => $request->youtube_link,

            'product_descripion' => $request->product_descripion,
        ];
    }

    private function uniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $slug = Str::slug($name);
        $baseSlug = $slug !== '' ? $slug : Str::random(8);
        $slug = $baseSlug;
        $counter = 2;

        while (
            Product::where('slug', $slug)
                ->when($ignoreId, fn($query) => $query->whereKeyNot($ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter++;
        }

        return $slug;
    }

    /* ===============================
        UPLOAD HELPERS
    ================================ */

    private function uploadPath($path = '')
    {
        if (
            request()->getHost() === '127.0.0.1' ||
            request()->getHost() === 'localhost'
        ) {

            return public_path($path);
        }

        return base_path('../public_html/' . ltrim($path, '/'));
    }

    private function ensureFolderExists($path)
    {
        if (!file_exists($path)) {

            mkdir($path, 0777, true);
        }
    }

    private function uploadImage($file, $path): string
    {
        $destination = $this->uploadPath($path);

        $this->ensureFolderExists($destination);

        $name = time() . '_' . uniqid() . '.' . $file->extension();

        $file->move($destination, $name);

        return $name;
    }

    private function uploadGallery($files, $path): array
    {
        $destination = $this->uploadPath($path);

        $this->ensureFolderExists($destination);

        $gallery = [];

        foreach ($files as $file) {

            $name = uniqid() . '.' . $file->extension();

            $file->move($destination, $name);

            $gallery[] = $name;
        }

        return $gallery;
    }
}
