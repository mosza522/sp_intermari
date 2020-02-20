<?php
/*
|--------------------------------------------------------------------------------------
| #SMD-ฝ่ายขนถ่ายสินค้าทางทะเล
|--------------------------------------------------------------------------------------*/

Route::resource('fts/prepare', 'FTS\PrepareController');
Route::post('fts/prepare/datatable', 'FTS\PrepareController@postDatatable');

####### Sweep
Route::resource('fts/prepare/{ItemID}/sweep', 'FTS\PrepareSweepController');
Route::post('fts/prepare/{ItemID}/sweep/ajax/insert/', 'FTS\PrepareSweepController@AjaxInsert');
Route::post('fts/prepare/{ItemID}/sweep/ajax/update/', 'FTS\PrepareSweepController@AjaxUpdate');
Route::post('fts/prepare/{ItemID}/sweep/ajax/delete/', 'FTS\PrepareSweepController@AjaxDelete');
Route::post('fts/prepare/{ItemID}/sweep/datatable/sweep/', 'FTS\PrepareSweepController@postDatatable');
Route::post('fts/prepare/{ItemID}/sweep/datatable/sweep-with-weight/', 'FTS\PrepareSweepController@postDatatableWithWeight');

####### Foreman
Route::resource('fts/prepare/{ItemID}/foreman', 'FTS\PrepareForemanController');
Route::post('fts/prepare/{ItemID}/foreman/ajax/insert/', 'FTS\PrepareForemanController@AjaxInsert');
Route::post('fts/prepare/{ItemID}/foreman/ajax/update/', 'FTS\PrepareForemanController@AjaxUpdate');
Route::post('fts/prepare/{ItemID}/foreman/ajax/delete/', 'FTS\PrepareForemanController@AjaxDelete');
Route::post('fts/prepare/{ItemID}/foreman/datatable/foreman/', 'FTS\PrepareForemanController@postDatatable');
Route::post('fts/prepare/{ItemID}/foreman/datatable/foreman-with-weight/', 'FTS\PrepareForemanController@postDatatableWithWeight');

####### Machine
Route::resource('fts/prepare/{ItemID}/machine', 'FTS\PrepareMachineController');
Route::post('fts/prepare/{ItemID}/machine/ajax/insert/', 'FTS\PrepareMachineController@AjaxInsert');
Route::post('fts/prepare/{ItemID}/machine/ajax/update/', 'FTS\PrepareMachineController@AjaxUpdate');
Route::post('fts/prepare/{ItemID}/machine/ajax/delete/', 'FTS\PrepareMachineController@AjaxDelete');
Route::post('fts/prepare/{ItemID}/machine/datatable/machine/', 'FTS\PrepareMachineController@postDatatable');
Route::post('fts/prepare/{ItemID}/machine/datatable/machine-with-weight/', 'FTS\PrepareMachineController@postDatatableWithWeight');

####### Buoy
Route::resource('fts/prepare/{ItemID}/buoy', 'FTS\PrepareBuoyController');
Route::post('fts/prepare/{ItemID}/buoy/ajax/insert/', 'FTS\PrepareBuoyController@AjaxInsert');
Route::post('fts/prepare/{ItemID}/buoy/ajax/update/', 'FTS\PrepareBuoyController@AjaxUpdate');
Route::post('fts/prepare/{ItemID}/buoy/ajax/delete/', 'FTS\PrepareBuoyController@AjaxDelete');
Route::post('fts/prepare/{ItemID}/buoy/datatable/buoy/', 'FTS\PrepareBuoyController@postDatatable');
Route::post('fts/prepare/{ItemID}/buoy/datatable/buoy-with-weight/', 'FTS\PrepareBuoyController@postDatatableWithWeight');

####### Staff
Route::resource('fts/prepare/{ItemID}/staff', 'FTS\PrepareStaffController');
Route::post('fts/prepare/{ItemID}/staff/ajax/insert/', 'FTS\PrepareStaffController@AjaxInsert');
Route::post('fts/prepare/{ItemID}/staff/ajax/update/', 'FTS\PrepareStaffController@AjaxUpdate');
Route::post('fts/prepare/{ItemID}/staff/ajax/delete/', 'FTS\PrepareStaffController@AjaxDelete');
Route::post('fts/prepare/{ItemID}/staff/datatable/staff/{OperationID}', 'FTS\PrepareStaffController@postDatatable');
Route::post('fts/prepare/{ItemID}/staff/datatable/staff-with-weight/{OperationID}', 'FTS\PrepareStaffController@postDatatableWithWeight');

/*######################################################################################################################################################*/
/*------------------------------------------------------------------------------------------------------------------------------------------------------*/
/*######################################################################################################################################################*/

Route::resource('fts/operation', 'FTS\OperationController');
Route::post('fts/operation/datatable', 'FTS\OperationController@postDatatable');
Route::get('fts/operation/{OperationID}/buoy', 'FTS\OperationController@OperationShowBuoy');

####### Electricity
Route::resource('fts/operation/{OperationID}/electricity', 'FTS\OperationElectricityController');
Route::post('fts/operation/{OperationID}/electricity/datatable/electricity', 'FTS\OperationElectricityController@postDatatable');

####### Crane
Route::resource('fts/operation/{OperationID}/crane', 'FTS\OperationCraneController');
Route::post('fts/operation/{OperationID}/crane/datatable/crane', 'FTS\OperationCraneController@postDatatable');

####### Machine
Route::resource('fts/operation/{OperationID}/machine', 'FTS\OperationMachineController');
Route::post('fts/operation/{OperationID}/machine/datatable/machine', 'FTS\OperationMachineController@postDatatable');

####### Staff
Route::resource('fts/operation/{OperationID}/staff', 'FTS\OperationStaffController');
Route::post('fts/operation/{OperationID}/staff/datatable/staff', 'FTS\OperationStaffController@postDatatable');
Route::post('fts/operation/{OperationID}/staff/ajax/json/', 'FTS\OperationStaffController@jsonStaff');

####### Oil Buoy
Route::resource('fts/operation/{OperationID}/oilbuoy', 'FTS\OperationOilBuoyController');
Route::post('fts/operation/{OperationID}/oilbuoy/datatable/oilbuoy', 'FTS\OperationOilBuoyController@postDatatable');

####### Oil Backhoe
Route::resource('fts/operation/{OperationID}/oilbackhoe', 'FTS\OperationOilBackhoeController');
Route::post('fts/operation/{OperationID}/oilbackhoe/datatable/oilbackhoe', 'FTS\OperationOilBackhoeController@postDatatable');

####### Daily Report
Route::resource('fts/operation/{OperationID}/dailyreport', 'FTS\OperationDailyReportController');
Route::post('fts/operation/{OperationID}/dailyreport/alongside', 'FTS\OperationDailyReportController@Alongside');
Route::post('fts/operation/{OperationID}/dailyreport/datatable/dailyreport', 'FTS\OperationDailyReportController@postDatatable');

####### Alongside
Route::resource('fts/operation/{OperationID}/alongside', 'FTS\OperationAlongsideController');
Route::post('fts/operation/{OperationID}/alongside/datatable/alongside', 'FTS\OperationAlongsideController@postDatatable');



####### Staff FTS
Route::get('/fts/staff/', 'StaffController@index');
Route::post('fts/datatable/staff/', 'StaffController@postDatatableStaff');

/*
|--------------------------------------------------------------------------------------
| #Machine Controller
|--------------------------------------------------------------------------------------*/
Route::get('fts/machine/index', 'FTS\MachineController@index');

Route::get('fts/machine/inspection-check', 'FTS\MachineController@checkInspection');
Route::post('fts/machine/datatable/inspection-check', 'FTS\MachineController@checkInspectionDatatable');

Route::get('fts/machine/inspection-approve', 'FTS\MachineController@approveInspection');
Route::post('fts/machine/datatable/inspection-approve', 'FTS\MachineController@approveInspectionDatatable');


Route::post('fts/machine/machineCondition', 'Machine\MachineConditionController@store');
Route::post('fts/machine/grab', 'Machine\GrabController@store');
Route::post('fts/machine/electricity', 'Machine\ElectricityController@store');
Route::post('fts/machine/crane', 'Machine\CraneController@store');
Route::post('fts/machine/conveyor', 'Machine\ConveyorController@store');

Route::get('fts/machine/inspection-check/{id}','Machine\MachineController@show');

Route::get('fts/machine/inspection-approve/{id}','Machine\MachineController@showApprove');

Route::get('fts/machine/approve/{code}/{id}','Machine\MachineController@approve');
Route::get('fts/machine/notapprove/{code}/{id}','Machine\MachineController@notapprove');


Route::get('fts/machine/grab/report/{id}','Machine\ExcelController@exportGrab');
Route::get('fts/machine/electricity/report/{id}','Machine\ExcelController@exportElectricity');
Route::get('fts/machine/crane/report/{id}','Machine\ExcelController@exportCrane');
Route::get('fts/machine/conveyor/report/{id}','Machine\ExcelController@exportConveyor');
Route::get('fts/machine/machinecondition/report/{id}','Machine\ExcelController@exportMachineCondition');
