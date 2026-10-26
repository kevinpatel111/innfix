<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::latest()->get();

        return view('admin.features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.features.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image'
        ]);

        $data = [
            'title' => $request->title
        ];

        if ($request->hasFile('image')) {

            $image = time().'.'.$request->image->extension();

            $request->image->move(
                public_path('uploads/features'),
                $image
            );

            $data['image'] = $image;
        }

        Feature::create($data);

        return redirect()
            ->route('features.index')
            ->with('success', 'Feature Created');
    }

    public function edit(Feature $feature)
    {
        return view('admin.features.create', compact('feature'));
    }

    public function update(Request $request, Feature $feature)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $data = [
            'title' => $request->title
        ];

        if ($request->hasFile('image')) {

            $image = time().'.'.$request->image->extension();

            $request->image->move(
                public_path('uploads/features'),
                $image
            );

            $data['image'] = $image;
        }

        $feature->update($data);

        return redirect()
            ->route('features.index')
            ->with('success', 'Feature Updated');
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();

        return back()->with('success', 'Deleted');
    }
}