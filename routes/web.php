<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [CategoryController::class,'welcome']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('articles', 'App\Http\Controllers\ArticleController');
    /**
     * https://laravel.com/docs/8.x/middleware#defining-middleware
     * https://laravel.com/docs/8.x/middleware#assigning-middleware-to-routes
     * Normal Usage -> Route::resource('categories', CategoryController::class)->middleware('is_admin');
     * 
     */
    //Administrator Middleware
    Route::group(['middleware'=>'is_admin'], function(){
        Route::resource('categories', CategoryController::class);
    });

});
