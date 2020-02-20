<?php
namespace App\Http\Controllers\SWP\Operation;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class EventController extends Controller
{
    public function index( $ItemID ) 
    {
		$sRow 			= \App\Models\SMD\SmdItem::Smd($ItemID);
		$sRowMachine	= \App\Models\Master\Machine::where('DivisionID', '5')->get();
			
		if( $sRow ){
			return View('SWP.Operation.Event')
					->with(array(
						'sRow' 			=> $sRow,
						'sRowMachine' 	=> $sRowMachine,
						'PageContainer'	=> true
					)
				);
		}else{
			return redirect()->action($sRow->work_mode.'\PrepareController@index')->with(['alert'=>\App\Models\Alert::Msg('warning')]);
		}
    }
	
	
    public function store( $ItemID ) 
    {
		
		if( request('MachineID') ){
			$sData 				= new \App\Models\SWP\Operation\Fuel;
			$sData->ItemID		= $ItemID;
			$sData->FuelCode	= $this->runNumberCode('FUEL', '\App\Models\SWP\Operation\Fuel', null, 'FuelCode');
			$sData->MachineID	= request('MachineID');
			$sData->FuelNumber	= request('FuelNumber');
			$sData->FuelBefore	= request('FuelBefore');
			$sData->FuelBalance	= request('FuelBalance');
			$sData->Objective	= request('Objective');
			$sData->PickerName	= request('PickerName');
			$sData->save();
			
			return response()->json(\App\Models\Alert::Msg('success'));
		}else{
			return response()->json(\App\Models\Alert::Msg('danger'));
		}
	}
	
    public function update( $ItemID, $id) 
    {
		$sData 				= \App\Models\SWP\Operation\Fuel::find(request('id'));
		$sData->FuelNumber	= request('FuelNumber');
		$sData->FuelBefore	= request('FuelBefore');
		$sData->FuelBalance	= request('FuelBalance');
		$sData->Objective	= request('Objective');
		$sData->PickerName	= request('PickerName');
		$sData->save();
		return response()->json(\App\Models\Alert::Msg('success'));
	}
	
    public function destroy( $ItemID, $id) 
    {
		\App\Models\SWP\Operation\Fuel::find(request('id'))->forceDelete();
		return response()->json(\App\Models\Alert::Msg('success'));
	}
	
	
	
    public function postDatatable( $ItemID ){
		$sTable	= \App\Models\SWP\Operation\Fuel::join('ck_Master_Machine','ck_Master_Machine.id','=','ck_Item_Swp_Operation_Fuel.MachineID')
					->select('ck_Item_Swp_Operation_Fuel.id', 'FuelCode', 'FuelNumber', 'FuelBefore', 'FuelBalance', 'Objective', 'PickerName', 'MachineName', 'Status', 'MachineID')
					->where('ItemID',$ItemID);
        return DataTables::of($sTable)->escapeColumns([])
		->addColumn('StatusName',function($data){
			if( $data->Status == 1 )	return 'รอดำเนินการเบิก';
			if( $data->Status == 2 )	return 'เบิกน้ำมันเรียบร้อย';
			if( $data->Status == 3 )	return 'ไม่อนุมัติการเบิก';
		})
		->make(true);
	}
	
}
