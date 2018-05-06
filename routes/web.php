<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', function (){
	return 'Hola soy la ruta de prueba';
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
