<?php

Route::group(['namespace' => 'Administrativo'], function() {
    //Perfil del usuario
    Route::get('/', 'HomeController@index')->name('administrativo.dashboard');
    Route::post('cambiarPassword', 'HomeController@cambiarPassword')->name('administrativo.cambiarPassword');
    Route::get('editarPerfil','HomeController@editarPerfil')->name('administrativo.editarPerfil');
    Route::post('guardarPerfil','HomeController@guardarPerfil')->name('administrativo.guardarPerfil');
    //Acceso Restringido
    Route::get('accesoRestringido', 'HomeController@accesoRestringido')->name('administrativo.accesoRestringido');
    Route::get('cuentaDesactivada', 'HomeController@cuentaDesactivada')->name('administrativo.cuentaDesactivada');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('administrativo.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout')->name('administrativo.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('administrativo.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('administrativo.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('administrativo.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('administrativo.password.reset');

    //Auditoría
    Route::get('accionesAuditoria', 'AuditoriaUsuarioController@index')->name('administrativo.auditoria.index');

    Route::get('/agregarAspirante', 'AgregarAspirante@index')->name('administrativo.agregarAspirante');
    Route::post('/agregarAspirante', 'AgregarAspirante@guardarAspirante');

    Route::get('/certificacionInscripcion', 'CertificacionInscripcionesController@index')->name('administrativo.inscripciones.index');
    Route::post('/GeneraCertificacion', 'CertificacionInscripcionesController@generaCertificacionInscripcion')->name('administrativo.inscripciones.generaCertificacionInscripcion');
    Route::get('/descargaCertificacion', 'CertificacionInscripcionesController@descargaCertificacion')->name('administrativo.inscripciones.descargaCertificacion');
    Route::get('/certificacionInscripcionPostgrado', 'CertificacionInscripcionPostgradoController@index')->name('administrativo.inscripciones.certificacionPostgrado');
    Route::post('/buscaEstudiante', 'CertificacionInscripcionPostgradoController@buscaEstudiante')->name('administrativo.buscaEstudiante');
    Route::post('/verificaCarnet', 'CertificacionInscripcionPostgradoController@verificarCarnet')->name('administrativo.verificarCarnet');
    Route::post('/certificarPostgrado', 'CertificacionInscripcionPostgradoController@certificar')->name('administrativo.certificar');
    Route::get('/descargarCertPostgrado', 'CertificacionInscripcionPostgradoController@descargarCertificacionPostgrado')->name('administrativo.descargarCertificacionPostgrado');
    Route::get('/certificaInscripcion', 'CertificacionInscripcionesController@indexGenerar')->name('administrativo.inscripciones.indexGenerar');
    Route::post('/certificaPregrado', 'CertificacionInscripcionesController@buscaEstudiantePregrado')->name('administrativo.inscripciones.buscaEstudiantePregrado');
    Route::post('/verificarCarnet', 'CertificacionInscripcionesController@certificarPregrado')->name('administrativo.inscripciones.certificarPregrado');
    Route::get('/descargarCertPregrado', 'CertificacionInscripcionesController@descargarCertificacionPregrado')->name('administrativo.inscripciones.descargarCertificacionPregrado');
    Route::get('/reimpresion', 'CertificacionInscripcionesController@indexReimpresion')->name('administrativo.inscripciones.indexReimpresion');
    Route::post('/reimpresionConstancia', 'CertificacionInscripcionesController@buscaCertificacionReimpresionPregrado')->name('administrativo.inscripciones.buscaCertificacionReimpresionPregrado');
    Route::get('/reimpresionListado', 'CertificacionInscripcionesController@buscaListadoReimpresionPregrado')->name('administrativo.inscripciones.buscaListadoReimpresionPregrado');
    Route::get('api_post/estudiante', 'PostDoctorado@estudiante')->name('postgrado.estudiante');
    Route::get('api_post/carrera', 'PostDoctorado@carrera')->name('postgrado.carrera');
    Route::get('api_post/extension', 'PostDoctorado@extension')->name('postgrado.extension');
    Route::get('api_post/unidad_academica', 'PostDoctorado@unidad_academica')->name('postgrado.carrera');
    Route::get('api_post/carrera_estudiante', 'PostDoctorado@carrera_estudiante')->name('postgrado.carrera_estudiante');
    Route::post('api_post/inscribir', 'PostDoctorado@inscribir')->name('postgrado.inscribir');
    Route::post('api_post/completoPregrado', 'PostDoctorado@completoPregrado')->name('postgrado.completoPregrado');
    Route::post('api_post/descargarPDFResolucion', 'PostDoctorado@descargarPDFResolucion')->name('postgrado.descargarPDFResolucion');
    Route::post('api_post/crear_carrera', 'PostDoctorado@crear_carrera')->name('postgrado.crear_carrera');
    Route::get('crearPostdoctorado', 'PostDoctorado@crearPostdoctorado')->name('administrativo.crearPostdoctorado');
    Route::get('inscribirPostdoctorado', 'PostDoctorado@inscribirPostdoctorado')->name('administrativo.inscribirPostdoctorado');
    Route::get('carnetEstudiante', 'ConstanciaArchivosController@index')->name('administrativo.archivos.buscaConstanciaCarnet');
    Route::get('carreras', 'ConstanciaArchivosController@muestraCarreras')->name('administrativo.archivos.indexCarreras'); 
    Route::post('visualizaConstancia', 'ConstanciaArchivosController@GeneraConstancia')->name('administrativo.archivos.GeneraConstanciaArchivos'); 
    Route::get('descargarConstancia', 'ConstanciaArchivosController@DescargarConstanciaArchivos')->name('administrativo.archivos.DescargarConstanciaArchivos');
    Route::get('descargarConstanciaIncompleta', 'ConstanciaArchivosController@DescargarConstanciaArchivosIncompleto')->name('administrativo.archivos.DescargarConstanciaArchivosIncompleto');
    Route::get('ExoneradosCarne', 'ExoneradosController@index')->name('administrativo.exonerados.index');
    Route::get('FormularioEstudiante', 'ExoneradosController@busquedaCarnet')->name('administrativo.exonerados.busquedaCarnet');
    Route::post('ExoneraEstudiante', 'ExoneradosController@generar')->name('administrativo.exonerados.generar');
    Route::post('CarreraEstudianteExonerados', 'ExoneradosController@CarreraExonerar')->name('administrativo.exonerados.CarreraExonerar'); 
    Route::post('BuscarNovExonerados', 'ExoneradosController@busquedaNov')->name('administrativo.exonerados.buscarNov');
    Route::get('archivos', 'ArchivoController@genera')->name('administrativo.archivosGenera');
    Route::get('carnetEstudiante2', 'ArchivoController@buscaCarnet')->name('administrativo.buscaCarnet');
    Route::post('/archivosGenera', 'ArchivoController@generaData')->name('administrativo.archivos.generaData');

    //Mapa Inscritos
    Route::get('MapaInscriptos', 'MapaInscritos@mapaIndex')->name('administrativo.mapaInscritos');

    //boletas padep
    Route::get('BuscaEstudianteBoleta', 'BoletasController@Index')->name('administrativo.BoletaController.buscaEstudianteBoleta');
    Route::get('ObtieneCarrerasBoleta', 'BoletasController@getCarrerasBoleta')->name('administrativo.BoletaController.getCarrerasBoleta');
    Route::post('GeneraBoletaCiclo', 'BoletasController@generarBoleta')->name('administrativo.BoletaController.generarBoleta'); 
    Route::get('DescargarBoletaCiclo', 'BoletasController@descargarBoletaReingresoCiclos')->name('administrativo.BoletaController.descargarBoletaReingresoCiclos');

});

    // Aspirantes
    #se usa el controlador "solicitudInscripcionController"
    Route::get('Citas/{mostrar}','PortalAdministrativo\solicitudInscripcionController@index')->name('administrativo.Citas');
    Route::get('Citas/asignarCita/{id}','PortalAdministrativo\solicitudInscripcionController@asignarCita')->name('administrativo.asignarCita');
    Route::patch('Citas/crearCita/{nov}','PortalAdministrativo\solicitudInscripcionController@crearCita')->name('administrativo.crearCita');;
    Route::get('Citas/aprobarDocumento/{nov}/{campo}/{estadoActual}', 'PortalAdministrativo\solicitudInscripcionController@cambiarEstado')->name('administrativo.CambiarEstado');
    Route::get('Citas/showCita/{nov}','PortalAdministrativo\solicitudInscripcionController@showCita')->name('administrativo.showCita');
    Route::get('Citas/realizarInscripcion/{nov}','PortalAdministrativo\solicitudInscripcionController@realizarInscripcion')->name('administrativo.realizarInscripcion');
    Route::get('solicitudinscripcion', 'PortalAdministrativo\solicitudInscripcionController@showSolicitudInscripcion')->name('administrativo.solicitudInscripcion');
    #Se usa el controlador "aspiranteController"
    Route::resource('aspirantes', 'PortalAdministrativo\aspiranteController');
    Route::get('resumenpreinscritos/{orden}', 'PortalAdministrativo\aspiranteController@resumenpreinscritos')->name('administrativo.resumenpreinscritos');
    Route::get('pruebasespe', 'PortalAdministrativo\aspiranteController@pruebasespe')->name('administrativo.PruebasEspecificas');
    Route::post('pruebasespe', 'PortalAdministrativo\aspiranteController@cargarCSVPruebasEspecificas')->name('administrativo.cargaCSVPruebasEspecificas');
    Route::post('pruebaespecífica' ,'PortalAdministrativo\aspiranteController@cargaPruebasEspecificas')->name('administrativo.cargaPruebasEspecificas');
    Route::get('aprobarpruebaespecífica' ,'PortalAdministrativo\aspiranteController@listadoPruebasEspecificas')->name('administrativo.aprobarPruebasEspecificas');
    Route::post('aprobarPETodas','PortalAdministrativo\aspiranteController@aprobarPETodas')->name('administrativo.aprobarPETodas');
    Route::post('aprobarPEIndividual','PortalAdministrativo\aspiranteController@aprobarPEIndividual')->name('administrativo.aprobarPEIndividual');
    Route::post('rechazarPEIndividual','PortalAdministrativo\aspiranteController@rechazarPEIndividual')->name('administrativo.rechazarPEIndividual');
    //Consumo de web service de SUN
    Route::post('consultarPruebaBasicasWSSUN','PortalAdministrativo\aspiranteController@consultarPruebaBasicasWSSUN')->name('consultarPruebaBasicasWSSUN');
    Route::get('pruebasespe/descargarPlantillaCSV','PortalAdministrativo\aspiranteController@descargarPlantillaCSV')->name('administrativo.descargarPlantillaCSV');

    //  Inscritos
    Route::resource('inscritos', 'PortalAdministrativo\inscritoController');
    Route::get('resumeninscritos', 'PortalAdministrativo\inscritoController@resumeninscritos')->name('administrativo.resumeninscritos');
    Route::get('resumeninscritos/TIPO_UA/{tipo}', 'PortalAdministrativo\inscritoController@resumeninscritosTipoUA')->name('administrativo.resumeninscritosTipoUA');
    Route::get('resumeninscritos/TIPO_UA/{tipo}/UA/{ua}', 'PortalAdministrativo\inscritoController@resumeninscritosUA')->name('administrativo.resumeninscritosUA');
    Route::get('resumeninscritos/TIPO_UA/{tipo}/UA/{ua}/EXT/{ext}', 'PortalAdministrativo\inscritoController@resumeninscritosEXT')->name('administrativo.resumeninscritosEXT');
    Route::get('resumeninscritos/TIPO_UA/{tipo}/UA/{ua}/EXT/{ext}/CAR/{carrera}', 'PortalAdministrativo\inscritoController@resumeninscritosCARRERA')->name('administrativo.resumeninscritosCARRERA');
    Route::post('resumeninscritos/descargarCSV/{ciclo}/{semestre}/{tipo}/{ua}/{ext}/{carrera}','PortalAdministrativo\inscritoController@descargarCSV')->name('administrativo.descargaCSV');
    // Exoneraciones
    #Se usa el controlador "exoneradoController"
    Route::get('listadoExonerados', 'PortalAdministrativo\exoneradoController@listadoExonerados')->name('administrativo.listadoExonerados');
    Route::get('exoneracion', 'PortalAdministrativo\exoneradoController@index')->name('administrativo.exoneracion');
    Route::post('exoneracion', 'PortalAdministrativo\exoneradoController@exonerar')->name('administrativo.exonerar');
    Route::get('exoneracionespe/{nov}', 'PortalAdministrativo\exoneradoController@indexEspecifica');
    Route::post('exoneracionespe/{nov}', 'PortalAdministrativo\exoneradoController@exonerarEspecifica');

    // Becados
    Route::get('estadisticasBecados/{orden}', 'PortalAdministrativo\becadoController@estadisticas')->name('administrativo.estadisticasBecados');
    Route::get('infobecado', 'PortalAdministrativo\becadoController@show')->name('administrativo.infobecado');
    Route::post('infobecado', 'PortalAdministrativo\becadoController@becar');
    Route::patch('infobecado', 'PortalAdministrativo\becadoController@actualizarTramiteTitulo');

    /*USUARIOS*/
    Route::get('usuarios', 'PortalAdministrativo\administrarUsuarioController@index')->name('administrativo.usuarios');
    Route::get('usuarios/{dependencia}/{usuario}/editarPermisos', 'PortalAdministrativo\administrarUsuarioController@editarPermisos')->name('administrativo.usuarios.editarPermisos');
    Route::post('usuarios/{dependencia}/{usuario}/actualizarPermisos', 'PortalAdministrativo\administrarUsuarioController@actualizarPermisos')->name('administrativo.usuarios.actualizarPermisos');
    Route::get('usuarios/{dependencia}/{usuario}/show', 'PortalAdministrativo\administrarUsuarioController@show')->name('administrativo.usuarios.show');
    Route::get('usuarios/{dependencia}/{usuario}/usuarioDesactivado', 'PortalAdministrativo\administrarUsuarioController@usuarioDesactivado')->name('administrativo.usuarios.usuarioDesactivado');


    /*Solicitar Usuario*/
    Route::get('solicitarusuario', 'PortalAdministrativo\solicitudUsuarioController@solicitarusuario')->name('administrativo.solicitarusuario');
    Route::post('solicitarusuario', 'PortalAdministrativo\solicitudUsuarioController@storeExterno');
    Route::get('refreshcaptcha', 'PortalAdministrativo\solicitudUsuarioController@refreshCaptcha');

    /*INFOUSAC*/


    /* IMPRIMIR CARNET */
    // Route::get('PendientePagoCarnetEstudiante', 'PortalAdministrativo\ImprimirCarnet@PendientePagoCarnetEstudiante')->name('administrativo.PendientePagoCarnetEstudiante');
    //  Route::get('ImprimirCarnetEstudiante', 'PortalAdministrativo\ImprimirCarnet@ImprimirCarnetEstudiante')->name('administrativo.ImprimirCarnetEstudiante');
    // Route::get('CarnetsGenerados', 'PortalAdministrativo\ImprimirCarnet@CarnetsGenerados')->name('administrativo.CarnetsGenerados');
    Route::get('BusquedaGeneral', 'PortalAdministrativo\ImprimirCarnet@PendientePagoCarnetEstudiante')->name('administrativo.BusquedaGeneral');

    Route::post('validarBoleta','PortalAdministrativo\ImprimirCarnet@validarBoletaEstado1');
    Route::post('eliminarFoto','PortalAdministrativo\ImprimirCarnet@eliminarFotografia');
    Route::post('imprimirCarnetPDF','PortalAdministrativo\ImprimirCarnet@imprimirCarnetPDF');
    Route::post('regresarEstado2','PortalAdministrativo\ImprimirCarnet@regresarEstado2');
    Route::post('boletaManual','PortalAdministrativo\ImprimirCarnet@boletaManual');
    Route::post('buscarImprimeCarnet','PortalAdministrativo\ImprimirCarnet@buscarImprimeCarnet');
    Route::post('buscarImprimeCarnetSinEstado','PortalAdministrativo\ImprimirCarnet@buscarImprimeCarnetSinEstado');
    Route::post('buscarCarrerasSimultaneo','PortalAdministrativo\ImprimirCarnet@buscarCarrerasSimultaneo');

    /* POSTDOCTORADO */
    /* GENERAR CERTIFICACION TITULO */
        Route::get('tbuscarTitulo','PortalAdministrativo\generarCertificacionTitulo@buscarTitulo')->name('administrativo.buscarTitulo');
        Route::get('tobtenerTitulos','PortalAdministrativo\generarCertificacionTitulo@obtenerTitulos')->name('administrativo.obtenerTitulos');
        Route::post('tTitulo','PortalAdministrativo\generarCertificacionTitulo@visualizaTitulos')->name('administrativo.visualizaTitulos');
        Route::post('tdescargaTitulos','PortalAdministrativo\generarCertificacionTitulo@descargaTitulos')->name('administrativo.descargaTitulos');
        Route::post('tverificarCarnet','PortalAdministrativo\generarCertificacionTitulo@verificarCarnet')->name('administrativo.verificarCarnetTitulo');
    


    /* CARGA MASIVA DE ESTABLECIMIENTOS */
    Route::get('PreviewCargaEstablecimientos', 'PortalAdministrativo\CargaMasivaEstablecimientoController@PreviewCargaEstablecimientos')->name('administrativo.PreviewCargaEstablecimientos');
    Route::post('CargaEstablecimientos', 'PortalAdministrativo\CargaMasivaEstablecimientoController@CargaEstablecimientos');
