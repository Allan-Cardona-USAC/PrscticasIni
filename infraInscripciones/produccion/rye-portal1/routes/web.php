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

/* para todo público */

//Route::get('/', 'TestController@index');
Route::get('/', 'PagesController@index')->name('landingPage');
Route::get('/reglamentoestudiantil', 'PagesController@reglamentoestudiantil')->name('reglamento.estudiantil');
Route::get('/reglamentoelectoral', 'PagesController@reglamentoelectoral')->name('reglamento.electoral');
Route::get('/facultades', 'PagesController@facultades')->name('facultades');
Route::get('/escuelas', 'PagesController@escuelas')->name('escuelas');
Route::get('/centros', 'PagesController@centros')->name('centros');
Route::get('/institutos', 'PagesController@institutos')->name('institutos');
Route::get('/tramites', 'PagesController@tramites')->name('tramites');
Route::get('/tramites2', 'PagesController@tramites2')->name('tramites2');
Route::get('facultades', 'PagesController@facultades')->name('facultades');
Route::get('/formulariosadministrativos', 'PagesController@formulariosadministrativos')->name('formulario.administrativo');
Route::get('/formulario_incorporado', 'PagesController@incorporados')->name('formulario.incorporado');
Route::get('/formulario_postgrado', 'PagesController@postgrado')->name('formulario.postgrado');
Route::get('/DatosEstudiante','Estudiante\SolicitarCarnet@DatosEstudiante');
Route::get('/acta_carnet', 'PagesController@actaCarnet')->name('acta.carnet');
// contadores inscripciones
Route::get('/contadorfacultades', 'PagesController@contadorfacultades')->name('contadorfacultades');
Route::get('/contadorcentros', 'PagesController@contadorcentros')->name('contadorcentros');
Route::get('/contadorescuelas', 'PagesController@contadorescuelas')->name('contadorescuelas');
Route::get('/contadorinstitutos', 'PagesController@contadorinstitutos')->name('contadorinstitutos');


//common
Route::get('/login', 'Common\AuthController@showLoginForm')->name('login');

Route::get('/verificarInscripcion', 'PagesController@verificarInscripcion')->name('verificar');
Route::get('/verificarPreinscripcion', 'PagesController@verificarPreinscripcion')->name('verificarPreinscripcion');


Route::get('/perfil', 'PagesController@perfil');

Route::group(['middleware' => 'App\Http\Middleware\RedirectIfNotEstudiante'], function(){
    Route::get('/pruebasBasicas', 'PagesController@pruebasBasicas');
    Route::post('/estudiante/actualizarDatos', 'PagesController@actualizarDatosEstudiante');
});

/* Utilidades */
Route::get('/municipios/get/', 'PagesController@getMunicipios');
Route::get('/codigosPostales/get/', 'PagesController@getCodigoPostal');
Route::get('/valorMatricula/get/', 'PagesController@getValorMatricula');
Route::get('/establecimiento', 'PagesController@getEstablecimiento');
Route::get('/requisitosNac', 'PagesController@requisitos_primerIngreso')->name('requisitosNacionales');
Route::get('/requisitosExt', 'PagesController@requisitos_primerIngreso_extranjeros');
Route::get('/pin_aspirante', 'RecuperarPin@aspirante')->name('pin.aspirante');
Route::get('/consulta_pin_aspirante', 'RecuperarPin@consultaAspirante');
Route::view('/RequisitosPing', 'portalEstudiantil.RequisitosPing')->name('reqPING');
Route::view('/calendario-primer-ingreso', 'portalEstudiantil.calendario')->name('calendario');

Route::resource('categoriaCMS', 'PortalEstudiantil\CategoriaCMSController');
Route::resource('paginaCMS', 'PortalEstudiantil\PaginaCMSController');
Route::resource('carouselCMS', 'PortalEstudiantil\CarouselCMSController');

Route::get('toggleCategoria', 'PortalEstudiantil\CategoriaCMSController@toggle')->name('cms.categoria.toggle');
Route::get('togglePagina', 'PortalEstudiantil\PaginaCMSController@toggle')->name('cms.pagina.toggle');

//Route::get('reporteEstadistica', 'Administrativo\estadisticaController@index')->name('administrativo.estadistica.index'); // borrar al finalizar modulo

Route::get('reporteInscritos', 'Administrativo\inscritosController@index')->name('administrativo.inscritos.reportes.index'); // modulo de reporte de discapacitados
Route::post('reporteEstadistica/consultaInscritos','Administrativo\inscritosController@ReporteInscritos');

Route::get('reporteGraduados', 'Administrativo\graduadosController@Graduadosindex')->name('administrativo.graduados.reportes.index'); // modulo de reporte de graduados
Route::post('reporteEstadistica/consultaGraduados','Administrativo\graduadosController@ReporteGraduados');

Route::get('reporteDiscapacidad', 'Administrativo\discapacidadController@index')->name('administrativo.discapacidad.reportes.index'); // modulo de reporte de discapacitados
Route::post('reporteEstadistica/consultaDiscapacidad','Administrativo\discapacidadController@ReporteDiscapacidad');

Route::get('reporteMaestroCarreras', 'Administrativo\mcarreraController@ReporteMCarrera')->name('administrativo.mcarreras.reportes.index'); // modulo de reporte de graduados

Route::get('mapaInscritos', 'PortalEstudiantil\MapaInscritos@mapaIndex')->name('administrativo.mapaInscritos'); 
Route::post('bCarrerasUni', 'PortalEstudiantil\MapaInscritos@buscaCarreras')->name('administrativo.buscaCarreras'); 
Route::post('mapaInscritosCicloSemestre', 'PortalEstudiantil\MapaInscritos@buscaInscritosCicloSemestre')->name('administrativo.buscaInscritosCicloSemestre');

/*Manual de Normas y Procedimientos*/

Route::get('manual-normasyprocedimientos', 'PortalEstudiantil\NormasYProcedimientosController@Index')->name('portal.manual-normasyprocedimientos'); 

/*Practicas iniciales*/

Route::get('/cuotas_estudiantiles', 'PagesController@cuotasEstudiantiles');