<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Event;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Catalogue;
use App\Models\Subcategory;
use App\Models\Finish;
use App\Models\Product;
use App\Models\Homeproduct;
use App\Models\Social;
use App\Models\Address;
use App\Models\Phone;
use App\Models\Email;
use App\Models\Map;
use App\Models\Certificate;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use PHPStan\Rules\MissingTypehintCheck;




class PublicController extends Controller
{
    public function index(): View
    {
        return view('pages.index', [
            'homesliders' => Slider::all(),
            'homeproducts' => Homeproduct::all(),
            'socials' => Social::all(),
            'addresses' => Address::all(),
            'phone' => Phone::all(),
            'email' => Email::all(),
            'map' => Map::all(),
            'categories' => Category::all(),
            'subcategory' => Subcategory::all(),
            'latestProducts' => Product::latest()->take(5)->get(),
            'latestBlogs' => Blog::latest()->take(5)->get(),
        ]);
    }

    public function about(): View
    {
        return view('pages.about', [
            'socials' => Social::all(),
            'addresses' => Address::all(),
            'certificate' => Certificate::all(),
            'phone' => Phone::all(),
            'email' => Email::all(),
            'map' => Map::all(),
            'categories' => Category::all(),
            'subcategory' => Subcategory::all(),
        ]);
    }

    public function quality(): View
    {
        return view('pages.quality', $this->sharedData());
    }
    public function infrastructure(): View
    {
        return view('pages.infrastructure', $this->sharedData());
    }


    public function productMain()
    {
        $categories = Category::whereNull('parent_id')
            ->where('status', 1)
            ->orderBy('name')
            ->get();

        return view('pages.product-main', [
            'socials' => Social::all(),
            'addresses' => Address::all(),
            'phone' => Phone::all(),
            'email' => Email::all(),
            'map' => Map::all(),
            'categories' => $categories,
        ]);
    }


    public function categoryProducts(Category $category)
    {
        $childCategories = Category::where('parent_id', $category->id)
            ->where('status', 1)
            ->orderBy('name')
            ->get();

        if ($childCategories->isNotEmpty()) {
            return view('pages.product-main', [
                'categories' => $childCategories,
                'socials' => Social::all(),
                'addresses' => Address::all(),
                'phone' => Phone::all(),
                'email' => Email::all(),
                'map' => Map::all(),
            ]);
        }

        $product = Product::where('category_id', $category->id)
            ->where('status', 1)
            ->latest()
            ->first();

        if ($product) {
            return $this->singleProduct($product);
        }

        return view('pages.product-category', [
            'category' => $category,
            'subCategories' => collect(),
            'products' => collect(),
            'socials' => Social::all(),
            'addresses' => Address::all(),
            'phone' => Phone::all(),
            'email' => Email::all(),
            'map' => Map::all(),
            'categories' => Category::whereNull('parent_id')
                ->where('status', 1)
                ->get(),
        ]);
    }


    public function singleProduct(Product $product)
    {
        // LOAD RELATIONSHIPS
        $product->load(['category', 'features']);

        // Gallery
        $gallery = is_array($product->gallery)
            ? $product->gallery
            : [];

        // Category
        $category = Category::find($product->category_id);

        // Related products
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', 1)
            ->latest()
            ->limit(8)
            ->get();

        return view('pages.product-detail', [

            'product' => $product,

            // gallery only
            'gallery' => $gallery,

            'relatedProducts' => $relatedProducts,

            'category' => $category,

            // shared layout data
            'socials' => Social::all(),
            'addresses' => Address::all(),
            'phone' => Phone::all(),
            'email' => Email::all(),
            'map' => Map::all(),

            'categories' => Category::whereNull('parent_id')
                ->where('status', 1)
                ->get(),
        ]);
    }



    public function findWithStateID(int $id): JsonResponse
    {
        return response()->json(
            Subcategory::where('category_name', $id)->get()
        );
    }

    public function findWithFinishID(int $id): JsonResponse
    {
        return response()->json(
            Finish::where('category_size', $id)->get()
        );
    }



    public function download(): View
    {
        return view('pages.download', $this->sharedData());
    }

    public function coming_soon(): View
    {
        return view('pages.coming-soon', $this->sharedData());
    }




    public function contact(): View
    {
        return view('pages.contact', $this->sharedData());

    }


    /**
     * Shared data for static pages
     */
    private function sharedData(): array
    {
        return [
            'socials' => Social::all(),
            'addresses' => Address::all(),
            'phone' => Phone::all(),
            'email' => Email::all(),
            'map' => Map::all(),
            'categories' => Category::whereNull('parent_id')
                ->where('status', 1)
                ->orderBy('name')
                ->get(),
            'subcategory' => Subcategory::all(),
            'catalogues' => Catalogue::where('status', 1)
                    ->latest()
                    ->get()
        ];
    }



}
