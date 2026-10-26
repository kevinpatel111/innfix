<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('allows storing long product descriptions without truncation', function () {
    $category = Category::create([
        'name' => 'Test Category',
        'slug' => 'test-category',
        'status' => true,
    ]);

    $description = str_repeat('This is a long description. ', 80);

    $product = Product::create([
        'category_id' => $category->id,
        'name' => 'Test Product',
        'slug' => 'test-product',
        'product_descripion' => $description,
    ]);

    expect($product->product_descripion)->toBe($description);
});
