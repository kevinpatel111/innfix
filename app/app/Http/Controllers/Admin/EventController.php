<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
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
    | Display Events
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $events = Event::latest()->get();

        return view(
            'admin.events.index',
            compact('events')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Change Status
    |--------------------------------------------------------------------------
    */

    public function changeStatus(Request $request)
    {
        $event = Event::find($request->user_id);

        $event->status = $request->status;

        $event->save();

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
        return view('admin.events.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Store Event
    |--------------------------------------------------------------------------
    */

    public function store(EventRequest $request)
    {
        $event = new Event();

        $event->title = $request->input('title');

        $event->slug = Str::slug($event->title);

        /*
        |--------------------------------------------------------------------------
        | Upload Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            if ($image->isValid()) {

                $event->image = $this->uploadImage(
                    $image,
                    'website/adminproduct/events'
                );
            }
        }

        $event->save();

        \Toastr::success(
            'Event Created successfully',
            'Success',
            []
        );

        return redirect()->route('events.index');
    }

    /*
    |--------------------------------------------------------------------------
    | Show Event
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
        $event = Event::findOrFail($id);

        return view(
            'admin.events.create',
            compact('event')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Update Event
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $event->title = $request->input('title');

        $event->slug = Str::slug($event->title);

        /*
        |--------------------------------------------------------------------------
        | Upload New Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            if ($image->isValid()) {

                $event->image = $this->uploadImage(
                    $image,
                    'website/adminproduct/events'
                );
            }
        }

        $event->save();

        \Toastr::success(
            'Event Updated successfully',
            'Success',
            []
        );

        return redirect()->route('events.index');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Event
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $event = Event::find($id);

        if ($event) {

            $event->delete();

            \Toastr::success(
                'Event Deleted successfully',
                'Success',
                []
            );
        }

        return redirect()->route('events.index');
    }
}