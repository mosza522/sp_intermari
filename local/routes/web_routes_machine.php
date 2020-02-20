<?php
Route::resource('machine/MachineCondition','Machine\MachineConditionController');
Route::resource('machine/Grab','Machine\GrabController');
Route::resource('machine/Electricity','Machine\ElectricityController');
Route::resource('machine/Crane','Machine\CraneController');
Route::resource('machine/Conveyer','Machine\ConveyorController');

Route::get('machine/Grabindex','Machine\GrabController@index');

Route::post('machine/machineCondition/postDatatable','Machine\MachineConditionController@postDatatable');
Route::get('machine/MachineConditionForm', function () {
    return view('Machine.machineCondition')->with(array('PageContainer'=> true));
  }
  );
Route::post('machine/grab/data','Machine\GrabController@postDatatable');
Route::get('machine/GrabForm', function () {
      return view('Machine.grab')->with(array('PageContainer'=> true));
    }
    );
Route::post('machine/Electricity/data','Machine\ElectricityController@postDatatable');
Route::get('machine/ElectricityForm', function () {
      return view('Machine.electricity')->with(array('PageContainer'=> true));
    }
    );
Route::post('machine/Crane/data','Machine\CraneController@postDatatable');
Route::get('machine/CraneForm', function () {
      return view('Machine.crane')->with(array('PageContainer'=> true));
    }
    );
Route::post('machine/Conveyor/data','Machine\ConveyorController@postDatatable');
Route::get('machine/ConveyorForm', function () {
      return view('Machine.conveyor')->with(array('PageContainer'=> true));
    }
    );
######### มิเตอร์ชั่วโมง #########
Route::post('machine/hourmeter','Machine\HourMeterController@hour');
##Execl
Route::get('machine/grab/report/{id}','Machine\ExcelController@exportGrab');
Route::get('machine/electricity/report/{id}','Machine\ExcelController@exportElectricity');
Route::get('machine/crane/report/{id}','Machine\ExcelController@exportCrane');
Route::get('machine/conveyor/report/{id}','Machine\ExcelController@exportConveyor');
Route::get('machine/machinecondition/report/{id}','Machine\ExcelController@exportMachineCondition');
?>
