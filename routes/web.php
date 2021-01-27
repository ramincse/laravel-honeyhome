<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'App\Http\Controllers\FrontendController@homePage');
Route::get('/blog', 'App\Http\Controllers\FrontendController@blogPage') -> name('blog');
Route::get('/blog-single/{slug}', 'App\Http\Controllers\FrontendController@singlePage') -> name('blog.single');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Route for Post Category
 */
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'post'], function(){
    Route::resource('category', 'CategoryController');
    Route::get('category-edit/{id}', 'CategoryController@edit') -> name('edit.category');
    Route::post('category-update', 'CategoryController@update') -> name('update.category');
    Route::get('category/unpublished/{id}', 'CategoryController@unpublishedCategory') -> name('category.unpublished');
    Route::get('category/published/{id}', 'CategoryController@publishedCategory') -> name('category.published');
});

/**
 * Route for Post Tag
 */
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'post'], function(){
    Route::resource('tag', 'TagController');
    Route::get('tag-edit/{id}', 'TagController@edit') -> name('edit.tag');
    Route::post('tag-update', 'TagController@update') -> name('update.tag');
    Route::get('tag/unpublished/{id}', 'TagController@unpublishedTag') -> name('tag.unpublished');
    Route::get('tag/published/{id}', 'TagController@publishedTag') -> name('tag.published');
});

/**
 * Route for Post
 */
Route::resource('post', 'App\Http\Controllers\PostController');
/**
 * Route for Post Edit
 */
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'post'], function(){
    Route::get('edit/{id}', 'PostController@edit');
});
Route::patch('post-update', 'App\Http\Controllers\PostController@postUpdate') -> name('post.update.ajax');
/**
 * Route for Blog Post search by Category
 */
Route::get('category/{slug}', 'App\Http\Controllers\FrontendController@postByCategory') -> name('blog.search.category');

/**
 * Route for Blog Post search by Search Box
 */
Route::post('search', 'App\Http\Controllers\FrontendController@postBySearch') -> name('post.search');

/**
 * Route for Settings
 */
Route::get('settings/logo', 'App\Http\Controllers\SettingsController@logoIndex') -> name('logo.index');
Route::put('logo-update', 'App\Http\Controllers\SettingsController@logoUpdate') -> name('logo.update');

/**
 * Route for Social
 */
Route::get('settings/social', 'App\Http\Controllers\SettingsController@socialIndex') -> name('social.index');
Route::post('social-update', 'App\Http\Controllers\SettingsController@socialUpdate') -> name('social.update');

/**
 * Route for Slider
 */
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'home'], function(){
    Route::get('slider', 'HomePageController@index') -> name('slider.index');
    Route::put('slider/store', 'HomePageController@sliderStore') -> name('slider.store');
});


