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

Route::get('/areas','AreaController@index');
Route::patch('/areas/{area}','AreaController@update'); 
Route::get('/areas/create','AreaController@create');
Route::get('/areas/{area}','AreaController@show'); 
Route::get('/areas/{area}/edit','AreaController@edit');
Route::post('/areas','AreaController@store');
Route::delete('areas/{area}','AreaController@destroy');

Route::get('/caps','CapsController@index');
Route::get('/caps/create','CapsController@create');
Route::get('/caps/{caps}','CapsController@show'); 
Route::get('/caps/{caps}/edit','CapsController@edit');
Route::put('/caps/{caps}','CapsController@update'); 
Route::post('/caps','CapsController@store');
Route::delete('caps/{caps}','CapsController@destroy');

Route::get('/departamentos','DepartamentoController@index');
Route::get('/departamentos/create','DepartamentoController@create');
Route::get('/departamentos/{departamento}','DepartamentoController@show'); 
Route::get('/departamentos/{departamento}/edit','DepartamentoController@edit');
Route::put('/departamentos/{departamento}','DepartamentoController@update'); 
Route::post('/departamentos','DepartamentoController@store');
Route::delete('departamentos/{departamento}','DepartamentoController@destroy');

Route::get('/estadosciviles','EstadoCivilController@index');
Route::get('/estadosciviles/create','EstadoCivilController@create');
Route::get('/estadosciviles/{estadocivil}','EstadoCivilController@show'); 
Route::get('/estadosciviles/{estadocivil}/edit','EstadoCivilController@edit');
Route::put('/estadosciviles/{estadocivil}','EstadoCivilController@update'); 
Route::post('/estadosciviles','EstadoCivilController@store');
Route::delete('estadosciviles/{estadocivil}','EstadoCivilController@destroy');

Route::get('/frecuenciascontroles','FrecuenciaControlController@index');
Route::get('/frecuenciascontroles/create','FrecuenciaControlController@create');
Route::get('/frecuenciascontroles/{frecuenciacontrol}','FrecuenciaControlController@show'); 
Route::get('/frecuenciascontroles/{frecuenciacontrol}/edit','FrecuenciaControlController@edit');
Route::put('/frecuenciascontroles/{frecuenciacontrol}','FrecuenciaControlController@update'); 
Route::post('/frecuenciascontroles','FrecuenciaControlController@store');
Route::delete('frecuenciascontroles/{frecuenciacontrol}','FrecuenciaControlController@destroy');

Route::get('/juzgadostipos','JuzgadoTipoController@index');
Route::get('/juzgadostipos/create','JuzgadoTipoController@create');
Route::get('/juzgadostipos/{juzgadotipo}','JuzgadoTipoController@show'); 
Route::get('/juzgadostipos/{juzgadotipo}/edit','JuzgadoTipoController@edit');
Route::put('/juzgadostipos/{juzgadotipo}','JuzgadoTipoController@update'); 
Route::post('/juzgadostipos','JuzgadoTipoController@store');
Route::delete('juzgadostipos/{juzgadotipo}','JuzgadoTipoController@destroy');

Route::get('/juzgadosespecificos','JuzgadoEspecificoController@index');
Route::get('/juzgadosespecificos/create','JuzgadoEspecificoController@create');
Route::get('/juzgadosespecificos/{juzgadoespecifico}','JuzgadoEspecificoController@show'); 
Route::get('/juzgadosespecificos/{juzgadoespecifico}/edit','JuzgadoEspecificoController@edit');
Route::put('/juzgadosespecificos/{juzgadoespecifico}','JuzgadoEspecificoController@update'); 
Route::post('/juzgadosespecificos','JuzgadoEspecificoController@store');
Route::delete('juzgadosespecificos/{juzgadoespecifico}','JuzgadoEspecificoController@destroy');

Route::get('/localidades','LocalidadController@index');
Route::get('/localidades/create','LocalidadController@create');
Route::get('/localidades/{localidad}','LocalidadController@show'); 
Route::get('/localidades/{localidad}/edit','LocalidadController@edit');
Route::put('/localidades/{localidad}','LocalidadController@update'); 
Route::post('/localidades','LocalidadController@store');
Route::delete('localidades/{localidad}','LocalidadController@destroy');

Route::get('/motivosdelingresoalprograma','MotivosDelIngresoAlProgramaController@index');
Route::get('/motivosdelingresoalprograma/create','MotivosDelIngresoAlProgramaController@create');
Route::get('/motivosdelingresoalprograma/{motivosdelingresoalprograma}','MotivosDelIngresoAlProgramaController@show'); 
Route::get('/motivosdelingresoalprograma/{motivosdelingresoalprograma}/edit','MotivosDelIngresoAlProgramaController@edit');
Route::put('/motivosdelingresoalprograma/{motivosdelingresoalprograma}','MotivosDelIngresoAlProgramaController@update'); 
Route::post('/motivosdelingresoalprograma','MotivosDelIngresoAlProgramaController@store');
Route::delete('motivosdelingresoalprograma/{motivosdelingresoalprograma}','MotivosDelIngresoAlProgramaController@destroy');

Route::resource('/nivelestudio','NivelEstudioController');

Route::resource('/trabajos','TrabajoController');
//Route::resource('/organizaciones','OrganizacionController');
Route::get('/organizaciones','OrganizacionController@index');
Route::get('/organizaciones/create','OrganizacionController@create');
Route::get('/organizaciones/{organizacion}','OrganizacionController@show'); 
Route::get('/organizaciones/{organizacion}/edit','OrganizacionController@edit');
Route::put('/organizaciones/{organizacion}','OrganizacionController@update'); 
Route::post('/organizaciones','OrganizacionController@store');
Route::delete('organizaciones/{organizacion}','OrganizacionController@destroy');

Route::resource('/parentezcos','ParentezcoController');

Route::resource('/sexos','SexoController');

Route::get('/situacioneslaborales','SituacionLaboralController@index');

Route::get('/situacioneslaborales/create','SituacionLaboralController@create');
Route::get('/situacioneslaborales/{situacionlaboral}','SituacionLaboralController@show'); 
Route::get('/situacioneslaborales/{situacionlaboral}/edit','SituacionLaboralController@edit');
Route::put('/situacioneslaborales/{situacionlaboral}','SituacionLaboralController@update'); 
Route::post('/situacioneslaborales','SituacionLaboralController@store');
Route::delete('/situacioneslaborales/{situacionlaboral}','SituacionLaboralController@destroy');

Route::get('/situacionesprocesales','SituacionProcesalController@index');
Route::get('/situacionesprocesales/create','SituacionProcesalController@create');
Route::get('/situacionesprocesales/{situacionprocesal}','SituacionProcesalController@show'); 
Route::get('/situacionesprocesales/{situacionprocesal}/edit','SituacionProcesalController@edit');
Route::put('/situacionesprocesales/{situacionprocesal}','SituacionProcesalController@update'); 
Route::post('/situacionesprocesales','SituacionProcesalController@store');
Route::delete('/situacionesprocesales/{situacionprocesal}','SituacionProcesalController@destroy');

Route::resource('/tipodelitos','TipoDelitoController');

Route::resource('/tipodocumentos','TipoDocumentoController');

Route::resource('/delitoespecificos','DelitoEspecificoController');

Route::resource('/internos','InternoController');

Route::resource('/regimen','RegimenController');

Route::resource('/historias','HistoriaController');
Route::get('/historias/create/{interno}','HistoriaController@create');

Route::get('/mesa-entrada','HistoriaController@indexMesaEntrada');
Route::get('/mesa-entrada/create','HistoriaController@createMesaEntrada');
Route::get('/mesa-entrada/{interno}/edit','HistoriaController@editMesaEntrada');
Route::put('/mesa-entrada/{historia}'.'HistoriaController@update');
Route::post('/ingreso-nuevo','HistoriaController@storeMesaEntrada');
Route::delete('/mesa-entrada/{interno}','InternoController@destroy');

Route::resource('/enfermedads','EnfermedadController');

Route::resource('/consumos','ConsumoController');

Route::resource('/centrosaluds','CentroSaludController');

Route::resource('/tipoconsumos','TipoConsumoController');

Route::resource('/lugartratamientoconsumos','LugarTratamientoConsumoController');

Route::get('/situacionsaluds','SituacionSaludController@index');
Route::get('/situacionsaluds/create/{interno}','SituacionSaludController@create');
Route::get('/situacionsaluds/{situacionsalud}','SituacionSaludController@show'); 
Route::get('/situacionsaluds/{situacionsalud}/edit','SituacionSaludController@edit');
Route::put('/situacionsaluds/{situacionsalud}','SituacionSaludController@update'); 
Route::post('/situacionsaluds','SituacionSaludController@store');
Route::delete('/situacionsaluds/{situacionsalud}','SituacionSaludController@destroy');

Route::get('/situacionsalud/createEnfermedad/{situacionSalud}','SituacionSaludController@createEnfermedad');
Route::get('/situacionsalud/enfermedad/{situacionsalud}/{enfermedad}/edit','SituacionSaludController@editEnfermedad');
Route::put('/situacionsalud/enfermedad/{situacionsalud}/{enfermedad}','SituacionSaludController@updateEnfermedad');
Route::post('/situacionsalud/enfermedad/{situacionSalud}','SituacionSaludController@storeEnfermedad');
Route::delete('/situacionsalud/enfermedad/{situacionsalud}/{enfermedad}','SituacionSaludController@destroyEnfermedad');

Route::get('/situacionsalud/createConsumo/{situacionSalud}','SituacionSaludController@createConsumo');
Route::get('/situacionsalud/consumo/{situacionsalud}/{consumo}/edit','SituacionSaludController@editConsumo');
Route::put('/situacionsalud/consumo/{situacionsalud}/{consumo}','SituacionSaludController@updateConsumo');
Route::post('/situacionsalud/consumo/{situacionSalud}','SituacionSaludController@storeConsumo');
Route::delete('/situacionsalud/consumo/{situacionsalud}/{consumo}','SituacionSaludController@destroyConsumo');
//Route::resource('/situacionsaluds','SituacionSaludController');


Route::get('/situacionsaludenfermedads','SituacionSaludEnfermedadController@index');
Route::get('/situacionsaludenfermedads/create/{situacionsalud}','SituacionSaludEnfermedadController@create');
Route::get('/situacionsaludenfermedads/{situacionsaludenfermedad}','SituacionSaludEnfermedadController@show'); 
Route::get('/situacionsaludenfermedads/{situacionsaludenfermedad}/edit','SituacionSaludEnfermedadController@edit');
Route::put('/situacionsaludenfermedads/{situacionsaludenfermedad}','SituacionSaludEnfermedadController@update'); 
Route::post('/situacionsaludenfermedads','SituacionSaludEnfermedadController@store');
Route::delete('/situacionsaludenfermedads/{situacionsaludenfermedad}','SituacionSaludEnfermedadController@destroy');
//Route::resource('/situacionsaludenfermedads','SituacionSaludEnfermedadController');

Route::resource('/tobilleras','TobilleraController');

Route::resource('/motivofinsupervisions','MotivoFinSupervisionController');

Route::resource('/cumplimientos','CumplimientoController');

Route::resource('/tipomotivoingresoprogramas','TipoMotivoIngresoProgramaController');

Route::resource('/nacionalidades','NacionalidadController')->parameters([
    'nacionalidades' => 'nacionalidad'
]);

Route::resource('/tipostratamientosconsumos','TipoTratamientoConsumoController')->parameters([
    'tipostratamientosconsumos' => 'tipotratamientoconsumos'
]);

Route::get('/gruposfamiliares/{interno}','GrupoFamiliarController@index')->name('gruposfamiliares.index');
Route::get('/gruposfamiliares/{interno}/create','GrupoFamiliarController@create')->name('gruposfamiliares.create');

Route::get('/', 'PatronatoController@index');

Route::post('import-internos-excel','InternoController@importExcel')->name('internos.import.excel');

Route::get('asistidos', function() {
	return view('asistidos.asistidosIndex');
});

Route::get('personal', function() {
	return view('personal.personalIndex');
});

Route::resource('/usuarios','UsuarioController');


Route::get('/prision', function () {
    return view('PrisionDomiciliaria.Index');
});


Route::get('/config', function() {
	return view('indexConfig');
});

Route::get('/parametros','ParametersController@index');

Route::get('ruben', function() {
	return view('prueba');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
