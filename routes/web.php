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

//Route::resource('rest', 'RestTestController')->names('restTest');
