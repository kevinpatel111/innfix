<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a static sitemap.xml in the public directory';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating sitemap...');

        $urls = [];

        // 1. Static Pages
        $urls[] = [
            'loc' => route('index'),
            'lastmod' => now()->toIso8601String(),
            'changefreq' => 'daily',
            'priority' => '1.0',
        ];

        $urls[] = [
            'loc' => route('about'),
            'lastmod' => now()->toIso8601String(),
            'changefreq' => 'monthly',
            'priority' => '0.8',
        ];

        $urls[] = [
            'loc' => route('product.main'),
            'lastmod' => now()->toIso8601String(),
            'changefreq' => 'weekly',
            'priority' => '0.9',
        ];

        $urls[] = [
            'loc' => route('quality'),
            'lastmod' => now()->toIso8601String(),
            'changefreq' => 'monthly',
            'priority' => '0.8',
        ];

        $urls[] = [
            'loc' => route('infrastructure'),
            'lastmod' => now()->toIso8601String(),
            'changefreq' => 'monthly',
            'priority' => '0.8',
        ];

        $urls[] = [
            'loc' => route('download'),
            'lastmod' => now()->toIso8601String(),
            'changefreq' => 'monthly',
            'priority' => '0.7',
        ];

        $urls[] = [
            'loc' => route('contact'),
            'lastmod' => now()->toIso8601String(),
            'changefreq' => 'monthly',
            'priority' => '0.8',
        ];

        $urls[] = [
            'loc' => route('blog'),
            'lastmod' => now()->toIso8601String(),
            'changefreq' => 'daily',
            'priority' => '0.8',
        ];

        // 2. Categories
        $categories = Category::where('status', 1)->get();
        foreach ($categories as $category) {
            if ($category->slug) {
                $urls[] = [
                    'loc' => route('product.category', $category->slug),
                    'lastmod' => ($category->updated_at ?? now())->toIso8601String(),
                    'changefreq' => 'weekly',
                    'priority' => '0.8',
                ];
            }
        }

        // 3. Products
        $products = Product::where('status', 1)->get();
        foreach ($products as $product) {
            if ($product->slug) {
                $urls[] = [
                    'loc' => route('product.single', $product->slug),
                    'lastmod' => ($product->updated_at ?? now())->toIso8601String(),
                    'changefreq' => 'weekly',
                    'priority' => '0.9',
                ];
            }
        }

        // 4. Blogs
        $blogs = Blog::where('status', 1)->get();
        foreach ($blogs as $blog) {
            if ($blog->slug) {
                $urls[] = [
                    'loc' => route('blog.single', $blog->slug),
                    'lastmod' => ($blog->updated_at ?? now())->toIso8601String(),
                    'changefreq' => 'weekly',
                    'priority' => '0.7',
                ];
            }
        }

        $xml = view('sitemap', compact('urls'))->render();

        file_put_contents(public_path('sitemap.xml'), $xml);

        $this->info('sitemap.xml successfully generated in public directory with ' . count($urls) . ' URLs!');
    }
}
