<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use Illuminate\Support\Str;

class InquiryController extends Controller
{
 
    public function index()
    {
        $inquiries = Inquiry::all(); 		
        return view('admin.inquiries.index', compact('inquiries'));
    }
 
    public function store(Request $request)
    {
        $inquiry = new Inquiry();
       
        $inquiry->name = $request->input('name');
        $inquiry->number = $request->input('number');
        $inquiry->email = $request->input('email');
        $inquiry->city = $request->input('city');
        $inquiry->country = $request->input('country');
        $inquiry->box = $request->input('box');        
        $inquiry->profession = $request->input('profession');        
        $inquiry->message = $request->input('message');
       
        $inquiry->save();
        \Toastr::success('Inquiry Details Updated successfully', 'Success', []);

        $name = $request->input('name');
            $name=$_REQUEST['name'];
            $email=$_REQUEST['email'];
            $number=$_REQUEST['number'];
            $city=$_REQUEST['city'];
            $country=$_REQUEST['country'];
            $box=$_REQUEST['box'];
            $profession=$_REQUEST['profession'];
            $message=$_REQUEST['message'];
           
          
            $php = \Blade::compileString('<h3>New Inquiry,</h3><br/><br/>Name: <b>{{$name}}</b><br/>email: <b>{{$email}}</b><br/>number: <b>{{$number}}</b><br/>email: <b>{{$email}}</b><br/>city: <b>{{$city}}</b><br/>category name: <b>{{$country}}</b><br/>box: <b>{{$box}}</b><br/>profession: <b>{{$profession}}</b>  <br/>Message: <b>{{$message}}</b>');
  
        \mail("info@velcore.in", "Regarding Export Inquiry form Velcore International LLP", "Name: " . $name . "\nMobile: " . $number . "\nE-Mail: " . $email . "\nMessage: " . $message . "\nCity: " . $city . "\nCountry: " . $country . "\nBox: " . $box . "\nProfession: " . $profession);

        return redirect()->back();
    }
 
    public function destroy($id)
    {
        Inquiry::find($id)->delete(); 
        return redirect()->route('inquiries.index');
    }
}
