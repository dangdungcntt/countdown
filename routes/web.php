<?php

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

Route::redirect('/', 'sites');

Auth::routes();

Route::resource('sites', 'SiteController');

Route::get('templates', 'TemplateController@index')->name('templates.index');
Route::get('templates/{template}/preview', 'TemplateController@preview')->name('templates.preview');
