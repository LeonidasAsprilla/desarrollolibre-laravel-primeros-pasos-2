<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Web\BlogContoller;
use Illuminate\Routing\RouteGroup;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(["prefix" => "dashboard", "middleware" => ["auth", "admin"]], function (){
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resources([
        'post' => PostController::class,
        'category' => CategoryController::class,
    ]);
});

Route::group(['prefix' => 'blog'], function(){
    Route::controller(BlogContoller::class)->group(function(){
        Route::get('/', "index")->name("web.blog.index");
        Route::get('/{post}', "show")->name("web.blog.show");
    });
});

require __DIR__.'/auth.php';
