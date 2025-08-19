<?php

#Por llave primaria compuesta
Route::get('extension/get_by_ua', 'PortalAdministrativo\extensionController@get_by_ua')->name('extension.get_by_ua');
Route::get('extension/get_active_ext_by_ua', 'PortalAdministrativo\extensionController@get_active_ext_by_ua')->name('extension.get_active_ext_by_ua');
Route::get('carrera/get_by_ext', 'PortalAdministrativo\carreraController@get_by_ext')->name('carrera.get_by_ext');
Route::get('carrera/get_active_car_by_ext', 'PortalAdministrativo\carreraController@get_active_car_by_ext')->name('carrera.get_active_car_by_ext');
Route::get('carrera/get_by_ext_lvl', 'PortalAdministrativo\carreraController@get_by_ext_lvl')->name('carrera.get_by_ext_lvl');

#Carrera
Route::get('carrera/{id}/ext/{ext}/ua/{ua}','PortalAdministrativo\carreraController@showCarrera');
Route::get('carrera/{id}/ext/{ext}/ua/{ua}/edit','PortalAdministrativo\carreraController@editCarrera');
Route::resource('carrera', 'PortalAdministrativo\carreraController');
Route::get('carrera/{id}/ext/{ext}/ua/{ua}/darDeBajaCarrera', 'PortalAdministrativo\carreraController@darDeBajaCarrera')->name('carrera.darDeBajaCarrera');
Route::patch('carrera/{id}/ext/{ext}/ua/{ua}/carreraDesactivada', 'PortalAdministrativo\carreraController@carreraDesactivada')->name('carrera.carreraDesactivada');
Route::get('carrera/{id}/ext/{ext}/ua/{ua}/activarCarrera', 'PortalAdministrativo\carreraController@activarCarrera')->name('carrera.activarCarrera');
Route::patch('carrera/{id}/ext/{ext}/ua/{ua}/carreraActivada', 'PortalAdministrativo\carreraController@carreraActivada')->name('carrera.carreraActivada');


#Solicitud de carrera
Route::get('carreraSolicitud/{id}/ext/{ext}/ua/{ua}','PortalAdministrativo\carreraSolicitudController@showCarreraSolicitud');
Route::resource('carreraSolicitud', 'PortalAdministrativo\carreraSolicitudController');
Route::post('aprobarSolicitudCarrera','PortalAdministrativo\carreraSolicitudController@aprobarSolicitudCarrera')->name('carreraSolicitud.aprobarSolicitudCarrera');
Route::post('rechazarSolicitudCarrera','PortalAdministrativo\carreraSolicitudController@rechazarSolicitudCarrera')->name('carreraSolicitud.rechazarSolicitudCarrera');;


#Tipo Unidad Académica
Route::resource('tipo_-u-a', 'PortalAdministrativo\tipo_UAController');

#Unidad Académica
Route::resource('facultad', 'PortalAdministrativo\facultadController');
Route::get('facultad/{id}/darDeBajaUnidadAcademica', 'PortalAdministrativo\facultadController@darDeBajaUnidadAcademica')->name('facultad.darDeBajaUnidadAcademica');
Route::patch('facultad/{id}/unidadAcademicaDesactivada', 'PortalAdministrativo\facultadController@unidadAcademicaDesactivada')->name('facultad.unidadAcademicaDesactivada');
Route::get('facultad/{id}/activarUnidadAcademica', 'PortalAdministrativo\facultadController@activarUnidadAcademica')->name('facultad.activarUnidadAcademica');
Route::patch('facultad/{id}/unidadAcademicaActivada', 'PortalAdministrativo\facultadController@unidadAcademicaActivada')->name('facultad.unidadAcademicaActivada');

#Por llave primaria compuesta
Route::get('extension/ext/{ext}/ua/{ua}','PortalAdministrativo\extensionController@showExtension');
Route::get('extension/ext/{ext}/ua/{ua}/edit','PortalAdministrativo\extensionController@editExtension');
Route::resource('extension', 'PortalAdministrativo\extensionController');
Route::get('extension/ext/{ext}/ua/{ua}/darDeBajaExtension', 'PortalAdministrativo\extensionController@darDeBajaExtension')->name('extension.darDeBajaExtension');
Route::patch('extension/ext/{ext}/ua/{ua}/extensionDesactivada', 'PortalAdministrativo\extensionController@extensionDesactivada')->name('extension.extensionDesactivada');
Route::get('extension/ext/{ext}/ua/{ua}/activarExtension', 'PortalAdministrativo\extensionController@activarExtension')->name('extension.activarExtension');
Route::patch('extension/ext/{ext}/ua/{ua}/extensionActivada', 'PortalAdministrativo\extensionController@extensionActivada')->name('extension.extensionActivada');

/* Solicitud Usuario*/
Route::resource('solicitud-usuario', 'PortalAdministrativo\solicitudUsuarioController');
Route::get('solicitud-usuario/{id}/denegarSolicitud', 'PortalAdministrativo\solicitudUsuarioController@denegarSolicitud')->name('solicitar-usuario.denegarSolicitud');
Route::patch('solicitud-usuario/{id}/solicitudDenegada', 'PortalAdministrativo\solicitudUsuarioController@solicitudDenegada')->name('solicitar-usuario.solicitudDenegada');
Route::get('solicitud-usuario/{id}/aceptarSolicitud', 'PortalAdministrativo\solicitudUsuarioController@aceptarSolicitud')->name('solicitar-usuario.aceptarSolicitud');
Route::post('solicitud-usuario/{id}/registrarUsuario', 'PortalAdministrativo\solicitudUsuarioController@registrarUsuario')->name('solicitud-usuario.registrarUsuario');
