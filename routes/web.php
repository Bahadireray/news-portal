<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdminPage;
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

Route::any('/login', 'App\Http\Controllers\LoginController@login')->name('login');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
Route::any('/register', 'App\Http\Controllers\LoginController@register')->name('register');

Route::middleware(CheckAdminPage::class)->prefix('/admin')->group(function() {
    Route::any('users', 'App\Http\Controllers\Admin\UserController@index')->name('users.list');
    Route::any('user/{id}/detail', 'App\Http\Controllers\Admin\UserController@update')->name('users.detail');
    Route::any('user/{id}/delete', 'App\Http\Controllers\Admin\UserController@delete')->name('users.delete');

    Route::any('log_activity', 'App\Http\Controllers\Admin\LogActivityController@index')->name('log.index');

    Route::any('categories', 'App\Http\Controllers\Admin\CategoryController@index')->name('category.index');
    Route::any('category/create', 'App\Http\Controllers\Admin\CategoryController@create')->name('category.create');
    Route::any('category/{id}/detail', 'App\Http\Controllers\Admin\CategoryController@update')->name('category.detail');
    Route::any('category/{id}/delete', 'App\Http\Controllers\Admin\CategoryController@delete')->name('category.delete');

    Route::any('news', 'App\Http\Controllers\Admin\NewsController@index')->name('admin.news.index');
    Route::any('news/create', 'App\Http\Controllers\Admin\NewsController@create')->name('admin.news.create');
    Route::any('news/{id}/detail', 'App\Http\Controllers\Admin\NewsController@update')->name('admin.news.detail');
    Route::any('news/{id}/delete', 'App\Http\Controllers\Admin\NewsController@delete')->name('admin.news.delete');
});
