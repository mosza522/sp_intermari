<?php
	/*
	|--------------------------------------------------------------------------------------
	| #RTM-ฝ่ายขนส่งทางน้ำ
	|--------------------------------------------------------------------------------------*/

	
	Route::get('/rtm/staff/', 'StaffController@index');
	
	/*
	|--------------------------------------------------------------------------------------
	| #Datatable
	|--------------------------------------------------------------------------------------*/
	Route::post('rtm/datatable/staff/', 'StaffController@postDatatableStaff');