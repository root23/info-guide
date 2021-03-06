<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
})->name('main');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function() {
    Route::resource('posts', 'PostController')->names('blog.posts');
});

// Organizations by category and city -- START --
Route::get('kompanii/{city}/{category}', 'Organization\OrganizationCategoryController@show')
    ->name('organizations.show');
// Organizations by category and city -- END --

// Organization and city -- START --
Route::get('kompanii/{city}/{category}/{organization}', 'Organization\OrganizationController@show')
    ->name('organization.show');
// Organization and city -- END --

// Cities with organizations -- START --
    Route::get('/cities/{city}/', 'Taxi\CityController@showCity')
        ->name('city.show');
    Route::get('/cities/', 'Taxi\CityController@showCities')
        ->name('cities.show');
// Cities with organizations -- END --

// Cities
Route::group(['namespace' => 'Taxi', 'prefix' => 'taxi'], function () {
    Route::resource('cities', 'CityController')->names('taxi.cities');
});
// Cities live search
Route::get('taxi/search_city', 'Taxi\CityController@search');
// Cities set cookie
Route::get('taxi/set_city_cookie', 'Taxi\CityController@setCityCookie');

// Taxis
Route::group(['namespace' => 'Taxi', 'prefix' => 'taxi'], function () {
    Route::resource('taxis', 'TaxiController')->names('taxi.taxis');
});

// Taxi reviews
Route::get('taxi/get_reviews', 'Taxi\ReviewController@search');
$groupData = [
    'namespace' => 'Taxi',
    'prefix' => 'taxi',
];
Route::group($groupData, function () {
    $methods = ['index', 'store'];
    Route::resource('reviews', 'ReviewController')
        ->only($methods)
        ->names('taxi.reviews');
});

// Organization reviews
Route::get('organization/get_reviews', 'Organization\OrganizationReviewController@search');
$groupData = [
    'namespace' => 'Organization',
    'prefix' => 'organization',
];
Route::group($groupData, function () {
    $methods = ['index', 'store'];
    Route::resource('reviews', 'OrganizationReviewController')
        ->only($methods)
        ->names('organization.reviews');
});

// Contacts
$groupData = [
  'namespace' => 'Taxi',
  'prefix' => '',
];
Route::group($groupData, function () {
    $methods = ['index', 'store'];
    Route::resource('contacts', 'ContactController')
        ->only($methods)
        ->names('contacts');
});

// Organization Images
$groupData = [
    'namespace' => 'Organization',
    'prefix' => 'organization'
];
Route::group($groupData, function () {
    $methods = ['index'];
    Route::resource('images', 'OrganizationImageController')
        ->only($methods)
        ->names('organization.images');
});

// About page
Route::get('taxi/about', 'Taxi\ContactController@about');

// Admin Panel
$groupData = [
    'namespace' => 'Blog\Admin',
    'prefix' => 'admin/blog',
];
Route::group($groupData, function () {
    // BlogCategory
    $methods = ['index', 'edit', 'store', 'update', 'create',];
    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('blog.admin.categories')
        ->middleware(['auth', 'can:manage-categories']);

    // BlogPosts
    Route::resource('posts', 'PostController')
        ->except('show')
        ->names('blog.admin.posts')
        ->middleware(['auth', 'can:manage-posts']);
});
// Admin cities
$groupData = [
    'namespace' => 'Taxi\Admin',
    'prefix' => 'admin/',
];
Route::group($groupData, function (){
    $methods = ['index', 'edit', 'store', 'update', 'create', 'destroy',];
    Route::resource('cities', 'CityController')
        ->only($methods)
        ->names('admin.cities')
        ->middleware(['auth', 'can:manage-cities']);
});

// Admin OrganizationCategories
$groupData = [
    'namespace' => 'Organization\Admin',
    'prefix' => 'admin/organizations/',
];

Route::group($groupData, function (){
    $methods = ['index', 'edit', 'store', 'update', 'create', 'destroy',];
    Route::resource('categories', 'OrganizationCategoryController')
        ->only($methods)
        ->names('organization.admin.categories')
        ->middleware(['auth', 'can:manage-organizations']);
});

// Admin Organizations -- START --
$groupData = [
    'namespace' => 'Organization\Admin',
    'prefix' => 'admin/organizations/',
];
Route::group($groupData, function(){
    $methods = ['index', 'edit', 'store', 'update', 'create', 'destroy',];
    Route::resource('organization', 'OrganizationController')
        ->only($methods)
        ->names('organization.admin.organization')
        ->middleware(['auth', 'can:manage-organizations']);
});
// Admin Organizations -- END --

// Admin taxis
$groupData = [
    'namespace' => 'Taxi\Admin',
    'prefix' => 'admin/',
];
Route::group($groupData, function (){
    $methods = ['index', 'edit', 'store', 'update', 'create', 'destroy',];
    Route::resource('taxis', 'TaxiController')
        ->only($methods)
        ->names('admin.taxis')
        ->middleware(['auth', 'can:manage-taxis']);
});

// Admin users -- START --
$groupData = [
    'namespace' => 'User\Admin',
    'prefix' => 'admin/',
];
Route::group($groupData, function () {
    $methods = ['index', 'edit', 'store', 'update', 'create', 'destroy'];
    Route::resource('users', 'UserController')
        ->only($methods)
        ->names('admin.users')
        ->middleware(['auth', 'can:manage-users']);
});
// Admin users -- END --

// Admin notifications
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function() {
    route::post('/mark-as-read', 'HomeController@markNotification')->name('markNotification');
});

// Search
Route::get('/search', [\App\Http\Controllers\Util\SearchController::class, 'search']);

// RSS (for turbo pages)
Route::feeds();

// Sitemap
Route::get('sitemap.xml', 'SitemapController@sitemap');
Route::get('/sitemaps/main.xml', 'SitemapController@main');
route::get('/sitemaps/cities.xml', 'SitemapController@cities');
route::get('/sitemaps/detail_cities.xml', 'SitemapController@citiesDetail');
route::get('/sitemaps/posts.xml', 'SitemapController@posts');
route::get('/sitemaps/taxis{i}.xml', 'SitemapController@taxis');
route::get('/sitemaps/organizations{i}.xml', 'SitemapController@cityOrganizations');
