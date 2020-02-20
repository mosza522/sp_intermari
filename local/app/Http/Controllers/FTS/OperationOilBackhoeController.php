<?php
namespace App\Http\Controllers\FTS;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class OperationOilBackhoeController extends Controller
{
    public function index( $OperationID ) 
    {
		$sRow = \App\Models\FTS\Operation::Main($OperationID);
		if( $sRow ){
			$rowItem = \App\Models\FTS\Operation::Item($sRow->SmdID);
			return View('FTS.Operation.OilBackhoeIndex')
					->with(array(
						'sRow' 			=> $sRow,
						'rowItem'		=> $rowItem,
						'PageContainer'	=> true
					)
				);
		}else{
			return redirect()->action('FTS\OperationController@index')->with(['alert'=>\App\Models\Alert::Msg('warning')]);
		}
    }
	
	
    public function create($OperationID) 
    {
		return $this->OilBackhoeForm($OperationID);
    }
	
    public function show($OperationID, $OilBackhoeID) 
    {
		return $this->OilBackhoeForm($OperationID, $OilBackhoeID);
    }
	

    public function store($OperationID) 
    {
		$sData = \App\Models\FTS\OperationOilBackhoe::where('id','!=',request('OilBackhoeID'))->where('OperationID',$OperationID)->where('workDate',date('Y-m-d',strtotime(request('workDate'))))->count();
		if( empty($sData) && !empty(request('workDate'))  ){
			if( request('OilBackhoeID') ){
				$sData = \App\Models\FTS\OperationOilBackhoe::find(request('OilBackhoeID'));
			}
			if( empty($sData) ){
				$sData	= new \App\Models\FTS\OperationOilBackhoe;
				$qCount = (\App\Models\FTS\OperationOilBackhoe::where('OperationID',$OperationID)->count() == 0 || empty(\App\Models\FTS\OperationOilBackhoe::where('OperationID',$OperationID)->count())) ? 1 : \App\Models\FTS\OperationOilBackhoe::where('OperationID',$OperationID)->count()+1;
				
				$rsOperation 		= \App\Models\FTS\Operation::find($OperationID);
				$sData->workNumber	= $rsOperation->workNumber.'-B'.sprintf('%02d',$qCount);
				$sData->OperationID	= $OperationID;
			}
			$sData->workDate = date('Y-m-d',strtotime(request('workDate')));
			$sData->save();
			$OilBackhoeID = $sData->id;
			
			
	
			\App\Models\FTS\OperationOilBackhoeUse::where('OilBackhoeID',request('OilBackhoeID'))->delete();
			if( request('MachineID') ){
				foreach( request('MachineID') AS $MachineID => $row ){
					\App\Models\FTS\OperationOilBackhoeUse::firstOrCreate([
						'OilBackhoeID'		=> $OilBackhoeID,
						'MachineID' 		=> $MachineID,
						'level_start' 		=> request('level_start')[$MachineID],
						'volume_start' 		=> request('volume_start')[$MachineID],
						'meter_start' 		=> request('meter_start')[$MachineID],
						'oil_fill' 			=> request('oil_fill')[$MachineID],
						'level_end' 		=> request('level_end')[$MachineID],
						'volume_end' 		=> request('volume_end')[$MachineID],
						'meter_end' 		=> request('meter_end')[$MachineID],
						'oil_use' 			=> request('oil_use')[$MachineID],
						'hour_use' 			=> request('hour_use')[$MachineID],
						'average_use' 		=> request('average_use')[$MachineID],
					]);
				}
			}
			return redirect()->action('FTS\OperationOilBackhoeController@show', array($OperationID,$OilBackhoeID))->with(['alert'=>\App\Models\Alert::Msg('success')]);
		}else{
			return redirect()->action('FTS\OperationOilBackhoeController@create', $OperationID)->with(['alert'=>\App\Models\Alert::Msg('warning','Duplicate')]);
		}
    }
	
    public function update($OperationID, $id) 
    {
		
	}
	
    public function OilBackhoeForm($OperationID, $OilBackhoeID=null ) 
    {
		$sRow = \App\Models\FTS\Operation::Main($OperationID);
		if( $sRow ){
			$rowItem 		= \App\Models\FTS\Operation::Item($sRow->SmdID);
			$rowOilBackhoe 	= \App\Models\FTS\OperationOilBackhoe::find($OilBackhoeID);
			$rowMachine		= \App\Models\Master\Machine::where('MachineType', 'BackHoe')->where('DepartmentID', $sRow->DepartmentID)->get();
			
			if( $rowOilBackhoe && $rowOilBackhoe->id ){
				$rowUse 	= \App\Models\FTS\OperationOilBackhoeUse::where('OilBackhoeID',$rowOilBackhoe->id)->get();
				if( $rowUse ){
					foreach( $rowUse AS $r){
						$sRowItem[$r->MachineID]['MachineID'] 	= $r->MachineID;
						$sRowItem[$r->MachineID]['level_start'] = $r->level_start;
						$sRowItem[$r->MachineID]['volume_start'] = $r->volume_start;
						$sRowItem[$r->MachineID]['meter_start'] = $r->meter_start;
						$sRowItem[$r->MachineID]['oil_fill'] 	= $r->oil_fill;
						$sRowItem[$r->MachineID]['level_end'] 	= $r->level_end;
						$sRowItem[$r->MachineID]['volume_end'] 	= $r->volume_end;
						$sRowItem[$r->MachineID]['meter_end'] 	= $r->meter_end;
						$sRowItem[$r->MachineID]['oil_use'] 	= $r->oil_use;
						$sRowItem[$r->MachineID]['hour_use'] 	= $r->hour_use;
						$sRowItem[$r->MachineID]['average_use'] = $r->average_use;
					}
				}
			}
			return View('FTS.Operation.OilBackhoeForm')
					->with(array(
						'sRow' 			=> $sRow,
						'rowItem'		=> $rowItem,
						'rowOilBackhoe'	=> $rowOilBackhoe,
						'sRowItem'		=> empty($sRowItem)?NULL:$sRowItem,
						'rowMachine'	=> empty($rowMachine)?NULL:$rowMachine,
						'PageContainer'	=> true
					)
				);
		}else{
			return redirect()->action('FTS\OperationController@index')->with(['alert'=>\App\Models\Alert::Msg('warning')]);
		}
		
    }
	
	public function postDatatable($OperationID){
		$sTable	= \App\Models\FTS\OperationStaff::Join('ck_Staff', 'ck_Staff.id', '=', 'ck_Item_Fts_Operation_Staff.StaffID')
					->join('ck_Staff_Position','ck_Staff_Position.id','=','ck_Staff.PositionID')
					->join('ck_Staff_Department','ck_Staff_Department.id','=','ck_Staff.DepartmentID')
					->leftJoin('ck_Staff AS created', 'created.id', '=', 'ck_Item_Fts_Operation_Staff.created_by')
					->leftJoin('ck_Staff AS updated', 'updated.id', '=', 'ck_Item_Fts_Operation_Staff.updated_by')
					->select(
						'ck_Item_Fts_Operation_Staff.id', 
						'ck_Item_Fts_Operation_Staff.workNumber', 
						'ck_Item_Fts_Operation_Staff.workDate', 
						'ck_Item_Fts_Operation_Staff.workStatus', 
						'ck_Item_Fts_Operation_Staff.workNote',
						'ck_Staff_Department.DepartmentName', 
						'ck_Staff_Position.PositionName',
						DB::raw('CONCAT(ck_Staff.StaffPrefix,ck_Staff.StaffFirstName,\' \',ck_Staff.StaffLastName) AS StaffName'),
						'created.StaffCode AS created', 
						'updated.StaffCode AS updated', 
						'ck_Item_Fts_Operation_Staff.created_at', 
						'ck_Item_Fts_Operation_Staff.updated_at'
						)
					->where('OperationID', $OperationID);
					
        return DataTables::of($sTable)->escapeColumns([])
		->addColumn('workStatus2',function($data){
			if( $data->workStatus== 0 )	return 'ออกงาน';
			if( $data->workStatus== 1 )	return 'เข้างาน';
		})
		->make(true);
	}
}
