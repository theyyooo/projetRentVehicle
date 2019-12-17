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

Route::get('/, Controller@main');

Route::get('/connexion, Controller@connexion');
Route::get('/inscription, Controller@inscription');

Route::post('/admin/newRendu, RenduController@newRendu');
Route::get('/admin/allRendu, RenduController@getAllRendu');
Route::get('/admin/rendu/{id}, RenduController@getRendu');
Route::post('/admin/rendu/{id}/edit, RenduController@edit');
Route::get('/admin/rendu/{id}/delete, RenduController@delete');

Route::get('/admin/allPersonne, PersonneController@getAllPersonne');

Route::post('/admin/newVehicle, VehicleController@newVehicle');
Route::get('/admin/allVehicle, VehicleController@getAllVehicle');
Route::get('/admin/vehicle/{id}, VehicleController@getVehicle');
Route::post('/admin/vehicle/{id}/edit, VehicleController@edit');
Route::get('/admin/vehicle/{id}/delete, VehicleController@delete');

Route::post('/newRent, RentController@new');
Route::get('/allRent, RentController@getAllRent');
Route::get('/currentRent, RentController@getCurrentRent');
