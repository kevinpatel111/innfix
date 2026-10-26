<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Email;
use App\Models\Map;
use App\Models\Phone;
use App\Models\Social;

class BlogFrontendController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 1)
            ->latest()
            ->paginate(9);
        $socials = Social::all();
        $addresses = Address::all();
        $phone = Phone::all();
        $email = Email::all();
        $map = Map::all();
        $categories = Category::whereNull('parent_id')
            ->where('status', 1)
            ->orderBy('name')
            ->get();


        return view('frontend.blog.index', compact('blogs', 'addresses', 'categories', 'email', 'map', 'phone', 'socials'));
    }

    public function single($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        $relatedBlogs = Blog::where('id', '!=', $blog->id)
            ->latest()
            ->take(3)
            ->get();



        $socials = Social::all();
        $addresses = Address::all();
        $phone = Phone::all();
        $email = Email::all();
        $map = Map::all();
        $categories = Category::whereNull('parent_id')
            ->where('status', 1)
            ->orderBy('name')
            ->get();

        return view(
            'frontend.blog.single',
            compact('blog', 'relatedBlogs', 'addresses', 'categories', 'email', 'map', 'phone', 'socials')
        );
    }
}