<?php

Route::group(['namespace' => 'Estudiante'], function() {
    Route::get('/', 'HomeController@index')->name('estudiante.dashboard');
    Route::post('/', 'HomeController@actualizarDatos')->name('estudiante.perfil');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('estudiante.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('estudiante.logout');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('estudiante.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('estudiante.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('estudiante.password.reset');

    Route::get('reinscripcion', 'Reinscripcion@index')->name("paso1");
    Route::get('reinscripcion/paso2', 'Reinscripcion@paso2')->name("paso2");
    Route::get('reinscripcion/paso3', 'Reinscripcion@paso3')->name('estudiante.reinscripcion.paso3');
    Route::get('reinscripcion/paso4', 'Reinscripcion@paso4')->name('paso4');
    Route::get('reinscripcion/boleta', 'Reinscripcion@descargarPDFBoleta');
    Route::get('reinscripcion/constancia', 'Reinscripcion@descargarPDFConstancia');
    Route::get('reinscripcion/certificado', 'Reinscripcion@certificado')->name('cert_nacimiento');
    Route::post('reinscripcion/certificado', 'Reinscripcion@guardar_certificado')->name('guardar_cert');

    Route::get('constancias', 'Reinscripcion@constancias');

    // Solicitar Carnet
    Route::get('PerfilgeneraCarnet', 'SolicitarCarnet@PerfilgeneraCarnet');
    Route::get('ValidaciongeneraCarnet', 'SolicitarCarnet@ValidaciongeneraCarnet');
    Route::get('BoletaGeneraCarnet', 'SolicitarCarnet@BoletaGeneraCarnet');
    Route::post('updateFotoCarnet','SolicitarCarnet@updateFotoCarnet');
    Route::get('BoletaGeneraCarnetPDF', 'SolicitarCarnet@BoletaGeneraCarnetPDF');

    Route::get('admin/reinscripcion', 'Reinscripcion@panelGet');
    Route::post('admin/reinscripcion', 'Reinscripcion@panelPost');

    Route::get('pruebasBasicas', 'PagesController@pruebasBasicas');
    Route::post('estudiante/actualizarDatos', 'PagesController@actualizarDatosEstudiante');

    Route::get('reinscripcion/pregrado/descargarBoleta', 'Reinscripcion@descargarBoleta');
    Route::get('reinscripcion/pregrado/descargarConstancia', 'Reinscripcion@descargarConstancia');

    Route::get('pago', 'Reinscripcion@pagarMatricula');

    Route::get('matricula', 'PagosExtranjeros@index')->name('estudiante.pagos');
    Route::post('generarBoletaExtranjeros', 'PagosExtranjeros@generarBoleta')->name('estudiante.extranjero.generarBoleta');

    // Mensajes
    Route::post('mensaje', 'HomeController@mensaje')->name('estudiante.mensaje');

    // Verificación de correo
    Route::get('emailVerification','Auth\RegisterController@emailVerification')->name('estudiante.emailVerification');
    Route::get('verify/{carnet}/{verification_token}','Auth\RegisterController@verify')->name('estudiante.verify');

    Route::get('CertificacionArchivos', 'ArchivosController@indexCarreras')->name('estudiante.archivos.CarrerasEstudiante');
    Route::post('Certificacion', 'ArchivosController@ValidarCertificacionArchivos')->name('estudiante.archivos.ValidarCertificacionArchivos');
    Route::get('CertificacionDescarga', 'ArchivosController@DescargarCertificacionArchivos')->name('estudiante.archivos.DescargarCertificacionArchivos');
    Route::get('verificarConstancia', 'ArchivosController@verificarConstanciaBarcode');
    Route::POST('verificarConstanciaArchivos', 'ArchivosController@verificarConstanciaArchivos');
    
    Route::get('verificarCertificacionTitulos', 'CertificacionTitulosVerificar@verificarCertificacionTitulos');
    Route::post('verificarCertificacionTitulosFinal', 'CertificacionTitulosVerificar@verificarCertificacionTitulosFinal');

    //Certificacion de inscripciones
    Route::get('CertificacionInscripcion', 'SolicitaCertificacionInscripcion@certificacion_inscripcion');
    Route::post('SolicitaCertificacionInscripcion/certificacion', 'SolicitaCertificacionInscripcion@certificacion');
    Route::get('SolicitaCertificacionInscripcion/descargar_certificacion', 'SolicitaCertificacionInscripcion@descargarCertificacion');
    Route::get('verificarCertificacion', 'SolicitaCertificacionInscripcion@verificarCertificadoinscripcion');
    Route::get('BoletaCertificacion', 'SolicitaCertificacionInscripcion@descargarPDFBoleta');
    Route::post('verificarCertificacionInscripcion', 'SolicitaCertificacionInscripcion@verificarCertificadoinscripcionFinal');
    Route::post('certificacionOriginal', 'SolicitaCertificacionInscripcion@certificacionOriginal')->name('estudiante.certificacion.original');


    // Constancia/certificacion TItulos
    //Route::get('CarrerasCertificacionTitulos', 'CertificacionTitulosEstudiante@CarrerasCertificacionTitulos');
    Route::post('verificarCertificacionTitulos','CertificacionTitulosEstudiante@VisualizaCertificacion')->name('administrativo.visualizaCertTitulos');
    Route::post('descargaCertificacionTitulo','CertificacionTitulosEstudiante@descargaCertificacionTitulo')->name('administrativo.descargaCertificacionTitulo');

});

Route::get('facultades', 'PortalEstudiantil\InfoUsacController@FacultadesController');
