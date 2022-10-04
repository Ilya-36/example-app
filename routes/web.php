<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\UserController;
use App\Http\Controllers\RestTestController;
//use App\Http\Controllers\PostController;
//use App\Http\Controllers\HomeController;

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

Route::get('/api/kek', function () {

    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'digging_deeper',], function () {
    Route::get('/collections', [App\Http\Controllers\DiggingDeeperController::class, 'collections'])
        ->name('digging_deeper.collections');
});


Route::group(['namespace' => 'App\Http\Controllers\Blog', 'prefix' => 'blog'], function () {
    Route::resource('posts', PostController::class)->names('blog.posts');
});


//> Админка Блога
$groupData = [
    'namespace' => 'App\Http\Controllers\Blog\Admin',
    'prefix'    => 'admin/blog',
];
Route::group($groupData, function() {
    //BlogCategory
    $methods = ['index', 'edit', 'update', 'create', 'store'];
    Route::resource('categories', CategoryController::class)
    ->only($methods)
    ->names('blog.admin.categories');

    //BlogPost
    Route::resource('posts', PostController::class)
    ->except(['show'])
    ->names('blog.admin.posts');
});

//Route::resource('rest', RestTestController::class)->names('restTest');
