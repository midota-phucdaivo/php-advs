<?php

/*
|--------------------------------------------------------------------------
| ADMIN Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "admin" middleware group. Enjoy building your API!
|
*/

// customer
Route::get('customer', 'Admin\CustomerController@index');
Route::get('/customer/form/{object?}', 'Admin\CustomerController@initForm');
Route::post('/customer/form/{object?}', 'Admin\CustomerController@actionForm');
Route::get('/customer/delete/{object}', 'Admin\CustomerController@delete');

// link
Route::get('link', 'Admin\LinkController@index');
Route::get('/link/form/{object?}', 'Admin\LinkController@initForm');
Route::post('/link/form/{object?}', 'Admin\LinkController@actionForm');
Route::get('/link/delete/{object}', 'Admin\LinkController@delete');

// source
Route::get('source', 'Admin\SourceController@index');
Route::get('/source/form/{object?}', 'Admin\SourceController@initForm');
Route::post('/source/form/{object?}', 'Admin\SourceController@actionForm');
Route::get('/source/delete/{object}', 'Admin\SourceController@delete');

// campaign
Route::get('campaign', 'Admin\CampaignController@index');
Route::get('/campaign/form/{object?}', 'Admin\CampaignController@initForm');
Route::post('/campaign/form/{object?}', 'Admin\CampaignController@actionForm');
Route::get('/campaign/delete/{object}', 'Admin\CampaignController@delete');


// lead
Route::get('lead', 'Admin\LeadController@index');
Route::get('/lead/form/{object?}', 'Admin\LeadController@initForm');
Route::post('/lead/form/{object?}', 'Admin\LeadController@actionForm');
Route::get('/lead/delete/{object}', 'Admin\LeadController@delete');