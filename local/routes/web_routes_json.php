<?php
	/*
	|--------------------------------------------------------------------------------------
	| # ข้อมูลทั่วไปส่งออกเป็น json
	|--------------------------------------------------------------------------------------*/
	
	Route::post('/json/master/fts/buoystaff', 'JsonController@BuoyStaff');
	Route::post('/json/master/fts/buoymachine', 'JsonController@BuoyMachine');
	Route::post('/json/master/clm/machine', 'JsonController@CLMMachine');
	
?>