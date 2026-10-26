<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

  public function index()
    {
        $contacts = Contact::all(); 		
        return view('admin.contacts.index',compact('contacts'));
    }
    /**
     * Store contact form (Frontend)
     */
    public function store(Request $request)
    {
        // Validate exactly what the form sends
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'phone'      => 'required|string|max:20',
            'subject'    => 'required|string|max:255',
            'message'    => 'required|string',
        ]);


        // Save to database
        $contact = Contact::create([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'number'  => $validated['phone'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        // Email (simple PHP mail as you used before)
        $emailBody =
            "New Contact Inquiry\n\n" .
            "Name: {$contact->name}\n" .
            "Email: {$contact->email}\n" .
            "Phone: {$contact->number}\n" .
            "Subject: {$contact->subject}\n\n" .
            "Message:\n{$contact->message}";

        @mail(
            "info@madhuramoverseas.com",
            "New Contact Inquiry - Madhuram Overseas",
            $emailBody
        );

        // Success message
        return redirect()->back()->with('success', 'Thank you! We will contact you shortly.');
    }

     public function destroy($id)
    {
        Contact::find($id)->delete(); 
        return redirect()->route('contacts.index');
    }
}
