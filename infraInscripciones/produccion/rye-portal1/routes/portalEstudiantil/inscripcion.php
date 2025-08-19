<?php

Route::get('/primer-ingreso/inscripcion', 'PortalEstudiantil\InscripcionPrimerIngreso@index');
//Retorna todos los centros universitarios
Route::get('/SolicitudPrimerIngreso/CentrosUniversitarios', 'PortalEstudiantil\InscripcionPrimerIngreso@getCentrosUniversitarios');
//Retorna las respectivas unidades academicas
Route::post('/SolicitudPrimerIngreso/UnidadesAcademicas', 'PortalEstudiantil\InscripcionPrimerIngreso@getUnidadesAcademicas');

Route::get('/reglamentoelectoral', 'PagesController@reglamentoelectoral')->name('reglamento.electoral');
