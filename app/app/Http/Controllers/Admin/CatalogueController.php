<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CatalogueRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Catalogue;
use Illuminate\Support\Str;

class CatalogueController extends Controller
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
    | Display Listing
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $catalogues = Catalogue::sortable()->paginate(10);

        return view('admin.catalogues.index', compact('catalogues'));
    }

    /*
    |--------------------------------------------------------------------------
    | Change Status
    |--------------------------------------------------------------------------
    */

    public function changeStatus(Request $request)
    {
        $user = Catalogue::find($request->user_id);

        $user->status = $request->status;

        $user->save();

        return response()->json([
            'success' => 'Status Changed Successfully'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Subcategory Fetch
    |--------------------------------------------------------------------------
    */



    /*
    |--------------------------------------------------------------------------
    | Create Form
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $subcategories = Subcategory::all();

        $categories = Category::all();

        return view(
            'admin.catalogues.create',
            compact('categories', 'subcategories')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Store Catalogue
    |--------------------------------------------------------------------------
    */

    public function store(CatalogueRequest $request)
    {
        $catalogue = new Catalogue();
        $catalogue->name = $request->name;

        /*
        |--------------------------------------------------------------------------
        | Upload Directory
        |--------------------------------------------------------------------------
        */

        $destination = $this->uploadPath(
            'website/adminproduct/catalogues'
        );

        $this->ensureFolderExists($destination);

        /*
        |--------------------------------------------------------------------------
        | Image Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $imageName = time() . '_img.' .
                $request->image->extension();

            $request->image->move(
                $destination,
                $imageName
            );

            $catalogue->image = $imageName;
        }

        /*
        |--------------------------------------------------------------------------
        | Catalogue Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('catalogue')) {

            $catalogueFile = time() . '_catalogue.' .
                $request->catalogue->extension();

            $request->catalogue->move(
                $destination,
                $catalogueFile
            );

            $catalogue->catalogue = $catalogueFile;
        }

        $catalogue->save();

        \Toastr::success(
            'Catalogue Created successfully',
            'Success',
            []
        );

        return redirect()->route('catalogues.index');
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Form
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {

        $catalogue = Catalogue::find($id);

        if ($catalogue) {

            return view(
                'admin.catalogues.create',
                compact(
                    'catalogue',
                    'categories',
                    'subcategories'
                )
            );
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Update Catalogue
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $catalogue = Catalogue::find($id);


        $catalogue->name = $request->name;

        /*
        |--------------------------------------------------------------------------
        | Upload Directory
        |--------------------------------------------------------------------------
        */

        $destination = $this->uploadPath(
            'website/adminproduct/catalogues'
        );

        $this->ensureFolderExists($destination);

        /*
        |--------------------------------------------------------------------------
        | Image Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $imageName = time() . '_img.' .
                $request->image->extension();

            $request->image->move(
                $destination,
                $imageName
            );

            $catalogue->image = $imageName;
        }

        /*
        |--------------------------------------------------------------------------
        | Catalogue Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('catalogue')) {

            $catalogueFile = time() . '_catalogue.' .
                $request->catalogue->extension();

            $request->catalogue->move(
                $destination,
                $catalogueFile
            );

            $catalogue->catalogue = $catalogueFile;
        }

        $catalogue->update();

        \Toastr::success(
            'Catalogue Updated successfully',
            'Success',
            []
        );

        return redirect()->route('catalogues.index');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Catalogue
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        Catalogue::find($id)->delete();

        \Toastr::success(
            'Catalogue Deleted successfully',
            'Success',
            []
        );

        return redirect()->route('catalogues.index');
    }
}