<?php
	/*
	|--------------------------------------------------------------------------------------
	| #SMD-ฝ่ายขายและการตลาด
	|--------------------------------------------------------------------------------------*/
	Route::resource('/smd/order', 'SMD\SMDController');
	
	Route::get('/smd/order/{OrderID}/buoy/{ItemID?}', 'SMD\SMDController@Buoy');
	Route::get('/smd/order/{OrderID}/steviedore/{ItemID?}', 'SMD\SMDController@StevieDore');
	Route::get('/smd/order/{OrderID}/ship/{ItemID?}', 'SMD\SMDController@Ship');
	Route::get('/smd/order/{OrderID}/blackhole/{ItemID?}', 'SMD\SMDController@BlackHole');
	Route::get('/smd/order/{OrderID}/truck/{ItemID?}', 'SMD\SMDController@Truck');
	Route::get('/smd/order/{OrderID}/thasin/{ItemID?}', 'SMD\SMDController@ThaSin');
	Route::get('/smd/order/{OrderID}/other/{ItemID?}', 'SMD\SMDController@Other');
	
	Route::post('/smd/order/{OrderID}/buoy', 'SMD\SMDController@saveBuoy');
	Route::post('/smd/order/{OrderID}/steviedore', 'SMD\SMDController@saveStevieDore');
	Route::post('/smd/order/{OrderID}/ship', 'SMD\SMDController@saveShip');
	Route::post('/smd/order/{OrderID}/blackhole', 'SMD\SMDController@saveBlackHole');
	Route::post('/smd/order/{OrderID}/truck', 'SMD\SMDController@saveTruck');
	Route::post('/smd/order/{OrderID}/thasin', 'SMD\SMDController@saveThaSin');
	Route::post('/smd/order/{OrderID}/other', 'SMD\SMDController@saveOther');
	Route::post('/smd/order/{OrderID}/copy/{ItemID}/{ModeFrom}/{ModeTo}', 'SMD\SMDController@ItemCopy');
	Route::post('/smd/order/{OrderID}/remove/{ItemID}/{Mode}', 'SMD\SMDController@ItemRemove');
	
	
	Route::get('/smd/staff/', 'StaffController@index');
	
	/*
	|--------------------------------------------------------------------------------------
	| #Datatable
	|--------------------------------------------------------------------------------------*/
	Route::post('smd/datatable/staff/', 'StaffController@postDatatableStaff');
	Route::post('smd/datatable/order', 'SMD\SMDController@postDatatable');