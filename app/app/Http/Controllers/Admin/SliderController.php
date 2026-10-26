<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
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
    | Upload Image Helper
    |--------------------------------------------------------------------------
    */

    private function uploadImage($file, $path)
    {
        $destination = $this->uploadPath($path);

        $this->ensureFolderExists($destination);

        $imageName =
            time() . '_' . uniqid() . '.' .
            $file->getClientOriginalExtension();

        $file->move($destination, $imageName);

        return $imageName;
    }

    /*
    |--------------------------------------------------------------------------
    | Display Sliders
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $sliders = Slider::latest()->get();

        return view(
            'admin.sliders.index',
            compact('sliders')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Change Status
    |--------------------------------------------------------------------------
    */

    public function changeStatus(Request $request)
    {
        $slider = Slider::find($request->user_id);

        $slider->status = $request->status;

        $slider->save();

        return response()->json([
            'success' => 'Status Changed Successfully'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Create Form
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.sliders.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Store Slider
    |--------------------------------------------------------------------------
    */

    public function store(SliderRequest $request)
    {
        $slider = new Slider();

        $slider->title = $request->input('title');

        $slider->slug = Str::slug($slider->title);

        /*
        |--------------------------------------------------------------------------
        | Upload Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            if ($image->isValid()) {

                $slider->image = $this->uploadImage(
                    $image,
                    'website/adminproduct/sliders'
                );
            }
        }

        $slider->save();

        \Toastr::success(
            'Slider Created successfully',
            'Success',
            []
        );

        return redirect()
            ->route('sliders.index')
            ->with('success', 'Slider created successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | Show Slider
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        //
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Form
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);

        return view(
            'admin.sliders.create',
            compact('slider')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Update Slider
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $slider->title = $request->input('title');

        $slider->slug = Str::slug($slider->title);

        /*
        |--------------------------------------------------------------------------
        | Upload New Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            if ($image->isValid()) {

                $slider->image = $this->uploadImage(
                    $image,
                    'website/adminproduct/sliders'
                );
            }
        }

        $slider->save();

        \Toastr::success(
            'Slider Updated successfully',
            'Success'
        );

        return redirect()->route('sliders.index');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Slider
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $slider = Slider::find($id);

        if ($slider) {

            $slider->delete();

            \Toastr::success(
                'Slider Deleted successfully',
                'Success',
                []
            );
        }

        return redirect()->route('sliders.index');
    }
}