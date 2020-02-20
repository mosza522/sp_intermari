<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/gen/food', 'GenerateReportController@genFood');
Route::get('/gen/farmsize', 'GenerateReportController@genFarmSize');
Route::get('/gen/rg01', 'GenerateReportController@genReportRg01');
Route::get('/gen/rg02', 'GenerateReportController@genReportRg02');
Route::get('/gen/rg03', 'GenerateReportController@genReportRg03');
Route::get('/gen/rg05', 'GenerateReportController@genReportRg05');
Route::get('/gen/rg08', 'GenerateReportController@genReportRg08');
Route::get('/lbms', 'LbmsController@View');
Route::get('/lrms', 'LrmsController@Index');
Route::get('/sap/import', 'SapController@Import');
Route::get('/loop', 'LbmsController@ImportLoop');
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
