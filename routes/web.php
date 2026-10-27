<?php

use App\Livewire\ShowAbout;
use Illuminate\Support\Facades\Route;
use App\Livewire\ShowHome;
use App\Livewire\ShowBlog;
use App\Livewire\News;
use App\Livewire\BlogDetails;
use App\Livewire\Customer\Register;
use App\Livewire\CustomerRegister;
use App\Livewire\EnquiryForm;
use App\Livewire\FeInspection;
use App\Livewire\OfficeCard;
use App\Livewire\OtherProducts;
use App\Livewire\VideoPage;
use App\Livewire\Resource;
use App\Livewire\Resources;
use App\Livewire\ShowProduct;
use App\Livewire\ShowProducts;
use App\Livewire\VerifyExtinguisher;
use App\Livewire\StoreLocator;
use App\Models\Product;
use App\Livewire\IndustryDetails;
use Stephenjude\FilamentBlog\Models\Post;
use App\Models\SeoSetting;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Blade;
use Z3d0X\FilamentFabricator\Http\Controllers\PageController;




// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',ShowHome::class)->name('home');
Route::get('/about',ShowAbout::class)->name('about');
Route::get('/news', News::class)->name('news');
Route::get('/news/{slug}', \App\Livewire\NewsDetails::class)->name('news.details');
Route::get('/admin/news-preview/{slug}', \App\Livewire\NewsPreview::class)
    ->middleware('auth')->name('news.preview');

Route::get('/admin/storage-link', function (Request $request) {
    if (! $request->user('web')) {
        return redirect()->route('filament.admin.auth.login');
    }

    abort_unless($request->user('web') instanceof User
        && $request->user('web')->canAccessPanel(Filament::getPanel('admin')), 403);

    return response(Blade::render(<<<'BLADE'
        <!DOCTYPE html>
        <html lang="en">
        <head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Storage link</title></head>
        <body>
            <h1>Create storage link</h1>
            <p>Make uploaded public images available on the website.</p>
            <form method="POST" action="{{ route('admin.storage-link.store') }}">
                @csrf
                <button type="submit">Create storage link</button>
            </form>
        </body>
        </html>
        BLADE));
})->name('admin.storage-link');

Route::post('/admin/storage-link', function (Request $request) {
    if (! $request->user('web')) {
        return redirect()->route('filament.admin.auth.login');
    }

    abort_unless($request->user('web') instanceof User
        && $request->user('web')->canAccessPanel(Filament::getPanel('admin')), 403);

    if (is_link(public_path('storage'))) {
        return response()->json(['message' => 'The public storage link already exists.']);
    }

    if (file_exists(public_path('storage'))) {
        return response()->json(['message' => 'public/storage already exists and is not a symbolic link. No changes made.'], 409);
    }

    $exitCode = Artisan::call('storage:link');
    $success = $exitCode === 0 && is_link(public_path('storage'));

    return response()->json([
        'message' => $success ? 'Storage link created successfully.' : 'Storage link could not be created. Check the server logs and filesystem permissions.',
    ], $success ? 200 : 500);
})->middleware('throttle:5,1')->name('admin.storage-link.store');

Route::get('/blog',ShowBlog::class)->name('blog');
Route::get('/blog/{slug}', BlogDetails::class)->name('blog.details');


Route::get('/youtube-gallery', VideoPage::class)->name('videos');
Route::get('/resources',Resources::class)->name('resource');
Route::get('/offices', OfficeCard::class)->name('offices');
Route::get('/enquiry', EnquiryForm::class)->name('enquiry');


Route::get('/products', ShowProducts::class)->name('products');
// Category, subcategory, subsubcategory filtering
Route::get('/products/category/{slug}', ShowProducts::class)->name('products.byCategory');
Route::get('/products/subcategory/{slug}', ShowProducts::class)->name('products.bySubcategory');
Route::get('/products/subsubcategory/{slug}', ShowProducts::class)->name('products.bySubsubcategory');
Route::get('/products/{slug}', ShowProduct::class)->name('products.show');

Route::get('/customer/register', Register::class)->name('customer.register');

Route::get('/verify-extinguisher', VerifyExtinguisher::class)->name('verify.extinguisher');

Route::get('/store-locator', StoreLocator::class)->name('storelocator');

Route::get('/fe-inspection', FeInspection::class)->name('feInspection');

Route::get('/other-products', OtherProducts::class)->name('otherproducts');

Route::get('/industries/{slug}', IndustryDetails::class)->name('industry.details');

/*
|--------------------------------------------------------------------------
| Sitemap.xml
|--------------------------------------------------------------------------
*/
Route::get('/sitemap.xml', function () {

    $urls = [];

    // Static / route-based pages
    SeoSetting::where('noindex', false)
        ->whereNotNull('route_name')
        ->get()
        ->each(function ($seo) use (&$urls) {
            try {
                $urls[] = [
                    'loc' => route($seo->route_name),
                    'lastmod' => $seo->updated_at->toAtomString(),
                    'changefreq' => 'weekly',
                    'priority' => '0.8',
                ];
            } catch (\Throwable $e) {
                // ignore invalid routes
            }
        });


           /*
    |--------------------------------------------------------------------------
    | 2️⃣ Product Detail Pages (SEO via seoable)
    |--------------------------------------------------------------------------
    */
    Product::where('status', true)
        ->select('slug', 'updated_at')
        ->chunk(200, function ($products) use (&$urls) {
            foreach ($products as $product) {
                $urls[] = [
                    'loc' => route('products.show', $product->slug),
                    'lastmod' => $product->updated_at->toAtomString(),
                    'changefreq' => 'weekly',
                    'priority' => '0.9',
                ];
            }
        });

    /*
    |--------------------------------------------------------------------------
    | 3️⃣ Blog Post Pages (SEO via seoable)
    |--------------------------------------------------------------------------
    */
    Post::published()
        ->select('slug', 'updated_at')
        ->chunk(200, function ($posts) use (&$urls) {
            foreach ($posts as $post) {
                $urls[] = [
                    'loc' => route('blog.details', $post->slug),
                    'lastmod' => $post->updated_at->toAtomString(),
                    'changefreq' => 'monthly',
                    'priority' => '0.7',
                ];
            }
        });


    return response()
        ->view('seo.sitemap', compact('urls'))
        ->header('Content-Type', 'application/xml');
})->name('sitemap');

/*
|--------------------------------------------------------------------------
| Robots.txt
|--------------------------------------------------------------------------
*/
Route::get('/robots.txt', function () {

    $disallowed = SeoSetting::where('noindex', true)
        ->pluck('route_name')
        ->map(fn ($route) => route($route, [], false))
        ->filter()
        ->unique();

    return response()
        ->view('seo.robots', compact('disallowed'))
        ->header('Content-Type', 'text/plain');
})->name('robots');


Route::get('/{filamentFabricatorPage:slug}', PageController::class)
    ->where('filamentFabricatorPage', '^(?!admin).*')
    ->name('page.view');
