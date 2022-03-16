<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['can:admin_panel_access']], function () {
    Route::get('/', 'IndexController')->name('admin.index');
    Route::group(['namespace' => 'Article', 'prefix' => 'articles', 'middleware' => ['can:article_access']], function () {
        Route::get('/', 'IndexController')->name('admin.article.index');
        Route::get('/create', 'CreateController')->name('admin.article.create');
        Route::get('/{article}', 'ShowController')->name('admin.article.show');
        Route::get('/{article}/edit', 'EditController')->name('admin.article.edit');
        Route::post('/store', 'StoreController')->name('admin.article.store');
        Route::patch('/{article}', 'UpdateController')->name('admin.article.update');
        Route::delete('/{article}', 'DestroyController')->name('admin.article.destroy');
    });
    Route::group(['namespace' => 'Tag', 'prefix' => 'tags', 'middleware' => ['can:tag_access']], function () {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
        Route::post('/store', 'StoreController')->name('admin.tag.store');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'DestroyController')->name('admin.tag.destroy');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'categories', 'middleware' => ['can:category_access']], function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::post('/store', 'StoreController')->name('admin.category.store');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DestroyController')->name('admin.category.destroy');
    });
    Route::group(['namespace' => 'User', 'prefix' => 'users', 'middleware' => ['can:user_access']], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::post('/store', 'StoreController')->name('admin.user.store');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DestroyController')->name('admin.user.destroy');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Public', 'prefix' => '/'], function () {
    Route::get('', 'IndexController')->name('public.index');
    Route::group(['namespace' => 'Article', 'prefix' => 'articles'], function () {
        Route::get('/', 'IndexController')->name('public.article.index');
        Route::get('/{article}', 'ShowController')->name('public.article.show');
    });
});
Auth::routes(['verify' => true]);
