<?php
Auth::routes();
Route::get('/','BaseController@getIndex');
Route::get('category/{id}', 'CategoryController@getIndex');
//home
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@postIndex');
Route::get('/home/edit/{id}','HomeController@getEdit');
Route::get('/home/delete/{id}','HomeController@getDelete');
Route::post('/home/edit/{id}','HomeController@postEdit');

//default always end
Route::get('{url}','MaintextController@getIndex');