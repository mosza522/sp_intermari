<?php
/*
|--------------------------------------------------------------------------------------
| #CLM-ฝ่ายขนถ่ายสินค้าท่าเรือ
|--------------------------------------------------------------------------------------*/

Route::resource('clm/prepare', 'CLM\PrepareController');
Route::post('clm/prepare/datatable', 'CLM\PrepareController@postDatatable');

####### Sweep
Route::resource('clm/prepare/{ItemID}/sweep', 'CLM\PrepareSweepController');
Route::post('clm/prepare/{ItemID}/sweep/ajax/insert/', 'SWP\PrepareSweepController@AjaxInsert');
Route::post('clm/prepare/{ItemID}/sweep/ajax/update/', 'SWP\PrepareSweepController@AjaxUpdate');
Route::post('clm/prepare/{ItemID}/sweep/ajax/delete/', 'SWP\PrepareSweepController@AjaxDelete');
Route::post('clm/prepare/{ItemID}/sweep/datatable/sweep/', 'SWP\PrepareSweepController@postDatatable');
Route::post('clm/prepare/{ItemID}/sweep/datatable/sweep-with-weight/', 'SWP\PrepareSweepController@postDatatableWithWeight');

####### Foreman
Route::resource('clm/prepare/{ItemID}/foreman', 'CLM\PrepareForemanController');
Route::post('clm/prepare/{ItemID}/foreman/ajax/insert/', 'SWP\PrepareForemanController@AjaxInsert');
Route::post('clm/prepare/{ItemID}/foreman/ajax/update/', 'SWP\PrepareForemanController@AjaxUpdate');
Route::post('clm/prepare/{ItemID}/foreman/ajax/delete/', 'SWP\PrepareForemanController@AjaxDelete');
Route::post('clm/prepare/{ItemID}/foreman/datatable/foreman/', 'SWP\PrepareForemanController@postDatatable');
Route::post('clm/prepare/{ItemID}/foreman/datatable/foreman-with-weight/', 'SWP\PrepareForemanController@postDatatableWithWeight');

####### Machine
Route::resource('clm/prepare/{ItemID}/machine', 'CLM\PrepareMachineController');
Route::post('clm/prepare/{ItemID}/machine/ajax/insert/', 'CLM\PrepareMachineController@AjaxInsert');
Route::post('clm/prepare/{ItemID}/machine/ajax/update/', 'CLM\PrepareMachineController@AjaxUpdate');
Route::post('clm/prepare/{ItemID}/machine/ajax/delete/', 'CLM\PrepareMachineController@AjaxDelete');
Route::post('clm/prepare/{ItemID}/machine/datatable/machine/', 'CLM\PrepareMachineController@postDatatable');
Route::post('clm/prepare/{ItemID}/machine/datatable/machine-with-weight/', 'CLM\PrepareMachineController@postDatatableWithWeight');

####### Staff
Route::resource('clm/prepare/{ItemID}/staff', 'CLM\PrepareStaffController');
Route::post('clm/prepare/{ItemID}/staff/ajax/insert/', 'CLM\PrepareStaffController@AjaxInsert');
Route::post('clm/prepare/{ItemID}/staff/ajax/update/', 'CLM\PrepareStaffController@AjaxUpdate');
Route::post('clm/prepare/{ItemID}/staff/ajax/delete/', 'CLM\PrepareStaffController@AjaxDelete');
Route::post('clm/prepare/{ItemID}/staff/datatable/staff/', 'CLM\PrepareStaffController@postDatatable');
Route::post('clm/prepare/{ItemID}/staff/datatable/staff-with-weight/', 'CLM\PrepareStaffController@postDatatableWithWeight');
	
/*######################################################################################################################################################*/
/*------------------------------------------------------------------------------------------------------------------------------------------------------*/
/*######################################################################################################################################################*/

Route::resource('clm/operation', 'CLM\OperationController');
Route::post('clm/operation/datatable', 'CLM\OperationController@postDatatable');




Route::get('/clm/staff/', 'StaffController@index');

/*
|--------------------------------------------------------------------------------------
| #Datatable
|--------------------------------------------------------------------------------------*/
Route::post('clm/datatable/staff/', 'StaffController@postDatatableStaff');




/*
|--------------------------------------------------------------------------------------
| #Machine Controller
|--------------------------------------------------------------------------------------*/
Route::get('clm/machine/index', 'CLM\MachineController@index');

Route::get('clm/machine/inspection-check', 'CLM\MachineController@checkInspection');
Route::post('clm/machine/datatable/inspection-check', 'CLM\MachineController@checkInspectionDatatable');

Route::get('clm/machine/inspection-approve', 'CLM\MachineController@approveInspection');
Route::post('clm/machine/datatable/inspection-approve', 'CLM\MachineController@approveInspectionDatatable');

Route::get('clm/machine/inspection-check/{id}','Machine\MachineController@show');
Route::get('clm/machine/inspection-approve/{id}','Machine\MachineController@approve');


Route::post('clm/machine/machineCondition', 'Machine\MachineConditionController@store');
Route::post('clm/machine/grab', 'Machine\GrabController@store');