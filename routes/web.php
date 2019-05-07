<?php
Route::get('/admin/register', 'Admin\AdminController@register');
Route::post('/admin/register/create', 'Admin\AdminController@create')->name('createAdmin');

Route::get('/admin/login', 'Admin\AdminController@login')->name('login');
Route::post('/admin/login/check', 'Admin\AdminController@loginCheck')->name('loginCheck');

Route::get('/admin/dashboard', 'Admin\AdminController@index')->name('index');
Route::get('/admin/logout', 'Admin\AdminController@logout')->name('logout');

Route::get('/admin/restoran', 'Admin\RestoranController@index')->name('restolist');
Route::get('/admin/restoran/create', 'Admin\RestoranController@create')->name('restoadd');
// Route::get('/admin/users', 'Admin\AdminController@users')->name('userlist');
Route::get('/admin/menu', 'Admin\MenuController@index')->name('menulist');
Route::get('/admin/report', 'Admin\ReportController@index')->name('reportlist');
