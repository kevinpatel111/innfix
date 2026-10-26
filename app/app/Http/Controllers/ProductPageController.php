<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Social;
use App\Models\Address;
use App\Models\Phone;
use App\Models\Email;
use App\Models\Map;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class ProductPageController extends Controller
{
    /**
     * STEP 1:
     * Products landing page
     * Shows ONLY main categories
     * URL: /products
     */
    public function categories(): View
    {
        return view('pages.product.categories', [
            'categories' => Category::whereNull('parent_id')->get(),
        ] + $this->sharedData());
    }

    /**
     * STEP 2:
     * Category product page
     * URL: /products/{category}
     */
    public function index(Category $category, Request $request): View
    {
        // get all category ids (self + children + grandchildren)
        $categoryIds = $this->getAllCategoryIds($category);

        // base product query
        $productsQuery = Product::whereIn('category_id', $categoryIds)
            ->where('status', 1);

        // filter by checkbox categories
        if ($request->filled('filters')) {
            $productsQuery->whereIn('category_id', $request->filters);
        }

        return view('pages.product.index', [
            'category'  => $category,
            'products'  => $productsQuery->paginate(9),
            'filters'   => Category::where('parent_id', $category->id)
                                ->with('children')
                                ->get(),
        ] + $this->sharedData());
    }

    /**
     * STEP 3:
     * AJAX filter (checkbox)
     */
    public function filter(Request $request): JsonResponse
    {
        $products = Product::whereIn('category_id', $request->filters)
            ->where('status', 1)
            ->get();

        return response()->json($products);
    }

    /**
     * STEP 4:
     * Single product page
     * URL: /product/{slug}
     */
    public function show(string $slug): View
    {
        $product = Product::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return view('pages.product.show', [
            'product' => $product,
        ] + $this->sharedData());
    }

    /**
     * Recursive category id resolver
     */
    private function getAllCategoryIds(Category $category): array
    {
        $ids = [$category->id];

        foreach ($category->children as $child) {
            $ids = array_merge($ids, $this->getAllCategoryIds($child));
        }

        return $ids;
    }

    /**
     * Shared frontend data
     */
    private function sharedData(): array
    {
        return [
            'socials'    => Social::all(),
            'addresses'  => Address::all(),
            'phone'      => Phone::all(),
            'email'      => Email::all(),
            'map'        => Map::all(),
            'categories' => Category::whereNull('parent_id')->get(),
        ];
    }
}
