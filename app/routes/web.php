<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Frontend\BlogFrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\SitemapController;

/*
|--------------------------------------------------------------------------
| Admin Controllers
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\{
    SliderController,
    EventController,
    HomeproductController,
    BreadcrumbpageController,
    BreadcrumbimageController,
    CertificateController,
    AddressController,
    EmailController,
    PhoneController,
    MapController,
    SocialController,
    CategoryController,
    SubcategoryController,
    FinishController,
    ProductController,
    CatalogueController,
    PackingController,
    ContactController,
    DownloadinquiryController,
    InquiryController
};

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicController::class, 'index'])->name('index');
Route::get('/about', [PublicController::class, 'about'])->name('about');

Route::get('/single-product/{id}', [PublicController::class, 'single_product'])->name('single-product');
Route::get('/download', [PublicController::class, 'download'])->name('download');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::get('/quality', [PublicController::class, 'quality'])->name('quality');
// Route::get('/network', [PublicController::class, 'network'])->name('network');
Route::get('/infrastructure', [PublicController::class, 'infrastructure'])->name('infrastructure');
Route::get('/coming-soon', [PublicController::class, 'coming_soon'])->name('coming-soon');

Route::post('/sub-product-filter/{id}', [PublicController::class, 'sub_product_filter'])->name('sub-product-filter');
Route::post('/findWithCatID/{id}', [PublicController::class, 'findWithStateID']);
Route::post('/findWithFinishID/{id}', [PublicController::class, 'findWithFinishID']);
Route::post('/clearAction', [PublicController::class, 'clearAction'])->name('clearAction');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


// products
Route::get('/product', [PublicController::class, 'productMain'])
    ->name('product.main');

Route::get('/product/{category:slug}', [PublicController::class, 'categoryProducts'])
    ->name('product.category');

Route::get('/product-detail/{product:slug}', [PublicController::class, 'singleProduct'])
    ->name('product.single');


Route::get('/blog', [BlogFrontendController::class, 'index'])
    ->name('blog');

Route::get('/blog/{slug}', [BlogFrontendController::class, 'single'])
    ->name('blog.single');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])
    ->name('sitemap');


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Admin CRUD Routes
    |--------------------------------------------------------------------------
    */

    Route::resource('sliders', SliderController::class)->except(['show']);
    Route::get('sliders/{id}/delete', [SliderController::class, 'destroy'])->name('sliders.delete');
    Route::post('/sliders/change-status', [SliderController::class, 'changeStatus'])
        ->name('changeStatus');

    Route::resource('events', EventController::class)->except(['show']);
    Route::get('events/{id}/delete', [EventController::class, 'destroy'])->name('events.delete');

    Route::resource('homeproducts', HomeproductController::class)->except(['show']);
    Route::get('homeproducts/{id}/delete', [HomeproductController::class, 'destroy'])->name('homeproducts.delete');

    Route::resource('breadcrumbpages', BreadcrumbpageController::class)->except(['show']);
    Route::get('breadcrumbpages/{id}/delete', [BreadcrumbpageController::class, 'destroy'])->name('breadcrumbpages.delete');
    Route::get('changeStatusPage', [BreadcrumbpageController::class, 'changeStatus'])->name('breadcrumbpages.changeStatus');

    Route::resource('breadcrumbimages', BreadcrumbimageController::class)->except(['show']);
    Route::get('breadcrumbimages/{id}/delete', [BreadcrumbimageController::class, 'destroy'])->name('breadcrumbimages.delete');
    Route::get('changeStatusImage', [BreadcrumbimageController::class, 'changeStatus'])->name('breadcrumbimages.changeStatus');

    Route::resource('certificates', CertificateController::class)->except(['show']);
    Route::delete('/certificates/{id}', [CertificateController::class, 'destroy'])
        ->name('certificates.destroy');


    Route::resource('addresses', AddressController::class)->except(['show']);

    Route::resource('emails', EmailController::class)->except(['show']);
    Route::resource('phones', PhoneController::class)->except(['show']);
    Route::resource('maps', MapController::class)->except(['show']);
    Route::resource('socials', SocialController::class)->except(['show']);

    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::get('changeStatusCat', [CategoryController::class, 'changeStatus'])->name('categories.changeStatus');
    Route::post(
        '/categories/toggle-status',
        [CategoryController::class, 'toggleStatus']
    )->name('categories.toggleStatus');

    Route::resource('subcategories', SubcategoryController::class)->except(['show']);
    Route::patch(
        'subcategories/{subcategory}/change-status',
        [SubcategoryController::class, 'changeStatus']
    )->name('changeStatusSize');

    Route::get('/filtersubcategoriessize/{categoryId}', [SubcategoryController::class, 'filterByCategory']);

    Route::resource('finishes', FinishController::class)->except(['show']);
    Route::get('changeStatusFinish', [FinishController::class, 'changeStatus'])->name('finishes.changeStatus');
    Route::get('/filtersubcategories/{categoryId}', [FinishController::class, 'filterByCategory']);
    Route::get('/filterfinishsize/{categoryId}', [FinishController::class, 'filterBySize']);

    Route::resource('products', ProductController::class)->except(['show']);
    Route::post('/products/toggle-status', [ProductController::class, 'toggleStatus'])
        ->name('products.toggleStatus');
    Route::get('changeStatusProduct', [ProductController::class, 'changeStatus'])->name('products.changeStatus');


    Route::resource('catalogues', CatalogueController::class)->except(['show']);
    Route::get('changeStatusCatalogue', [CatalogueController::class, 'changeStatus'])->name('catalogues.changeStatus');

    Route::resource('packings', PackingController::class)->except(['show']);

    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{id}/delete', [ContactController::class, 'destroy'])->name('contacts.delete');

    Route::get('/downloadinquiries', [DownloadinquiryController::class, 'index'])->name('downloadinquiries.index');
    Route::delete('/download-inquiries/{id}', [DownloadinquiryController::class, 'destroy'])
        ->name('downloadinquiries.destroy');

    Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
    Route::get('/inquiries/{id}/delete', [InquiryController::class, 'destroy'])->name('inquiries.delete');

    Route::resource('blogs', BlogController::class);
    Route::post('/blogs/upload', [BlogController::class, 'upload'])
        ->name('blogs.upload');


    Route::resource('features', FeatureController::class);


});

/*
|--------------------------------------------------------------------------
| Public POST Routes
|--------------------------------------------------------------------------
*/
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::post('/downloadinquiries', [DownloadinquiryController::class, 'store'])->name('downloadinquiries.store');
Route::post('/inquiries', [InquiryController::class, 'store'])->name('inquiries.store');







require __DIR__ . '/auth.php';
