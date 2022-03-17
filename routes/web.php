<?php

use App\Http\Controllers\Public\Comment\StoreController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['can:admin_panel_access']], function () {
    Route::get('/', 'IndexController')->name('admin.index');
    Route::group(['namespace' => 'Article', 'prefix' => 'articles', 'middleware' => ['can:article_access']], function () {
        Route::get('/', 'IndexController')->name('admin.article.index')->middleware('can:article_access');
        Route::get('/create', 'CreateController')->name('admin.article.create')->middleware('can:article_create');
        Route::get('/{article}', 'ShowController')->name('admin.article.show')->middleware('can:article_show');
        Route::get('/{article}/edit', 'EditController')->name('admin.article.edit')->middleware('can:article_edit');
        Route::post('/store', 'StoreController')->name('admin.article.store')->middleware('can:article_create');
        Route::patch('/{article}', 'UpdateController')->name('admin.article.update')->middleware('can:article_edit');
        Route::delete('/{article}', 'DestroyController')->name('admin.article.destroy')->middleware('can:article_delete');
    });
    Route::group(['namespace' => 'Tag', 'prefix' => 'tags', 'middleware' => ['can:tag_access']], function () {
        Route::get('/', 'IndexController')->name('admin.tag.index')->middleware('can:tag_access');
        Route::get('/create', 'CreateController')->name('admin.tag.create')->middleware('can:tag_create');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show')->middleware('can:tag_show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit')->middleware('can:tag_edit');
        Route::post('/store', 'StoreController')->name('admin.tag.store')->middleware('can:tag_create');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update')->middleware('can:tag_edit');
        Route::delete('/{tag}', 'DestroyController')->name('admin.tag.destroy')->middleware('can:tag_delete');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'categories', 'middleware' => ['can:category_access']], function () {
        Route::get('/', 'IndexController')->name('admin.category.index')->middleware('can:category_access');
        Route::get('/create', 'CreateController')->name('admin.category.create')->middleware('can:category_create');
        Route::get('/{category}', 'ShowController')->name('admin.category.show')->middleware('can:category_show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit')->middleware('can:category_edit');
        Route::post('/store', 'StoreController')->name('admin.category.store')->middleware('can:category_create');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update')->middleware('can:category_edit');
        Route::delete('/{category}', 'DestroyController')->name('admin.category.destroy')->middleware('can:category_delete');
    });
    Route::group(['namespace' => 'User', 'prefix' => 'users', 'middleware' => ['can:user_access']], function () {
        Route::get('/', 'IndexController')->name('admin.user.index')->middleware('can:user_access');
        Route::post('/', 'IndexController')->name('admin.client.index')->middleware('can:user_access');
        Route::get('/create', 'CreateController')->name('admin.user.create')->middleware('can:user_create');
        Route::get('/{user}', 'ShowController')->name('admin.user.show')->middleware('can:user_show');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit')->middleware('can:user_edit');
        Route::post('/store', 'StoreController')->name('admin.user.store')->middleware('can:user_create');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update')->middleware('can:user_edit');

        Route::group(['namespace' => 'Ban', 'prefix' => 'ban', 'middleware' => ['can:reader_ban_access']], function() {
            Route::patch('/{user}/add', 'AddController')->name('admin.user.ban.add')->middleware('can:reader_ban_access');
            Route::patch('/{user}/remove', 'RemoveController')->name('admin.user.ban.remove')->middleware('can:reader_ban_access');
        });

        Route::delete('/{user}', 'DestroyController')->name('admin.user.destroy')->middleware('can:user_delete');
    });
    Route::group(['namespace' => 'Comment', 'prefix' => 'comments', 'middleware' => ['can:comment_access']], function () {
        Route::get('/', 'IndexController')->name('admin.comment.index')->middleware('can:comment_access');
        Route::get('/{comment}/edit', 'EditController')->name('admin.comment.edit')->middleware('can:comment_edit');
        Route::patch('/{comment}', 'UpdateController')->name('admin.comment.update')->middleware('can:comment_edit');
        Route::delete('/{comment}', 'DestroyController')->name('admin.comment.destroy')->middleware('can:comment_delete');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Public', 'prefix' => '/'], function () {
    Route::get('', 'IndexController')->name('public.index');
    Route::group(['namespace' => 'Article', 'prefix' => 'articles'], function () {
        Route::get('/', 'IndexController')->name('public.article.index');
        Route::get('/{article}', 'ShowController')->name('public.article.show');
    });
    Route::group(['namespace' => 'Comment', 'prefix' => 'comments'], function () {
        Route::get('/store', function () { abort(404); });
        Route::post('/store', 'StoreController')->name('public.comment.store');
    });
    Route::middleware('is_editable_profile_self')->group(function () {
        Route::group(['namespace' => 'Profile', 'prefix' => 'profile'], function () {
            Route::get('/{user}/edit', 'EditController')->name('public.profile.edit');
            Route::patch('/{user}', 'UpdateController')->name('public.profile.update');
        });
    });
});
Auth::routes(['verify' => true]);
