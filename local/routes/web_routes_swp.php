<?php
/*
|--------------------------------------------------------------------------------------
| #SWP-ฝ่ายท่าเรือสินวัฒนา
|--------------------------------------------------------------------------------------*/
Route::resource('swp/prepare', 'SWP\PrepareController');
Route::post('swp/prepare/datatable', 'SWP\PrepareController@postDatatable');

####### Sweep
Route::resource('swp/prepare/{ItemID}/sweep', 'SWP\PrepareSweepController');
Route::post('swp/prepare/{ItemID}/sweep/ajax/insert/', 'SWP\PrepareSweepController@AjaxInsert');
Route::post('swp/prepare/{ItemID}/sweep/ajax/update/', 'SWP\PrepareSweepController@AjaxUpdate');
Route::post('swp/prepare/{ItemID}/sweep/ajax/delete/', 'SWP\PrepareSweepController@AjaxDelete');
Route::post('swp/prepare/{ItemID}/sweep/datatable/sweep/', 'SWP\PrepareSweepController@postDatatable');
Route::post('swp/prepare/{ItemID}/sweep/datatable/sweep-with-weight/', 'SWP\PrepareSweepController@postDatatableWithWeight');

####### Foreman
Route::resource('swp/prepare/{ItemID}/foreman', 'SWP\PrepareForemanController');
Route::post('swp/prepare/{ItemID}/foreman/ajax/insert/', 'SWP\PrepareForemanController@AjaxInsert');
Route::post('swp/prepare/{ItemID}/foreman/ajax/update/', 'SWP\PrepareForemanController@AjaxUpdate');
Route::post('swp/prepare/{ItemID}/foreman/ajax/delete/', 'SWP\PrepareForemanController@AjaxDelete');
Route::post('swp/prepare/{ItemID}/foreman/datatable/foreman/', 'SWP\PrepareForemanController@postDatatable');
Route::post('swp/prepare/{ItemID}/foreman/datatable/foreman-with-weight/', 'SWP\PrepareForemanController@postDatatableWithWeight');

####### Machine
Route::resource('swp/prepare/{ItemID}/machine', 'SWP\PrepareMachineController');
Route::post('swp/prepare/{ItemID}/machine/ajax/insert/', 'SWP\PrepareMachineController@AjaxInsert');
Route::post('swp/prepare/{ItemID}/machine/ajax/update/', 'SWP\PrepareMachineController@AjaxUpdate');
Route::post('swp/prepare/{ItemID}/machine/ajax/delete/', 'SWP\PrepareMachineController@AjaxDelete');
Route::post('swp/prepare/{ItemID}/machine/datatable/machine/', 'SWP\PrepareMachineController@postDatatable');
Route::post('swp/prepare/{ItemID}/machine/datatable/machine-with-weight/', 'SWP\PrepareMachineController@postDatatableWithWeight');

####### Staff
Route::resource('swp/prepare/{ItemID}/staff', 'SWP\PrepareStaffController');
Route::post('swp/prepare/{ItemID}/staff/ajax/insert/', 'SWP\PrepareStaffController@AjaxInsert');
Route::post('swp/prepare/{ItemID}/staff/ajax/update/', 'SWP\PrepareStaffController@AjaxUpdate');
Route::post('swp/prepare/{ItemID}/staff/ajax/delete/', 'SWP\PrepareStaffController@AjaxDelete');
Route::post('swp/prepare/{ItemID}/staff/datatable/staff/', 'SWP\PrepareStaffController@postDatatable');
Route::post('swp/prepare/{ItemID}/staff/datatable/staff-with-weight/', 'SWP\PrepareStaffController@postDatatableWithWeight');

/*######################################################################################################################################################*/
/*------------------------------------------------------------------------------------------------------------------------------------------------------*/
/*######################################################################################################################################################*/

Route::resource('swp/operation', 'SWP\OperationController');
Route::post('swp/operation/datatable', 'SWP\OperationController@postDatatable');




Route::resource('swp/operation/{ItemID}/plan', 'SWP\Operation\PlanController');
Route::resource('swp/operation/{ItemID}/export', 'SWP\Operation\ExportController');
Route::resource('swp/operation/{ItemID}/import', 'SWP\Operation\ImportController');
Route::resource('swp/operation/{ItemID}/warehouse', 'SWP\Operation\ExportWarehouseController');
Route::resource('swp/operation/{ItemID}/foreman', 'SWP\Operation\ForemanController');
Route::resource('swp/operation/{ItemID}/event', 'SWP\Operation\EventController');
Route::resource('swp/operation/{ItemID}/fuel', 'SWP\Operation\FuelController');

Route::post('swp/operation/{ItemID}/export/datatable/export/', 'SWP\Operation\ExportController@postDatatable');
Route::post('swp/operation/{ItemID}/import/datatable/import/', 'SWP\Operation\ImportController@postDatatable');
Route::post('swp/operation/{ItemID}/warehouse/datatable/warehouse/', 'SWP\Operation\ExportWarehouseController@postDatatable');
Route::post('swp/operation/{ItemID}/foreman/datatable/foreman/', 'SWP\Operation\ForemanController@postDatatable');
Route::post('swp/operation/{ItemID}/event/datatable/event/', 'SWP\Operation\EventController@postDatatable');
Route::post('swp/operation/{ItemID}/fuel/datatable/fuel/', 'SWP\Operation\FuelController@postDatatable');








####### Fuel
Route::post('swp/fuel/update','Fuel\FuelController@update');\
Route::post('swp/fuel/stock/check','Fuel\FuelController@checkFuel');

Route::get('swp/fuel/stock/{type}', function ($type) {
      return view('Fuel.formstock')->with(array('type'=> $type));
    }
    );
Route::post('swp/fuel/add','Fuel\FuelstockController@AddFuel');
Route::post('swp/fuel/reduce','Fuel\FuelstockController@ReduceFuel');
Route::get('swp/fuel/stock','Fuel\FuelstockController@index');
Route::post('swp/fuel/stock/createforboat','Fuel\FuelstockController@createForboat');
Route::post('swp/fuel/stock/createreceive','Fuel\FuelstockController@createReceive');
Route::post('swp/fuel/stock/createforwork','Fuel\FuelstockController@createForwork');
Route::post('swp/fuel/stock/createforcompany','Fuel\FuelstockController@createForcompany');
Route::post('swp/fuel/stock/createforsell','Fuel\FuelstockController@createForsell');
Route::get('swp/fuel/stock/del/{id}','Fuel\FuelstockController@del');

Route::post('swp/fuel/stock/postDatatable','Fuel\FuelstockController@postDatatable');

Route::post('swp/fuel/approve/postDatatable','Fuel\FuelApproveController@postDatatable');
Route::get('swp/fuel/approve/approved/{id}','Fuel\FuelApproveController@approved');
Route::get('swp/fuel/approve/notapproved/{id}','Fuel\FuelApproveController@notapproved');


Route::get('swp/fuel/balance', 'Fuel\FuelController@indexBalance');

Route::get('swp/fuel/balance/form/{id}/edit','Fuel\FuelController@edit');
Route::post('swp/fuel/balance/postDatatable','Fuel\FuelController@postDatatable');
Route::post('swp/fuel/balance/postDatatableEditFuel','Fuel\FuelstockController@postDatatableEditFuel');
Route::get('swp/fuel/balance/form','Fuel\FuelController@index');

Route::get('swp/fuel/receive', 'Fuel\FuelstockController@indexReceive');
Route::get('swp/fuel/receive/receiveform', 'Fuel\FuelstockController@receiveForm');
Route::post('swp/fuel/receive/postDatatableReceive','Fuel\FuelstockController@postDatatableReceive');

Route::get('swp/fuel/company', 'Fuel\FuelstockController@indexCompany');
Route::get('swp/fuel/company/companyform', 'Fuel\FuelstockController@companyForm');
Route::post('swp/fuel/company/postDatatableCompany','Fuel\FuelstockController@postDatatableCompany');

Route::get('swp/fuel/job', 'Fuel\FuelstockController@indexJob');
Route::get('swp/fuel/job/jobform', 'Fuel\FuelstockController@jobForm');
Route::post('swp/fuel/job/postDatatableJob','Fuel\FuelstockController@postDatatableJob');

Route::get('swp/fuel/boats', 'Fuel\FuelstockController@indexBoats');
Route::get('swp/fuel/boats/boatsform', 'Fuel\FuelstockController@boatsForm');
Route::post('swp/fuel/boats/postDatatableBoats','Fuel\FuelstockController@postDatatableBoats');

Route::get('swp/fuel/sell', 'Fuel\FuelstockController@indexSell');
Route::get('swp/fuel/sell/sellform', 'Fuel\FuelstockController@sellForm');
Route::post('swp/fuel/sell/postDatatableSell','Fuel\FuelstockController@postDatatableSell');

Route::get('swp/fuel/{type}/{id}/del', 'Fuel\FuelstockController@destroy');

Route::get('swp/fuel/{type}/{id}/approve/{reduceOrAdd}', 'Fuel\FuelstockController@approve');
Route::get('swp/fuel/{type}/{id}/notapprove', 'Fuel\FuelstockController@notapprove');

Route::get('swp/fuel/approve', 'Fuel\FuelstockController@indexApprove');



// Route::resource('swp/fuel/receive', 'SWP\Fuel\ReceiveController');
// Route::resource('swp/fuel/company', 'SWP\Fuel\CompanyController');
// Route::resource('swp/fuel/job', 'SWP\Fuel\JobController');
// Route::resource('swp/fuel/boats', 'SWP\Fuel\BoatsController');
// Route::resource('swp/fuel/sell', 'SWP\Fuel\SellController');





Route::get('/swp/staff/', 'StaffController@index');

/*
|--------------------------------------------------------------------------------------
| #Datatable
|--------------------------------------------------------------------------------------*/
Route::post('swp/datatable/staff/', 'StaffController@postDatatableStaff');


/*
|--------------------------------------------------------------------------------------
| #Machine Controller
|--------------------------------------------------------------------------------------*/
Route::get('swp/machine/index', 'SWP\MachineController@index');

Route::get('swp/machine/inspection-check', 'SWP\MachineController@checkInspection');
Route::post('swp/machine/datatable/inspection-check', 'SWP\MachineController@checkInspectionDatatable');

Route::get('swp/machine/inspection-approve', 'SWP\MachineController@approveInspection');
Route::post('swp/machine/datatable/inspection-approve', 'SWP\MachineController@approveInspectionDatatable');

Route::get('swp/machine/inspection-check/{id}','Machine\MachineController@show');
Route::get('swp/machine/inspection-approve/{id}','Machine\MachineController@approve');


Route::post('swp/machine/machineCondition', 'Machine\MachineConditionController@store');
Route::post('swp/machine/grab', 'Machine\GrabController@store');