<?php
Route::group(['middleware' => 'App\Http\Middleware\RedirectIfNotEstudiante'], function(){

    //Route::get('reinscripcion', 'PortalEstudiantil\Reinscripcion@index');

    //Route::get('admin/reinscripcion', 'PortalEstudiantil\Reinscripcion@panelGet');
    //Route::post('admin/reinscripcion', 'PortalEstudiantil\Reinscripcion@panelPost');

    //Route::get('pruebasBasicas', 'PagesController@pruebasBasicas');
    //Route::post('estudiante/actualizarDatos', 'PagesController@actualizarDatosEstudiante');

    //Route::get('reinscripcion/pregrado/descararBoleta', 'PortalEstudiantil\Reinscripcion@descargarBoleta');
    //Route::get('reinscripcion/pregrado/descararConstancia', 'PortalEstudiantil\Reinscripcion@descargarConstancia');
});
