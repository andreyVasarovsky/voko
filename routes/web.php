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
//    Route::group(['namespace' => 'Client', 'prefix' => 'clients'], function () {
//        Route::get('/', 'IndexController')->name('admin.client.index');
//        Route::get('/create', 'CreateController')->name('admin.client.create');
//        Route::get('/{client}', 'ShowController')->name('admin.client.show');
//        Route::get('/{client}/edit', 'EditController')->name('admin.client.edit');
//        Route::post('/store', 'StoreController')->name('admin.client.store');
//        Route::patch('/{client}', 'UpdateController')->name('admin.client.update');
//        Route::delete('/{client}', 'DestroyController')->name('admin.client.destroy');
//    });
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
