<?php
// Route::post('fuel/postDatatablee','SMD\SMDController@postDatatable');
// Route::get('fuel/smdindex','SMD\SMDController@index');
// Route::post('fuel/create','SMD\SMDController@create');

Route::post('fuel/postDatatable','Fuel\FuelController@postDatatable');
Route::get('fuel/form','Fuel\FuelController@index');
Route::post('fuel/create','Fuel\FuelController@create');
Route::get('fuel/form/{id}/edit','Fuel\FuelController@edit');
Route::post('fuel/update','Fuel\FuelController@update');
Route::get('fuel/form/{id}','Fuel\FuelController@del');
Route::post('fuel/stock/check','Fuel\FuelController@checkFuel');

Route::get('fuel/stock/{type}', function ($type) {
      return view('Fuel.formstock')->with(array('type'=> $type));
    }
    );
Route::post('fuel/add','Fuel\FuelstockController@AddFuel');
Route::post('fuel/reduce','Fuel\FuelstockController@ReduceFuel');
Route::get('fuel/stock','Fuel\FuelstockController@index');
Route::post('fuel/stock/createforboat','Fuel\FuelstockController@createForboat');
Route::post('fuel/stock/createreceive','Fuel\FuelstockController@createReceive');
Route::post('fuel/stock/createforwork','Fuel\FuelstockController@createForwork');
Route::post('fuel/stock/createforcompany','Fuel\FuelstockController@createForcompany');
Route::post('fuel/stock/createforsell','Fuel\FuelstockController@createForsell');
Route::get('fuel/stock/del/{id}','Fuel\FuelstockController@del');

Route::post('fuel/stock/postDatatable','Fuel\FuelstockController@postDatatable');

Route::post('fuel/approve/postDatatable','Fuel\FuelApproveController@postDatatable');
Route::get('fuel/approve/approved/{id}','Fuel\FuelApproveController@approved');
Route::get('fuel/approve/notapproved/{id}','Fuel\FuelApproveController@notapproved');


?>
