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

Route::get('/', 'ToolsController@main');

Route::get('/connexion', 'ToolsController@connexion');
Route::post('/connexionEx', 'ToolsController@connexionEx');

Route::get('/inscription', 'ToolsController@inscription');
Route::post('/inscriptionEx', 'ToolsController@inscriptionEx');

Route::get('/deconnection', 'ToolsController@deconnection');

Route::get('/admin', 'ToolsController@admin');

Route::get('/admin/newrendu', 'RenduController@newRendu');
Route::get('/admin/newrendufromrent/{id}', 'RenduController@newRendufromrent');
Route::POST('/admin/newrendufromrentex/{id}', 'RenduController@newRendufromrentEx');       
Route::get('/admin/getallrendu', 'RenduController@getAllRendu');
Route::get('/admin/rendu/{id}', 'RenduController@getRendu');
Route::post('/admin/rendu/{id}/edit', 'RenduController@edit');
Route::get('/admin/rendu/{id}/delete', 'RenduController@delete');

Route::get('/admin/allrent', 'RentController@getRent');
Route::get('/admin/rent/{id}/delete', 'RentController@delete');

Route::get('/admin/allpersonnes', 'PersonneController@getAllPersonne');
Route::get('/admin/personne/{id}/edit', 'PersonneController@getPersonne');
Route::get('/admin/personne/{id}/delete', 'PersonneController@deletePersonne');
Route::post('/admin/personne/{id}/edit', 'PersonneController@getPersonneEx');


Route::get('/admin/newVehicle', 'VehicleController@newVehicle');
Route::post('/admin/newVehicle', 'VehicleController@newVehicleEx');
Route::get('/admin/allvehicle', 'VehicleController@getAllVehicle');
Route::get('/admin/vehicle/{id}', 'VehicleController@getVehicle');
Route::post('/admin/vehicle/{id}/edit', 'VehicleController@edit');
Route::get('/admin/vehicle/{id}/delete', 'VehicleController@delete');

Route::Post('/Rent', 'RentController@saveRent');
Route::get('/newRent', 'RentController@getPage');
Route::get('/newRent/{type}', 'RentController@getType');
Route::get('/newRentBy/Car/{id}', 'RentController@getCar');



Route::get('/allRent', 'RentController@getAllRent');
Route::get('/currentRent', 'RentController@getCurrentRent');


Route::get('/admin/newincident', 'IncidentController@newincident');
Route::post('/admin/newincident', 'IncidentController@newincidentex');
Route::get('/admin/allincident', 'IncidentController@getallincident');

