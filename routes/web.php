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
    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
        Route::post('/store', 'StoreController')->name('admin.tag.store');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'DestroyController')->name('admin.tag.destroy');
    });
//    Route::group(['namespace' => 'Theme', 'prefix' => 'theme'], function () {
//        Route::get('/', 'IndexController')->name('admin.theme.index');
//        Route::get('/create', 'CreateController')->name('admin.theme.create');
//        Route::get('/{theme}', 'ShowController')->name('admin.theme.show');
//        Route::get('/{theme}/edit', 'EditController')->name('admin.theme.edit');
//        Route::post('/store', 'StoreController')->name('admin.theme.store');
//        Route::patch('/{theme}', 'UpdateController')->name('admin.theme.update');
//        Route::delete('/{theme}', 'DestroyController')->name('admin.theme.destroy');
//    });
});

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/logout', function () {
    return view('welcome');
})->name('logout');
