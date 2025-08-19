<?php

Route::resource('categorias', 'PortalEstudiantil\CategoriaCMSController');
Route::get('/admin/categorias', 'AdminController@categorias');

Route::resource('paginas', 'PortalEstudiantil\PaginaCMSController');
Route::get('/admin/paginas', 'AdminController@paginas');
Route::get('/admin/editor', 'AdminController@editor');
Route::post('/admin/prueba', 'AdminController@prueba');

Route::resource('carousel', 'PortalEstudiantil\CarouselCMSController');

