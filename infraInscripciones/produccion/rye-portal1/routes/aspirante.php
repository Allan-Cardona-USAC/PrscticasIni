<?php

Route::group(['namespace' => 'Aspirante'], function() {
    Route::get('/', 'Inscripcion@index')->name('aspirante.dashboard');
    Route::get('/perfil', 'HomeController@index')->name('aspirante.perfil');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('aspirante.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('aspirante.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('aspirante.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords ++++++++++++++++++++++
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('aspirante.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('aspirante.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('aspirante.password.reset');

    // Fase 1 - Solicitud de Ingreso
    Route::get('inscripcion', 'Inscripcion@index')->name('aspirante.fase1');

    /**
     * Nueva Implementacion de Inscripcion Aspirante
     */
    Route::get('inscripcion/automatica', 'InscripcionAspiranteController@Index');
    Route::post('inscripcion/subirFoto','InscripcionAspiranteController@subirFoto');
    Route::post('inscripcion/subirPartida', 'InscripcionAspiranteController@subirPartida')->name('aspirante_cert');
    Route::post('inscripcion/titulo', 'InscripcionAspiranteController@validarTituloMedio');
    Route::post('inscripcion/actualizacion', 'InscripcionAspiranteController@ActualizarDatos');
    Route::post('inscripcion/generarBoleta', 'InscripcionAspiranteController@GenerarBoleta')->name('Aspirante.Inscripcion.GenerarBoleta');
    Route::post('inscripcion/generarConstancia', 'InscripcionAspiranteController@GenerarConstanciaInscripcion')->name('Aspirante.Inscripcion.GenerarConstanciaInscripcion');

    Route::post('inscripcion/cargaPDF', 'InscripcionAspiranteController@CargaPDF');
    /********************/
   
    // Route::post('insertarDatos', 'Inscripcion@insertarDatos')->name('aspirante.fase1.paso1');
    Route::post('registrarCarrera', 'Inscripcion@registrarCarrera')->name('aspirante.fase1.paso5');
    Route::get('inscripcion/constancia', 'Inscripcion@generarPreinscripcion')->name('aspirante.constancia');
    Route::get('inscripcion/constanciaPreinscripcion', 'Inscripcion@descargarPDFPreinscripcion');

    // Fase 2 - Papeleria para el expediente
    Route::get('inscripcion2', 'Inscripcion@fase2')->name('aspirante.fase2');
    Route::post('insertarAspirante', 'Inscripcion@insertarAspirante')->name('aspirante.fase2.paso5');
     Route::post('getDatosMINEDUC', 'Inscripcion@getDatosMineducPost')->name('aspirante.fase2.getDatosMINEDUC');
     Route::post('estudios_previos', 'Inscripcion@estudiosPrevios')->name('aspirante.fase2.estPrev');

    /**
     * Inscripcion Automatica Routes
     */
    Route::post('subirfoto', 'InscripcionAutomaticaController@SubirFoto')->name('Aspirante.Inscripcion.SubirFoto');
    
    // Mensajes
    Route::post('mensaje', 'HomeController@mensaje')->name('aspirante.mensaje');

    // Merificación de correo
    Route::get('emailVerification','Auth\RegisterController@emailVerification')->name('aspirante.emailVerification');
    Route::get('verify/{nov}/{verification_token}','Auth\RegisterController@verify')->name('aspirante.verify');

    // Cambio de correo
    Route::get('email/reset', 'Auth\ForgotEmailController@showLinkRequestForm')->name('aspirante.email.request');
    Route::post('email/reset', 'Auth\RegisterController@changeEmail')->name('aspirante.email.change');

    // Route::get('test', 'Inscripcion@test');
});

Route::get('facultades', 'PortalEstudiantil\InfoUsacController@FacultadesController');
