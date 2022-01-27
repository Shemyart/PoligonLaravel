<?php

use App\Http\Controllers\Blog\Admin\CategoryController;
use App\Http\Controllers\Blog\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestTestController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['namespace' => '', 'prefix' => 'blog'], function () {
    Route::resource('posts', PostController::class)->names('blog.posts');
});


//Админка Блога
$groupData = [
    'namespace' =>'',
    'prefix'    =>'admin/blog',
];
Route::group($groupData, function(){
   // BlogCategory
    $methods = ['index', 'edit', 'update', 'create', 'store',];
    Route::resource('categories', CategoryController::class)
        ->only($methods)
        ->names('blog.admin.categories');
    //BlogPost
    Route::resource('posts', PostController::class)
        ->except(['show'])
        ->names('blog.admin.posts');
});

//Route::resource('rest', RestTestController::class)->names('restTest');
