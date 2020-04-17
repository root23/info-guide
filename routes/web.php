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
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function() {
    Route::resource('posts', 'PostController')->names('blog.posts');
});

// Cities
Route::group(['namespace' => 'Taxi', 'prefix' => 'taxi'], function () {
    Route::resource('cities', 'CityController')->names('taxi.cities');
});
Route::get('taxi/search_city', 'Taxi\CityController@search');

// Taxis
Route::group(['namespace' => 'Taxi', 'prefix' => 'taxi'], function () {
    Route::resource('taxis', 'TaxiController')->names('taxi.taxis');
});

// Contacts
$groupData = [
  'namespace' => 'Taxi',
  'prefix' => 'taxi',
];
Route::group($groupData, function () {
    $methods = ['index', 'store'];
    Route::resource('contacts', 'ContactController')
        ->only($methods)
        ->names('taxi.contacts');
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


// Sitemap
Route::get('sitemap.xml', 'Taxi\ContactController@sitemap');
Route::get('/sitemap', 'SitemapController@sitemap');

//Route::resource('rest', 'RestTestController')->names('restTest');
