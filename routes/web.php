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

Route::get('/', 'Artikel\ArtikelController@index');
Route::get('index', 'Artikel\ArtikelController@index')->name('page.index');
Route::get('detail', 'Artikel\ArtikelController@detail')->name('page.detail');
Route::get('kategori', 'Artikel\ArtikelController@kategori')->name('page.kategori');
Route::get('search', 'Artikel\ArtikelController@search')->name('page.search');
Route::get('like', 'Artikel\ArtikelController@like')->name('page.like');
Route::get('dislike', 'Artikel\ArtikelController@dislike')->name('page.dislike');
Route::post('comment', 'Artikel\ArtikelController@comment')->name('page.comment');
Route::group(['middleware' => ['auth']], function () {
    Route::get('admin', 'Admin\AdminController@index')->name('admin.index');
    Route::get('hint', 'Admin\AdminController@hint')->name('admin.hint');
    Route::get('create', 'Admin\AdminController@viewCreate')->name('admin.create');
    Route::get('delete', 'Admin\AdminController@delete')->name('admin.delete');
    Route::get('update', 'Admin\AdminController@update')->name('admin.update');
    Route::get('edit', 'Admin\AdminController@edit')->name('admin.edit');
    Route::post('create', 'Admin\AdminController@create')->name('admin.create');
    Route::post('uploader', 'Admin\AdminController@uploader')->name('admin.uploader');
    Route::get('daftar', 'Admin\AdminController@daftar')->name('admin.daftar');
    Route::post('reguser', 'Admin\AdminController@reguser')->name('admin.reguser');
    Route::get('hapus', 'Admin\AdminController@hapusUser')->name('admin.hapus');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'Admin\AdminController@index')->name('home');

