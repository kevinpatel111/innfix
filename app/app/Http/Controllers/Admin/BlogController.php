<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
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
    | LOCAL SERVER (XAMPP / LOCALHOST)
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
    |
    | This automatically points to:
    | /public_html/uploads
    |
    */

    return base_path('../public_html/' . ltrim($path, '/'));
}

    private function ensureFolderExists($path)
    {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Blog Listing
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $blogs = Blog::latest()->paginate(10);

        return view('admin.blogs.index', compact('blogs'));
    }

    /*
    |--------------------------------------------------------------------------
    | Create
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.blogs.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Unique Slug
        |--------------------------------------------------------------------------
        */

        $baseSlug = Str::slug($request->title);

        $slug = $baseSlug;

        $counter = 1;

        while (Blog::where('slug', $slug)->exists()) {

            $slug = $baseSlug . '-' . $counter;

            $counter++;
        }

        /*
        |--------------------------------------------------------------------------
        | Main Data
        |--------------------------------------------------------------------------
        */

        $data = [
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'status' => $request->status ?? 1,
        ];

        /*
        |--------------------------------------------------------------------------
        | Featured Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $destination = $this->uploadPath('uploads/blogs');

            $this->ensureFolderExists($destination);

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(
                $destination,
                $imageName
            );

            $data['image'] = $imageName;
        }

        /*
        |--------------------------------------------------------------------------
        | Gallery
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gallery')) {

            $destination = $this->uploadPath('uploads/blogs/gallery');

            $this->ensureFolderExists($destination);

            $gallery = [];

            foreach ($request->gallery as $file) {

                $name = uniqid() . '.' . $file->extension();

                $file->move(
                    $destination,
                    $name
                );

                $gallery[] = $name;
            }

            $data['gallery'] = $gallery;
        }

        Blog::create($data);

        return redirect()
            ->route('blogs.index')
            ->with('success', 'Blog Created Successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | Edit
    |--------------------------------------------------------------------------
    */

    public function edit(Blog $blog)
    {
        return view('admin.blogs.create', compact('blog'));
    }

    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Unique Slug
        |--------------------------------------------------------------------------
        */

        $baseSlug = Str::slug($request->title);

        $slug = $baseSlug;

        $counter = 1;

        while (
            Blog::where('slug', $slug)
                ->where('id', '!=', $blog->id)
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
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'status' => $request->status ?? 1,
        ];

        /*
        |--------------------------------------------------------------------------
        | Featured Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $destination = $this->uploadPath('uploads/blogs');

            $this->ensureFolderExists($destination);

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(
                $destination,
                $imageName
            );

            $data['image'] = $imageName;
        }

        /*
        |--------------------------------------------------------------------------
        | Gallery
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gallery')) {

            $destination = $this->uploadPath('uploads/blogs/gallery');

            $this->ensureFolderExists($destination);

            $gallery = [];

            foreach ($request->gallery as $file) {

                $name = uniqid() . '.' . $file->extension();

                $file->move(
                    $destination,
                    $name
                );

                $gallery[] = $name;
            }

            $data['gallery'] = $gallery;
        }

        $blog->update($data);

        return redirect()
            ->route('blogs.index')
            ->with('success', 'Blog Updated Successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return back()->with('success', 'Blog Deleted Successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | CKEditor Upload
    |--------------------------------------------------------------------------
    */

    public function uploadEditorImage(Request $request)
    {
        try {

            if ($request->hasFile('upload')) {

                $destination = $this->uploadPath('uploads/blogs/editor');

                $this->ensureFolderExists($destination);

                $file = $request->file('upload');

                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                $file->move(
                    $destination,
                    $filename
                );

                return response()->json([
                    'url' => asset('uploads/blogs/editor/' . $filename)
                ]);
            }

            return response()->json([
                'error' => [
                    'message' => 'No file uploaded'
                ]
            ], 400);

        } catch (\Exception $e) {

            return response()->json([
                'error' => [
                    'message' => $e->getMessage()
                ]
            ], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | CKEditor Alternative Upload
    |--------------------------------------------------------------------------
    */

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {

            $destination = $this->uploadPath('uploads/blogs/editor');

            $this->ensureFolderExists($destination);

            $originName = $request->file('upload')->getClientOriginalName();

            $fileName = pathinfo($originName, PATHINFO_FILENAME);

            $extension = $request->file('upload')->getClientOriginalExtension();

            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(
                $destination,
                $fileName
            );

            $url = asset('uploads/blogs/editor/' . $fileName);

            return response()->json([
                'fileName' => $fileName,
                'uploaded' => 1,
                'url' => $url
            ]);
        }
    }
}