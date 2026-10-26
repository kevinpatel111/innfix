<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Downloadinquiry;

class DownloadinquiryController extends Controller
{

    public function index()
    {
        $downloadinquiries = Downloadinquiry::all();
        return view('admin.downloadinquiries.index', compact('downloadinquiries'));
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
        'first_name'   => 'required|string|max:100',
        'last_name'    => 'required|string|max:100',
        'email'        => 'required|email|max:150',
        'number'        => 'required|string|max:20',
        'inquiry_type' => 'required|string|in:Dealer,Distributor,CP',
        'message'      => 'required|string|max:1000',
    ]);

    Downloadinquiry::create([
        'name'         => trim($validated['first_name'] . ' ' . $validated['last_name']),
        'email'        => $validated['email'],
        'number'        => $validated['number'],
        'inquiry_type' => $validated['inquiry_type'],
        'message'      => $validated['message'],
    ]);


        return redirect()->back();
    }


    public function destroy($id)
    {
        Downloadinquiry::find($id)->delete();
        return redirect()->route('downloadinquiries.index');
    }
}
