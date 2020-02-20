<?php
namespace App\Http\Controllers\FTS;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class PrepareMachineController extends Controller
{
    public function index( $ItemID, $OperationID ) 
    {
		$sRow = \App\Models\SMD\SmdItem::Smd($ItemID);
		if( $sRow ){
			$sRow->OperationID = $OperationID;
			$rowItem = \App\Models\SMD\SmdItem::Item($sRow);
			return View('FTS.Prepare.Machine')
					->with(array(
						'sRow' 			=> $sRow,
						'rowItem'		=> $rowItem,
						'PageContainer'	=> true,
						'sTitle' 		=> $sRow->work_number .' : ใบเตรียมความพร้อมเครื่องจักร'
					)
				);
		}else{
			return redirect()->action('FTS\PrepareController@index')->with(['alert'=>\App\Models\Alert::Msg('warning')]);
		}
    }
	
    public function show( $ItemID, $OperationID) 
    {
		return $this->index( $ItemID, $OperationID ) ;
	}
	
    public function AjaxInsert( $ItemID ){
		$sRowItem 	= \App\Models\SMD\SmdItem::find($ItemID);
		$sCount 	= \App\Models\SWP\PrepareMachine::where('Division',$sRowItem->work_mode)->where('ItemID', $ItemID)->where('MachineID', request('MachineID'))->count();
		if( $sCount == 0 ){
			\App\Models\SWP\PrepareMachine::firstOrCreate([
				'Division'		=> $sRowItem->work_mode,
				'ItemID'		=> $ItemID,
				'MachineID' 	=> request('MachineID'),
				'workNote' 		=> request('workNote')
			]);
			

			$sRowItem = \App\Models\SMD\SmdItem::find($ItemID);
			$sRowItem->work_prepare_fts 	= 'Y';
			$sRowItem->save();
			return response()->json(\App\Models\Alert::Msg('success'));
		}else{
			return response()->json(\App\Models\Alert::Msg('danger'));
		}
	}
	 
    public function AjaxUpdate( $ItemID ){
		$sData = \App\Models\SWP\PrepareMachine::find(request('id'));
		if( $sData ){
			$sData->workNote	= request('workNote');
			$sData->save();
			return response()->json(\App\Models\Alert::Msg('success'));
		}else{
			return response()->json(\App\Models\Alert::Msg('danger'));
		}
	}
	 
    public function AjaxDelete( $ItemID ){
		$sData = \App\Models\SWP\PrepareMachine::find(request('id'));
		if( $sData ){
			$sData->workStatus	= 0;
			$sData->save();
			return response()->json(\App\Models\Alert::Msg('success'));
		}else{
			return response()->json(\App\Models\Alert::Msg('danger'));
		}
	}
	
	
	    public function postDatatable( $ItemID ){
		$sTable	= \App\Models\SWP\PrepareMachine::join('ck_Master_Machine','ck_Master_Machine.id','=','ck_Item_Prepare_Machine.MachineID')
					->join('ck_Master_Fts_Buoy','ck_Master_Fts_Buoy.DepartmentID','=','ck_Master_Machine.DepartmentID')
					->leftJoin('ck_Staff AS created', 'created.id', '=', 'ck_Item_Prepare_Machine.created_by')
					->leftJoin('ck_Staff AS updated', 'updated.id', '=', 'ck_Item_Prepare_Machine.updated_by')
					->select('ck_Item_Prepare_Machine.id', 'BuoyName', 'MachineType', 'MachineName', 'workNote', 'workStatus', 'created.StaffCode AS created', 'updated.StaffCode AS updated', 'ck_Item_Prepare_Machine.created_at', 'ck_Item_Prepare_Machine.updated_at')
					->where('ItemID',$ItemID)
					->get();
        return DataTables::of($sTable)->escapeColumns([])
		->addColumn('workStatus2',function($data){
			if( $data->workStatus == 0 )	return 'ยกเลิกการใช้';
			if( $data->workStatus == 1 )	return 'ใช้ปฎิบัติงาน';
		})
		->make(true);
	}
	

	
	
    public function postDatatableWithWeight( $ItemID ){
		$Division 	= \App\Models\SMD\SmdItem::find( $ItemID )->work_mode;
		if( $Division == 'SWP')	$Division ='5';
		if( $Division == 'FTS')	$Division ='6';
		if( $Division == 'CLM')	$Division ='7';
		if( $Division == 'TRU')	$Division ='7';
		$sTable		= \App\Models\Master\Machine::join('ck_Staff_Department','ck_Staff_Department.id','=','ck_Master_Machine.DepartmentID')
						->select('ck_Master_Machine.id', 'DepartmentName', 'MachineType', 'MachineNunber', 'MachineName')
						->where('ck_Master_Machine.DivisionID',$Division);
		
		if( request('Where') ){
			foreach(request('Where') AS $key => $val){
				if( $val ){
					$sTable->where($key, $val);
				}
			}
		}
		if( request('Like') ){
			foreach(request('Like') AS $key => $val){
				if( $val ){
					$sTable->where($key, 'like', '%'.$val.'%');
				}
			}
		}
		
        return DataTables::of($sTable)->escapeColumns([])
		->make(true);
	}
	
	
}
