<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use Illuminate\Http\Request;
use App\Models\Email;
use Illuminate\Support\Str;
use Image;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Email::all(); 	
        return view('admin.emails.index', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.emails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmailRequest $request)
    {
        $email = new Email();
       
        $email->email = $request->input('email');      
        
        $email->save();

        \Toastr::success('Email Created successfully', 'Success', []); 

        return redirect()->route('emails.index');
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
    $email = Email::findOrFail($id);
    return view('admin.emails.create', compact('email'));
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
        $email = Email::find($id);
        $email->email = $request->input('email'); 
       
        $email->update();

        \Toastr::success('Email Updated successfully', 'Success', []);
        
        return redirect()->route('emails.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Email::find($id)->delete();
        \Toastr::success('Email Deleted successfully', 'Success', []);
        return redirect()->route('emails.index');
    }
}
