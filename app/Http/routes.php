<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Auth\AuthController@getLogin');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::resource('roles', 'RoleController');

Route::get('roles/{id}/delete', [
    'as' => 'roles.delete',
    'uses' => 'RoleController@destroy',
]);


Route::resource('roles', 'RoleController');

Route::get('roles/{id}/delete', [
    'as' => 'roles.delete',
    'uses' => 'RoleController@destroy',
]);


Route::resource('permissions', 'PermissionController');

Route::get('permissions/{id}/delete', [
    'as' => 'permissions.delete',
    'uses' => 'PermissionController@destroy',
]);


Route::resource('aquirientes', 'AquirienteController');

Route::get('aquirientes/{id}/delete', [
    'as' => 'aquirientes.delete',
    'uses' => 'AquirienteController@destroy',
]);


Route::resource('adquirientes', 'AdquirienteController');

Route::get('adquirientes/{id}/delete', [
    'as' => 'adquirientes.delete',
    'uses' => 'AdquirienteController@destroy',
]);




Route::resource('users', 'UserController');

Route::get('users/{id}/delete', [
    'as' => 'users.delete',
    'uses' => 'UserController@destroy',
]);


Route::resource('users', 'UserController');

Route::get('users/{id}/delete', [
    'as' => 'users.delete',
    'uses' => 'UserController@destroy',
]);


Route::resource('conceptos', 'ConceptoController');

Route::get('conceptos/{id}/delete', [
    'as' => 'conceptos.delete',
    'uses' => 'ConceptoController@destroy',
]);


Route::resource('conceptos', 'ConceptoController');

Route::get('conceptos/{id}/delete', [
    'as' => 'conceptos.delete',
    'uses' => 'ConceptoController@destroy',
]);


Route::resource('declaranots', 'DeclaranotController');

Route::get('declaranots/{id}/delete', [
    'as' => 'declaranots.delete',
    'uses' => 'DeclaranotController@destroy',
]);


Route::resource('documentos', 'DocumentoController');

Route::get('documentos/{id}/delete', [
    'as' => 'documentos.delete',
    'uses' => 'DocumentoController@destroy',
]);


Route::resource('tipoDocumentos', 'TipoDocumentoController');

Route::get('tipoDocumentos/{id}/delete', [
    'as' => 'tipoDocumentos.delete',
    'uses' => 'TipoDocumentoController@destroy',
]);

Route::get('documentos/{id}/download',[
    'as' => 'documentos.download',
    'uses' => 'DocumentoController@downloadDocument',
]);

Route::resource('escrituras', 'EscrituraController');

Route::get('escrituras/{id}/delete', [
    'as' => 'escrituras.delete',
    'uses' => 'EscrituraController@destroy',
]);

Route::get('escrituras/{id}/download',[
    'as' => 'escrituras.download',
    'uses' => 'EscrituraController@downloadEscritura',
]);

Route::get('declaranots/{id}/download',[
    'as' => 'declaranots.download',
    'uses' => 'DeclaranotController@generatePDF'
]);