<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CertificateRequest;
use Illuminate\Http\Request;
use App\Models\Certificate;

class CertificateController extends Controller
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
    | Display Certificates
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $certificates = Certificate::latest()->get();

        return view(
            'admin.certificates.index',
            compact('certificates')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Create Form
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.certificates.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Store Certificate
    |--------------------------------------------------------------------------
    */

    public function store(CertificateRequest $request)
    {
        $certificate = new Certificate();

        $certificate->name = $request->input('name');

        /*
        |--------------------------------------------------------------------------
        | Upload Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $destination = $this->uploadPath(
                'website/adminproduct/certificates'
            );

            $this->ensureFolderExists($destination);

            $imageName =
                time() . '.' .
                $request->image->extension();

            $request->image->move(
                $destination,
                $imageName
            );

            $certificate->image = $imageName;
        }

        $certificate->save();

        \Toastr::success(
            'Certificate Created successfully',
            'Success',
            []
        );

        return redirect()->route('certificates.index');
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Form
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $certificate = Certificate::findOrFail($id);

        return view(
            'admin.certificates.create',
            compact('certificate')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Update Certificate
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $certificate = Certificate::findOrFail($id);

        $certificate->name = $request->input('name');

        /*
        |--------------------------------------------------------------------------
        | Upload New Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $destination = $this->uploadPath(
                'website/adminproduct/certificates'
            );

            $this->ensureFolderExists($destination);

            $imageName =
                time() . '.' .
                $request->image->extension();

            $request->image->move(
                $destination,
                $imageName
            );

            $certificate->image = $imageName;
        }

        $certificate->save();

        \Toastr::success(
            'Certificate Updated successfully',
            'Success',
            []
        );

        return redirect()->route('certificates.index');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Certificate
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $certificate = Certificate::find($id);

        if ($certificate) {

            $certificate->delete();

            \Toastr::success(
                'Certificate Deleted successfully',
                'Success',
                []
            );
        }

        return redirect()->route('certificates.index');
    }
}