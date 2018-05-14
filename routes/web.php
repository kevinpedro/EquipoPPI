<?php

Route::get('/', 'TestController@welcome');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/products','ProductController@index'); //listado
Route::get('/admin/products/create','ProductController@create'); //crear
Route::post('/admin/products','ProductController@store'); //Registrar
Route::get('/admin/products/{id}/edit','ProductController@edit'); //Formulario de edicion
Route::post('/admin/products/{id}/edit','ProductController@update'); //actualizar
Route::delete('/admin/products/{id}','ProductController@destroy'); //Formulario de eliminar