<?php
Route::get('primerIngreso/pasosParaRealizarLaInscripcionEnLinea',function(){
	return view('portalEstudiantil.admin.primerIngreso.pasosParaRealizarLaInscripcionEnLinea');
});
Route::get('reingreso/pensumCerrado',function(){
	return view('portalEstudiantil.admin.reingreso.pensumCerrado');
});
Route::get('postgrado/procedimientoNacionales',function(){
	return view('portalEstudiantil.admin.postgrado.procedimientoNacionales');
});
Route::get('postgrado/procedimientoExtranjeros',function(){
	return view('portalEstudiantil.admin.postgrado.procedimientoExtranjeros');
});
Route::get('postgrado/calendarioDeInscripcionDePrimerIngreso',function(){
	return view('portalEstudiantil.admin.postgrado.calendarioDeInscripcionDePrimerIngreso');
});
Route::get('postgrado/pensumCerrado',function(){
	return view('portalEstudiantil.admin.postgrado.pensumCerrado');
});
Route::get('postgrado/tramitesAdministrativos',function(){
	return view('portalEstudiantil.admin.postgrado.tramitesAdministrativos');
});
Route::get('postgrado/test',function(){
	return view('portalEstudiantil.admin.postgrado.test');
});
