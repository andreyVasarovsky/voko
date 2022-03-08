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


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'IndexController')->name('admin.index');
    Route::group(['namespace' => 'Article', 'prefix' => 'articles'], function () {
        Route::get('/', 'IndexController')->name('admin.article.index');
        Route::get('/create', 'CreateController')->name('admin.article.create');
        Route::get('/{article}', 'ShowController')->name('admin.article.show');
        Route::get('/{article}/edit', 'EditController')->name('admin.article.edit');
        Route::post('/store', 'StoreController')->name('admin.article.store');
        Route::patch('/{article}', 'UpdateController')->name('admin.article.update');
        Route::delete('/{article}', 'DestroyController')->name('admin.article.destroy');
    });
//    Route::group(['namespace' => 'Photo', 'prefix' => 'photo'], function () {
//        Route::get('/', 'IndexController')->name('admin.photo.index');
//        Route::get('/create', 'CreateController')->name('admin.photo.create');
//        Route::get('/{photo}', 'ShowController')->name('admin.photo.show');
//        Route::get('/{photo}/edit', 'EditController')->name('admin.photo.edit');
//        Route::post('/store', 'StoreController')->name('admin.photo.store');
//        Route::patch('/{photo}', 'UpdateController')->name('admin.photo.update');
//        Route::delete('/{photo}', 'DestroyController')->name('admin.photo.destroy');
//    });
//    Route::group(['namespace' => 'Theme', 'prefix' => 'theme'], function () {
//        Route::get('/', 'IndexController')->name('admin.theme.index');
//        Route::get('/create', 'CreateController')->name('admin.theme.create');
//        Route::get('/{theme}', 'ShowController')->name('admin.theme.show');
//        Route::get('/{theme}/edit', 'EditController')->name('admin.theme.edit');
//        Route::post('/store', 'StoreController')->name('admin.theme.store');
//        Route::patch('/{theme}', 'UpdateController')->name('admin.theme.update');
//        Route::delete('/{theme}', 'DestroyController')->name('admin.theme.destroy');
//    });
//    Route::group(['namespace' => 'Visit', 'prefix' => 'visit'], function () {
//        Route::get('/', 'IndexController')->name('admin.visit.index');
//        Route::get('/create', 'CreateController')->name('admin.visit.create');
//        Route::get('/{visit}', 'ShowController')->name('admin.visit.show');
//        Route::get('/{visit}/edit', 'EditController')->name('admin.visit.edit');
//        Route::post('/store', 'StoreController')->name('admin.visit.store');
//        Route::patch('/{visit}', 'UpdateController')->name('admin.visit.update');
//        Route::delete('/{visit}', 'DestroyController')->name('admin.visit.destroy');
//    });
});

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/logout', function () {
    return view('welcome');
})->name('logout');
